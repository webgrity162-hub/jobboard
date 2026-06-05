<?php

namespace App\Services;

use App\Services\Interfaces\JobRepositoryInterface;

class JobService
{
    protected JobRepositoryInterface $jobRepository;
    public function __construct(JobRepositoryInterface $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function getAll(array $data)
    {
        return $this->jobRepository->getAll($data);
    }

    public function getBySlug($slug)
    {
        return $this->jobRepository->getBySlug($slug);
    }

    public function getByCompanyAndId($company_id, $id)
    {
        return $this->jobRepository->getByCompanyAndId($company_id, $id);
    }

    public function create($data)
    {
        $data['slug'] = \Illuminate\Support\Str::slug($data['title']) . '-' . uniqid();
        // dd($data);
        return $this->jobRepository->create($data);
    }
    public function update($id, $data)
    {
        $count = $this->getJobWithApplicants($id);
        if($count->applicants_count >=1){
            return [
                'status' => 'error',
                'message' => 'Cannot update job with applicants'
            ];
        }
        return $this->jobRepository->update($id, $data);
    }
    public function delete($id)
    {
        return $this->jobRepository->delete($id);
    }

    public function getJobByCompany($id)
    {
        return $this->jobRepository->getJobByCompany($id);
    }

    public function getJobForCompany($id, $data)
    {
        $jobs = $this->jobRepository->getJobForCompany($id, $data);
        $counts = $this->jobRepository->getJobCount($id);
        return [
            'jobs' => $jobs,
            'counts' => $counts
        ];
    }

    private function getJobWithApplicants($id){
        return $this->jobRepository->getJobWithApplicants($id);
    }
}
