<?php


namespace App\Repositories;


use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function getUserByUserId($user_id)
    {
        // TODO: Implement getUser() method.
        return $this->model->where('user_id', $user_id)->first();
    }

    public function createUser(array $userData)
    {
        // TODO: Implement createUser() method.
        return $this->model->create([
            'user_id' => $userData['user_id'],
            'name' => $userData['name'],
            'dob'=>$userData['dob'],
            'ni_number'=>$userData['ni_number'],
            'address' => $userData['address'],
            'password' => hash('sha256', $userData['password']),
            'api_token' => Str::random(60),
        ]);
    }

    public function updateUser($userId, array $newDetails)
    {
        // TODO: Implement updateUser() method.
    }

    public function getPasswordForValidation($user_id)
    {
        $password = DB::table('users')->where('user_id', $user_id)->value('password');
        return $password;

    }


}
