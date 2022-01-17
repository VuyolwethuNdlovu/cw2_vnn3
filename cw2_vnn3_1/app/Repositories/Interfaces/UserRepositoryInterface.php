<?php


namespace App\Repositories\Interfaces;


interface UserRepositoryInterface
{
    public function getUserByUserId($user_id);
    public function createUser(array $userData);
    public function updateUser($user_id, array $newDetails);
    public function getPasswordForValidation($user_id);

}
