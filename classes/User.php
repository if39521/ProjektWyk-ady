<?php 
    class User {

        private $con;
        public $username;
        public $user_id;
        public $user_role;

        public function __construct(int $user_id) {
            $this->con = DB::getConnection();

            $user_id = Filter::Int( $user_id );
            $user = $this->con->prepare("SELECT ID_User, Username, Role FROM Users WHERE ID_User = :user_id LIMIT 1");
            $user->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $user->execute();
            if($user->rowCount() == 1) {
                $user = $user->fetch(PDO::FETCH_OBJ);
                $this->username 		= (string) $user->Username;
                $this->user_id 		= (int) $user->ID_User;
                $this->user_role 	= (string) $user->Role;
            } else {
                // No user.
                // Redirect to to logout.
                header("Location: ../ajax/logout.php");     
                exit();
            }
        }
        public static function Find($username, $return_assoc = false) {
            $con = DB::getConnection();
            $username = (string) Filter::String( $username );
            $findUser = $con->prepare("SELECT ID_User, Password FROM Users WHERE Username = :username LIMIT 1");
            $findUser->bindParam(':username', $username, PDO::PARAM_STR);
            $findUser->execute();
            if($return_assoc) {
                return $findUser->fetch(PDO::FETCH_ASSOC);
            }
            $user_found = (boolean) $findUser->rowCount();
            return $user_found;
        }
    }
?>