<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostRequest;
use App\Services\ApplicationService;
use App\Services\JobService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

class EmployerController extends Controller
{
    protected $application;
    public function __construct(ApplicationService $applicationService)
    {
        $this->application = $applicationService;
    }
    public function applicants(Request $req, JobService $jobService, ApplicationService $applicationService)
    {
        // dd($req->all());
        $jobs = $jobService->getJobByCompany(auth()->user()->company->id);
        $applicants = $applicationService->getFiltered(
            auth()->user()->company->id,
            $req->only(['job_slug', 'status', 'search'])
        );

        $applicantsStatusCounts = [];
        $applicants->where('job_id', $req->job_slug)->groupBy('status')->each(function (Collection $group, $status) use (&$applicantsStatusCounts) {
            $applicantsStatusCounts[$status] = $group->count();
        });
    // dd($applicantsStatusCounts);

        if ($req->ajax()) {

            return view('employer.partials.applicants-table', compact('applicants', 'applicantsStatusCounts'));
        }
        return view('employer.applicants', [
            'applicants' => $applicants,
            'jobs' => $jobs,
            'applicantsStatusCounts' => $applicantsStatusCounts
        ]);
    }

    public function applicantShow(int $id)
    {
        // $applicant = $this->applicantsData()->firstWhere('id', 1);
        $applicant = $this->application->getApplicationById($id);


        abort_if(!$applicant, 404);
        // dd($applicant);
        return view('employer.applicant-detail', [
            'applicant' => $applicant,
        ]);
    }

    public function manageJobs(Request $request, JobService $jobService)
    {
        $status = $request->status === 'all' ? null : $request->status;

        $results = $jobService->getJobForCompany(
            auth()->user()->company->id,
            ['status' => $status]
        );
        // dd($jobs);
        if ($request->ajax()) {
            return view('employer.partials.jobs-table', [
                'jobs' => $results['jobs'],
                'counts' => $results['counts']
            ]);
        }

        return view('employer.manage-jobs', [
            'jobs' => $results['jobs'],
            'counts' => $results['counts'],
        ]);
    }

    public function postNewjob()
    {
        return view('employer.post-new-job');
    }

    public function editJob(int $id, JobService $jobService)
    {
        $job = $jobService->getByCompanyAndId(auth()->user()->company->id, $id);

        abort_if(!$job, 404);

        return view('employer.post-new-job', compact('job'));
    }

    public function postNewJobStore(JobPostRequest $request, JobService $jobService)
    {
        $validated = $request->validated();

        $data = $this->jobPayload($validated);
        $data['company_id'] = auth()->user()->company->id;

        // dd($data);
        $jobService->create($data);

        return redirect()->route('employer.manageJobs')->with('success', 'Job posted successfully!');
    }

    public function updateJob(int $id, JobPostRequest $request, JobService $jobService)
    {
        $job = $jobService->getByCompanyAndId(auth()->user()->company->id, $id);

        abort_if(!$job, 404);

        $changes = $this->changedJobPayload($job, $this->jobPayload($request->validated()));

        if (empty($changes)) {
            throw ValidationException::withMessages([
                'update' => 'Please change something for update.',
            ]);
        }

        if ($job->applicants()->exists()) {
            $lockedFields = array_diff(array_keys($changes), ['status', 'expires_at']);

            if (!empty($lockedFields)) {
                throw ValidationException::withMessages([
                    'update' => 'This job already has applicants, so only status and expiry date can be updated.',
                ]);
            }
        }

        $jobService->update($job->id, $changes);

        return redirect()->route('employer.manageJobs')->with('success', 'Job updated successfully!');
    }

    public function deleteJob(int $id, JobService $jobService)
    {
        $job = $jobService->getByCompanyAndId(auth()->user()->company->id, $id);

        abort_if(!$job, 404);

        $jobService->delete($job->id);

        return redirect()->route('employer.manageJobs')->with('success', 'Job deleted successfully!');
    }

    public function updateStatus(Request $request, int $id)
    {
        $request->validate([
            'status' => 'required|in:pending,reviewing,shortlisted,interviewing,rejected,hired',
        ]);
        $updated = $this->application->updateStatus($id, $request->input('status'));

        if ($updated['success']) {
            return response()->json([
                'success' => true,
                'message' => $updated['message']
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => $updated['message']
            ], 422);
        }
    }

    

    public function companyProfile()
    {
        $company = auth()->user()?->company;

        $profile = [
            'name' => $company?->name ?? 'TalentStream AI',
            'industry' => 'Technology & Software',
            'website' => $company?->website ?? 'https://talentstream.ai',
            'headquarters' => $company?->location ?? 'San Francisco, CA',
            'size' => $company?->size ?? '51-200 employees',
            'description' => $company?->description ?? 'TalentStream AI is a leading-edge recruitment platform dedicated to connecting top-tier talent with visionary organizations. Founded in 2018, we leverage advanced analytics and a human-centric approach to streamline the hiring process for high-stakes roles. Our mission is to empower recruiters with the tools they need to build world-class teams with precision and speed.',
            'logo' => $company?->logo ? asset('storage/' . $company->logo) : null,
            'verified' => $company?->is_verified ?? true,
            'last_updated' => '2 days ago',
            'public_url' => '#',
        ];

        return view('employer.company-profile', [
            'profile' => $profile,
        ]);
    }


   

    private function jobPayload(array $validated): array
    {
        return [
            'title' => $validated['title'],
            'location' => $validated['location'],
            'category' => $validated['category'],
            'type' => $validated['type'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'experience' => $validated['experience'],
            'salary_min' => $validated['salary-min'],
            'salary_max' => $validated['salary-max'],
            'currency' => $validated['currency'],
            'expires_at' => $validated['expire_at'],
            'responsibilities' => array_filter(explode("\n", str_replace("\r", "", $validated['responsibilities']))),
            'requirements' => array_filter(explode("\n", str_replace("\r", "", $validated['requirements']))),
            'benefits' => $validated['benefits'] ? array_filter(explode("\n", str_replace("\r", "", $validated['benefits']))) : [],
        ];
    }

    private function changedJobPayload($job, array $payload): array
    {
        return collect($payload)
            ->filter(fn($value, $field) => $this->normalizeJobValue($field, $value) !== $this->normalizeJobValue($field, $job->{$field}))
            ->all();
    }

    private function normalizeJobValue(string $field, $value)
    {
        if ($field === 'expires_at') {
            return $value ? Carbon::parse($value)->toDateString() : null;
        }

        if (in_array($field, ['salary_min', 'salary_max'])) {
            return $value === null ? null : number_format((float) $value, 2, '.', '');
        }

        if (in_array($field, ['responsibilities', 'requirements', 'benefits'])) {
            return array_values($value ?? []);
        }

        return $value;
    }
}
