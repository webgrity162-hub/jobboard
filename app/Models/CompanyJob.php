<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyJob extends Model
{
     use SoftDeletes;

    protected $fillable = [
        'company_id', 'title', 'slug', 'description', 'location',
        'type', 'experience', 'salary_min', 'salary_max',
        'currency', 'status', 'expires_at', 'responsibilities','requirements','benefits','category'
    ];

    protected $casts = [
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
        'expires_at' => 'datetime',
        'responsibilities' => 'array',
        'requirements'     => 'array',
        'benefits'         => 'array',
    ];
    public function application(){
        return $this->hasMany(Application::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function applicants()
    {
        return $this->belongsToMany(User::class, 'applications')
                    ->withPivot('status', 'cover_letter')
                    ->withTimestamps();
    }
    
}
