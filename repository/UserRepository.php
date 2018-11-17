<?php
require_once "../classes/DatabaseAdapter.php";
class UserRepository  {
    
    private $conection;

    public function __construct() {
            $this->connection = new DatabaseAdapter();
    }

    public function addNewUser(User  $user) {
        $this->connection->query('INSERT INTO Users
        (username, password, user_role, user_remote_adress)
        VALUES (:username, :password, :user_role, :user_remote_adress)
        ');
        $this->connection->bind(':username', $user->getUsername());
        $this->connection->bind(':password', $user->getPassword());
        $this->connection->bind(':user_role', $user->getUser_role());
        $this->connection->bind(':user_remote_adress', $user->getUser_remote_adress());
        $this->connection->execute();
    }
    
    public function findUserByUsername($username) {
        $username = (string) Filter::String( $username );
        $this->connection->query('SELECT * FROM Users WHERE username = :username LIMIT 1');
        $this->connection->bind(':username', $username);
        $row = $this->connection->single();
        return $row;
    }

    public function getAllUsers() {
        $this->conection->query('SELECT * FROM Users');
        $row = $this->conection->resultset();
        return $row;
    }

    public function updateUserById(User $user) {
        $user_id = (int) Filter::Int($user->user_id);
        $this->conection->query(
            'UPDATE Users SET
            username = :username,
            password = :password,
            role = :role
            WHERE user_id = :user_id
            ');
        $this->connection->bind(':username', $user->username);        
        $this->connection->bind(':password', $user->password);
        $this->connection->bind(':role', $user->role);
        $this->connection->bind(':user_id', $user_id);
        return $this->connection->execute();
    }

    public function deteleUserById($user_id) {
        $user_id = (int) Filter::Int($user_id);
        $this->connection->query('DELETE FROM Users WHERE user_id = :user_id ');
        $this->connection->bind(':user_id', $user_id);
        return $this->connection->execute();
    }
}
?>