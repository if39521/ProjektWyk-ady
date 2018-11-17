<?php
    interface UserRepositoryInterface
    {

    public function addNewUser(User $user);    

    public function findUserByUsername($name);

    public function getAllUsers($user_id);

    public function updateUser(User $user);

    public function deteleUserById($user_id);

    }
?>
