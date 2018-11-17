<?php 
    class User {

        public $user_id;
        public $username;
        public $password;
        public $user_role;
        public $user_remote_adress;

        public function __construct($user_id, $username, $password, $user_role = 'n', $user_remote_adress) {

                $this->user_id = $user_id;
                $this->username = $username;
                $this->password = $password;
                $this->user_role = $user_role;
                $this->user_remote_adress = $user_remote_adress;                
        } 

        /**
         * Set the value of user_id
         *
         * @return  self
         */ 
        public function setUser_id($user_id)
        {
                $this->user_id = $user_id;

                return $this;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }

        /**
         * Set the value of user_role
         *
         * @return  self
         */ 
        public function setUser_role($user_role)
        {
                $this->user_role = $user_role;

                return $this;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of user_role
         */ 
        public function getUser_role()
        {
                return $this->user_role;
        }

        /**
         * Get the value of user_id
         */ 
        public function getUser_id()
        {
                return $this->user_id;
        }

        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Get the value of user_remote_adress
         */ 
        public function getUser_remote_adress()
        {
                return $this->user_remote_adress;
        }

        /**
         * Set the value of user_remote_adress
         *
         * @return  self
         */ 
        public function setUser_remote_adress($user_remote_adress)
        {
                $this->user_remote_adress = $user_remote_adress;

                return $this;
        }
    }
?>