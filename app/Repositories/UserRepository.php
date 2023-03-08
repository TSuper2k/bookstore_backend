<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAllUsers()
    {
        $users = $this->user->get();

        return $users;
    }

    public function getUserById($id)
    {
        $user = $this->user->find($id);

        return $user;
    }

    public function createUser($data)
    {
        $user = $this->user->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password
        ]);

        return $user;
    }

    public function updateUser($data, $id)
    {
        $user = $this->user->find($id);

        if($user){
            $user->update([
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password
            ]);

            return $user;
        }

        return null;
    }

    public function deleteUser($id)
    {
        $user = $this->user->find($id);

        $user->delete();
    }
}
