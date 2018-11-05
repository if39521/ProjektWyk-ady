<?php
    class Login {
        private username;
        private password;


        if (isset($_SERVER['username'])) {
            $this->username = 'Bob';
            echo $this->username;
        }
    }
?>
