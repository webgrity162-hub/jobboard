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

    public function create($data)
    {
        $data['slug'] = \Illuminate\Support\Str::slug($data['title']) . '-' . uniqid();
        // dd($data);
        return $this->jobRepository->create($data);
    }
    public function update($id, $data)
    {
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
}
