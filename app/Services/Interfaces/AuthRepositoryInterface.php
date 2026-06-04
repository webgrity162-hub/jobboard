<?php
namespace App\Services\Interfaces;

use App\Models\User;

interface AuthRepositoryInterface{
    public function register(array $data);
    public function login(array $data);
    public function logout();
    public function setupCompany(array $data);
    public function updateProfile(User $user);
    public function updatePassword(User $user, array $data);
}