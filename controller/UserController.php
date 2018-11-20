<?php
require_once(__DIR__.'/../repository/DatabaseRepository.php');
require_once(__DIR__.'/../classes/Filter.php');
require_once(__DIR__.'/../entity/User.php');


class UsersController
{
    private $user_repo;
    private $columns = '(username, password, user_role, user_remote_adress)';
    private $bindNames = '(:username, :password, :user_role, :user_remote_adress)';
    private $column_names= array('username', 'password', 'user_role', 'user_remote_adress');
    private $table = 'Users';
    private $where;
    public function __construct(\PDO $pdo) {
        $this->user_repo = new DatabaseRepository($pdo, $this->bindNames);
    }

    public function register($username,$password, $confirm_password, $remote_adress)
    {
        if (!$this->validateRegisterCredentials($username, $password, $confirm_password)) {
            return false;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $remote_adress = ip2long($remote_adress);
        $this->user_repo->addNewRecord($this->table, $this->columns, 
        array($username, $password, 'a', $remote_adress), $this->column_names);
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

    public function getAllStudents($user_role) {
        $this->where = "user_role = '$user_role'";
        return $this->user_repo->getAllRecords($this->table, $this->where);

    }

    public function confirmUserAsStudent($adminRole,$username) {
        if (!$this->validateUserConfirmation($adminRole, $username)) {
            return false;
        }
        $this->where = "username = '$username'";
        return $this->user_repo->updateRecord($this->table, 'user_role', 's', $this->where); 
        
    }

    public function changeUserPassword($user_role, $username, $new_password, $confirm_password) {
        if (!$this->validatePasswordChangeCredentials($user_role, $username, $new_password, $confirm_password)) {
            return false;
        }
        $this->where = "username = '$username'";
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $this->user_repo->updateRecord($this->table, 'password', $new_password, $this->where);
        return true;
        
    }

    public function validatePasswordChangeCredentials($user_role, $username, $new_password, $confirm_password) {

		if ($user_role != 'a') {
			$_SESSION['password_change_msg'] = "You have no right's to perform this action!";
            return false;
        } 
        if (empty($username)) {
            $_SESSION['password_change_msg'] = "You must choose a student!";
            return false;
        }
		if (empty($new_password) || empty($confirm_password)) {
			$_SESSION['password_change_msg'] = "Password's field's must be filled!";
			return false;
		}
		if ($confirm_password !== $new_password) {
			$_SESSION['password_change_msg'] = "Password's must match";
			return false;
        } 
        return true;
    }

    public function validateUserConfirmation($admin_role, $username) {
        
        if (empty($username)) {
            $_SESSION['confirmation_student'] = "You must choose an user!";
            return false;
        }

        if ($admin_role != 'a') {
            $_SESSION['confirmation_student'] = "You have no right's to perform this action!";
            return false;
        }

        return true;
    }

    public function logout() {
        setcookie('logged_user', '', time()-3600, "/");
        return true;
    }
}
?>