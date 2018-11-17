<?php
require_once '../repository/UserRepository.php';
require_once '../classes/Filter.php';
require_once '../entity/User.php';

class UsersController
{
    private $user_repo;

    public function __construct() {
        $this->user_repo = new UserRepository();
    }

    public function register($username,$password, $confirm_password, $remote_adress)
    {
        if (!$this->validateRegisterCredentials($username, $password, $confirm_password)) {
            return false;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $remote_adress = ip2long($remote_adress);
        $user = new User($username, $password, 'n', $remote_adress);
        $this->user_repo->addNewUser($user);
        return true;     
    }

    public function loginUser($username, $password) {
        $username = Filter::String($username);
        $user_found = $this->checkIfUserExist($username);
		if ($user_found) {  
			$user_id = (int) $user_found['user_id'];
            $hash = (string) $user_found['password'];
            if (password_verify($password, $hash)) {
                $_SESSION['error_message'] = null;
				$_SESSION['login_user'] = $username;
                $_SESSION['user_id'] = $user_id;
                return true;
            } else {
                $_SESSION['error_message'] = "Your Password is invalid";
                return false;
            }
        }
        $_SESSION['error_message'] = "Account with this username doesnt exist";
        return false;
    }
    

    public function checkIfUserExist($username) {
        return $this->user_repo->findUserByUsername($username);
    }


    public function validateRegisterCredentials($username, $password, $confirm_password) {
        $username = Filter::String($username);
        $user_found = $this->checkIfUserExist($username);
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

}
?>