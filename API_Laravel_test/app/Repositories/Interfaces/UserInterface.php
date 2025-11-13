<?php

namespace App\Repositories\Interfaces;
use App\Models\User;
interface UserInterface
{
    public function index();
    public function store(array $data);
    public function findByID(int $id);
    public function update(User $user, array $data);
    public function destroy(User $user);
}
