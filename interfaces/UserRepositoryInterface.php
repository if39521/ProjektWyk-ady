<?php
    interface UserRepositoryInterface
    {

    public function addNewUser(User $user);    

    public function findUserByUsername($name);

    public function getAllUsers();

    public function updateUser(User $user);

    public function deteleUserById($user_id);

    }
?>
