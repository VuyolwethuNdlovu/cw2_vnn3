<?php


namespace App\Services;


use App\Models\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }



    public function createUser(array $data)
    {
        return $this->userRepo->createUser($data);
    }

    public function authenticateLoginPassword($credentials)
    {

        $password = $this->userRepo->getPasswordForValidation($credentials['user_id']);
        if (hash('sha256', $credentials['password']) == $password) {
            // The passwords match...
            return true;
        }
        return false;
    }

    public function getUserByUserId($user_id)
    {
        return $this->userRepo->getUserByUserId($user_id);
    }









}
