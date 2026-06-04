<?php
namespace App\Services\Repositories;

use App\Models\Company;
use App\Models\User;
use App\Services\Interfaces\AuthRepositoryInterface;


class AuthRepository implements AuthRepositoryInterface
{
    public function register(array $data)
    {
        $name = $data['first_name'].' '.$data['last_name'] ;  
        $user = User::create([
            'name'=>$name,
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'bio'=>$data['bio'],
            'avatar'=>$data['avatar'] ?? '',
            'password'=>bcrypt($data['password']),
            'role'=>$data['role'],
        ]);
       return $user;
    }
    public function login(array $data)
    {
        
    }
    public function logout()
    {

    }
    public function setupCompany(array $data){
        $company = Company::create([
            'user_id'=>$data['user_id'],
            'name'=>$data['name'],
            'slug'=>$data['slug'],
            'size'=>$data['size'],
            'logo'=>$data['logo'] ?? '',
            'description'=>$data['description'],
            'website'=>$data['website'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'location'=>$data['location'],
            
        ]);
        return $company;

    }

    public function updateProfile(User $user){
        $user->save();
        return $user;
    }
    public function updatePassword(User $user,array $data){
       $user->update($data);
    }

}