<?php
namespace App\Services\Interfaces;

interface ApplicationRepositoryInterface{
    public function store(array $data);
    public function getApplicationsByUserId(int $user_id);
    public function hasApplied(int $user_id, int $company_job_id): bool;
    public function isJobActive(int $company_job_id): bool;
    public function getFiltered($comnpany_id, array $data);
 public function getApplicationById(int $application_id);
 public function updateStatus(int $application_id, string $status);

}