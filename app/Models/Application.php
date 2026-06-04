<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
      protected $fillable = [
        'user_id', 'company_job_id', 'cover_letter',
        'resume', 'status', 'notes'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
     public function companyJob(){
        return $this->belongsTo(CompanyJob::class);
     }

    

}
