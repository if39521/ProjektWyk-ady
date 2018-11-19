<?php
require_once '../repository/DatabaseRepository.php';
require_once '../classes/Filter.php';
require_once '../entity/User.php';

class UsersController
{
    private $user_repo;
    private $columns = '(username, password, user_role, user_remote_adress)';
    private $column_names= array('username', 'password', 'user_role', 'user_remote_adress');
    private $table = 'Users';
    private $where;
    public function __construct() {
        $this->user_repo = new DatabaseRepository();
    }

    public function register($username,$password, $confirm_password, $remote_adress)
    {
        if (!$this->validateRegisterCredentials($username, $password, $confirm_password)) {
            return false;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $remote_adress = ip2long($remote_adress);
        $user = new User(0, $username, $password, 'n', $remote_adress);
        $this->user_repo->addNewRecord($this->table, $this->columns, 
        array($username, $password, 'n', $remote_adress), $this->column_names);
        return true;     
    }

    public function loginUser($username, $password) {
        $username = Filter::String($username);
        $this->where = "username = '$username'";
        $user_found = $this->checkIfUserExist($username);
		if ($user_found) {  
            $hash = (string) $user_found['password'];
            if (password_verify($password, $hash)) {
                $_SESSION['error_message'] = null;
                setcookie('logged_user', json_encode($user_found), time() + (86400 * 30), "/");
                return true;
            } else {
                $_SESSION['error_message'] = "Your Password is invalid";
                return false;
            }
        }
        $_SESSION['error_message'] = "Account with this username doesnt exist";
        return false;
    }
    

    public function checkIfUserExist() {
        return $this->user_repo->findRecordByValue($this->table, $this->where);
    }


    public function validateRegisterCredentials($username, $password, $confirm_password) {
        $username = Filter::String($username);
        $this->where = "username = '$username'";
        $user_found = $this->checkIfUserExist();
		if ($user_found) {
			$_SESSION['error_msg'] = "Account with this username already exist! Please choose another one";
            return false;
		} 
		if (empty($password) || empty($username)) {
			$_SESSION['error_msg'] = "Username field and password must be filled!";
			return false;
		}
		if ($confirm_password !== $password) {
			$_SESSION['error_msg'] = "Password's must match";
			return false;
        } 
        return true;
    }

    public function confirmUserAsStudent(User $user,User $admin) {
        $username = $user['username'];
        $this->where = "username = '$username'";
        $user_found = $this->checkIfUserExist();
        if (!isset($admin->user_role) || !$user_found) {
            return false;
        }
        if ($admin->user_role == 'a') {
            return $this->user_repo->updateRecord($this->table, 'user_role', 's'); 
        }
        return false;
    }

    public function changeUserPassword($user_role, $password, $new_password, $confirm_password) {
        if (!$this->validatePasswordChangeCredentials($user_role, $password, $new_password, $confirm_password)) {
            return false;
        }
        $this->user_repo->updateRecord($this->table, 'password', $new_password, $this->where);
        return true;
        
    }

    public function validatePasswordChangeCredentials($user_role, $old_password, $new_password, $confirm_password) {

        $this->where = "password = '$old_password'";
        return $user_found;
		if ($user_role != 'a') {
			$_SESSION['password_change_msg'] = "You have no right's to perform this action!";
            return false;
		} 
		if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
			$_SESSION['password_change_msg'] = "Password's field's must be filled!";
			return false;
		}
		if ($confirm_password !== $new_password) {
			$_SESSION['password_change_msg'] = "Password's must match";
			return false;
        } 
        return true;
    }
}
?>