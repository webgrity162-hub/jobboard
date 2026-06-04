<?php

namespace App\Services\Repositories;

use App\Models\Application;
use App\Models\CompanyJob;
use App\Services\Interfaces\ApplicationRepositoryInterface;

class ApplicationRepository implements ApplicationRepositoryInterface
{
    public function store(array $data)
    {
        // dd($data);
        return Application::create($data);
    }

    public function getApplicationsByUserId(int $user_id)
    {
        return Application::with('companyJob.company')->where('user_id', $user_id)->get();
    }
    public function hasApplied(int $user_id, int $company_job_id): bool
    {
        return Application::where('user_id', $user_id)
            ->where('company_job_id', $company_job_id)
            ->exists();
    }

    public function isJobActive(int $company_job_id): bool
    {
        $job = CompanyJob::select('id', 'expires_at', 'deleted_at')
            ->where('id', $company_job_id)
            ->first();

        if (!$job)
            return false;

        return is_null($job->deleted_at) && $job->expires_at > now();
    }

    public function getFiltered($company_id, array $data)
    {
        return Application::with(['user', 'companyJob'])
            ->whereHas('companyJob', function ($query) use ($company_id,$data) {
                $query->where('company_id', $company_id);
                if(!empty( $data['job_slug'])){
                     $query->where('slug', $data['job_slug']);
                }
            })->when($data['status'] ?? null, function ($query, $status) {
                $query->where('status', $status);
            })->when($data['search'] ?? null, function ($query, $search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
            })->latest()->paginate(5);

    }

public function getApplicationById(int $application_id){
    
    return Application::with(['user', 'companyJob'])->find($application_id);
}

public function updateStatus(int $application_id, string $status){
    $application = Application::find($application_id);
    if($application){
        $application->status = $status;
        return $application->save();
    }
    return false;
    }
}