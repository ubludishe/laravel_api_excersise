<?php

namespace App\Repositories;
use App\Models\User;
use App\Repositories\Interfaces\UserInterface;
class UserRepository implements UserInterface
{
    public function index(){
        return User::all();
    }
    public  function store(array $data): User
    {
        return User::create($data);
    }

    public function destroy(User $user): bool
    {
        return $user->delete();
    }

    public function update(User $user, $data): User
    {
        $user->update($data);
        return $user;
    }

    public function findByID($id)
    {
        return User::find($id);
    }
}
