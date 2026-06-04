<?php
namespace App\Services;

use App\Events\ApplicationStatusChanged;
use App\Events\JobApplicationSubmitted;
use App\Models\Application;
use App\Models\CompanyJob;
use App\Services\Interfaces\ApplicationRepositoryInterface;

class ApplicationService
{
    private array $allowedTransitions = [
        'pending' => ['reviewing'],
        'reviewing' => ['shortlisted', 'rejected'],
        'shortlisted' => ['interviewing', 'rejected'],
        'interviewing' => ['hired', 'rejected'],
        'rejected' => ['hired'],
        'hired' => ['rejected'],
    ];
    protected ApplicationRepositoryInterface $applicationRepository;
    public function __construct(ApplicationRepositoryInterface $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
    }

    public function getApplicationsByUserId(int $user_id)
    {
        return $this->applicationRepository->getApplicationsByUserId($user_id);
    }

    public function store(array $data)
    {
        if (!$this->applicationRepository->isJobActive($data['company_job_id'])) {
            return [
                'success' => false,
                'message' => 'Job is not active!'
            ];
        }
        if ($this->applicationRepository->hasApplied($data['user_id'], $data['company_job_id'])) {
            return [
                'success' => false,
                'message' => 'You have already applied for this job!'
            ];
        }
        $application = $this->applicationRepository->store($data);
        if ($application) {
            event(new JobApplicationSubmitted($application));
            return [
                'success' => true,
                'message' => 'Application submitted successfully!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Application submission failed!'
            ];
        }
    }

    public function getFiltered($company_id, array $data)
    {
        return $this->applicationRepository->getFiltered($company_id, $data);
    }

    public function getApplicationById(int $application_id)
    {
        $applicants = $this->applicationRepository->getApplicationById($application_id);

        $applicants['cover_letter'] = json_decode($applicants->cover_letter, true);
        // return $this->applicationRepository->getApplicationById($application_id);
        return $applicants;
    }

    public function updateStatus(int $application_id, string $status)
    {
        $application = $this->applicationRepository->getApplicationById($application_id);
        
        if (!in_array( $status, $this->allowedTransitions[$application->status])) {
            return [
                'success' => false,
                'message' => 'Invalid status transition!'
            ];
        }

        $oldStatus = $application->status;

        $isUpdated = $this->applicationRepository->updateStatus($application_id, $status);

        if ($isUpdated) {
            event(new ApplicationStatusChanged($application, $oldStatus, $status));
            return [
                'success' => true,
                'message' => 'Application status updated successfully!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to update application status!'
            ];
        }
       
    }


}