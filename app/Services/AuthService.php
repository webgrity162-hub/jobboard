<?php

namespace App\Services;

use App\Models\User;
use App\Services\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthService{
    protected AuthRepositoryInterface $authRepo;
    public function __construct(AuthRepositoryInterface $authRepo){
        $this->authRepo = $authRepo;
    }
    public function register(array $data){
        if(isset($data['avatar'])){
            $data['avatar'] = $data['avatar']->store('avatars','public');
        }
       $user = $this->authRepo->register($data);
       if($user['role'] == 'employer'){
        $loginData = [
            'email' => $user->email,
            'password' => $data['password']
        ];
           $this->login($loginData);
       }
       return $user;
    }
    public function login(array $data){
          if(Auth::attempt([ 'email' => $data['email'], 
    'password' => $data['password']])){
            return true;
          }
        
        return false;
    }
    public function setupCompany(array $data){
        $user_id = Auth::id();
        $data['user_id'] = $user_id;
        $data['slug'] = Str::slug($data['name']);
        $data['size'] = Str::trim($data['company_size'],'employees');
        if(isset($data['logo'])){
            $data['logo'] = $data['logo']->store('companies','public');
        }
        $company = $this->authRepo->setupCompany($data);
        return $company;

    }

    public function updateProfile(User $user,array $data){
        if(isset($data['avatar'])){
            if($user->avatar){
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $data['avatar']->store('avatars','public');
        }
        $user->fill($data);
        if($user->isDirty()){
            $this->authRepo->updateProfile($user);
        }
        return $user;
    }

    public function updatePassword(User $user, array $data){
        if(!\Illuminate\Support\Facades\Hash::check($data['current_password'], $user->password)){
            return false;
        }
       $updateData = [
            'password' => $data['new_password'],
       ];
        $this->authRepo->updatePassword($user, $updateData);
        return true;
    }
    
}