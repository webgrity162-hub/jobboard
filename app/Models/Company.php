<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['user_id', 'name', 'slug', 'email', 'phone',
        'website', 'logo', 'description', 'location',
        'size', 'is_verified'];
        protected $casts = [
            'is_verified' => 'boolean',
        ];
    public function user(){
       return $this->belongsTo(User::class);
    }
   
    public function companyJob()
    {
        return $this->hasMany(CompanyJob::class);
    }
    public function activeJob(){
        return $this->hasMany(CompanyJob::class)->where('status','active');
    }
}
