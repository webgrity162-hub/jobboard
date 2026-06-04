<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostRequest;
use App\Services\ApplicationService;
use App\Services\JobService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class EmployerController extends Controller
{
    protected $application;
    public function __construct(ApplicationService $applicationService){
        $this->application = $applicationService;
    }
    public function applicants(Request $req, JobService $jobService, ApplicationService $applicationService)
    {
        $jobs = $jobService->getJobByCompany(auth()->user()->company->id);
        $applicants = $applicationService->getFiltered(
            auth()->user()->company->id,
            $req->only(['job_slug', 'status', 'search'])
        );

        
            if($req->ajax()) {
                
            return view('employer.partials.applicants-table', compact('applicants'));
        }
        return view('employer.applicants', [
            'applicants' => $applicants,
            'jobs' => $jobs
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

    public function manageJobs()
    {
        return view('employer.manage-jobs');
    }

    public function postNewjob()
    {
        return view('employer.post-new-job');
    }

    public function postNewJobStore(JobPostRequest $request, JobService $jobService)
    {
        $validated = $request->validated();

        // Map field names from view to database
        $data = [
            'company_id' => auth()->user()->company->id,
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
            // Convert textarea lines to arrays for JSON storage
            'responsibilities' => array_filter(explode("\n", str_replace("\r", "", $validated['responsibilities']))),
            'requirements' => array_filter(explode("\n", str_replace("\r", "", $validated['requirements']))),
            'benefits' => $validated['benefits'] ? array_filter(explode("\n", str_replace("\r", "", $validated['benefits']))) : [],
        ];
        // dd($data);
        $jobService->create($data);

        return redirect()->route('employer.manageJobs')->with('success', 'Job posted successfully!');
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
            ],422);
        }
    }

    private function applicantsData(): Collection
    {
        return collect([
            [
                'id' => 1,
                'name' => 'Jordan Davis',
                'email' => 'jordan.davis@email.com',
                'phone' => '+1 (409) 433-7848',
                'location' => 'Boston, MA',
                'experience' => '11 years',
                'current_role' => 'Senior Software Engineer',
                'company' => 'Remote Co.',
                'university' => 'M.I.T Computer Science',
                'status' => 'Interviewing',
                'status_class' => 'bg-emerald-100 text-emerald-700',
                'initials' => 'JD',
                'initials_bg' => 'bg-blue-100 text-blue-700',
                'type' => 'Full-time',
                'applied' => '2 days ago',
                'skills' => ['React', 'Node.js', 'TypeScript'],
                'match' => 'Stage 2 Technical Interview',
                'cover_letter' => [
                    'Dear Hiring Team,',
                    'I am writing to express my enthusiastic interest in the Senior Frontend Architect role at Horizon Works. With over 8 years of experience building scalable, high-performance web applications, I have developed a deep expertise in React, TypeScript, and modern design systems that I believe would be a strong fit for your team.',
                    'In my previous role at Northline, I led the architectural migration of our core dashboard from a monolithic structure to a micro-frontend ecosystem. That transition resulted in a 40% reduction in build times and significantly improved developer velocity across four product teams.',
                    'What excites me most about Horizon is your commitment to professional design quality and long-term platform maintainability. I am particularly impressed by the distributed approach to frontend components, and I would welcome the opportunity to contribute to a team that values engineering rigor and user experience equally.',
                    'I look forward to discussing how my skills in frontend architecture and team leadership can contribute to Horizon\'s continued success.',
                    'Best regards,',
                    'Jordan Davis',
                ],
                'notes' => [
                    [
                        'author' => 'Ava',
                        'role' => 'Tech Lead',
                        'time' => '4 hours ago',
                        'text' => 'Left a note for the hiring team. Strong system design background and clear communication during the recruiter screen.',
                        'color' => 'bg-slate-900 text-white',
                    ],
                    [
                        'author' => 'Marcus Reed',
                        'role' => 'Hiring Manager',
                        'time' => '1 day ago',
                        'text' => 'Really solid hands-on assessment score. The implementation of shared UI patterns was very clean. Definitely moving forward to the next round.',
                        'color' => 'bg-blue-50 text-slate-600',
                    ],
                    [
                        'author' => 'Sarah Thompson',
                        'role' => 'Recruiter',
                        'time' => 'Yesterday',
                        'text' => 'Reply received ahead of the requested window. Availability is flexible and compensation aligns well with the approved band.',
                        'color' => 'bg-emerald-50 text-slate-600',
                    ],
                ],
            ],
            [
                'id' => 2,
                'name' => 'Sarah Jenkins',
                'email' => 'sarah.j@example.com',
                'phone' => '+1 (212) 555-0146',
                'location' => 'New York, NY',
                'experience' => '8 years',
                'current_role' => 'Senior Software Engineer',
                'company' => 'Acme Labs',
                'university' => 'Stanford University',
                'status' => 'Shortlisted',
                'status_class' => 'bg-fuchsia-100 text-fuchsia-700',
                'initials' => 'SJ',
                'initials_bg' => 'bg-blue-100 text-blue-700',
                'type' => 'Full-time',
                'applied' => '2 days ago',
                'skills' => ['React', 'GraphQL', 'System Design'],
                'match' => 'Portfolio Review',
            ],
            [
                'id' => 3,
                'name' => 'Marcus Rodriguez',
                'email' => 'm.rodriguez@company.org',
                'phone' => '+1 (646) 555-0198',
                'location' => 'Austin, TX',
                'experience' => '7 years',
                'current_role' => 'Senior Backend Engineer',
                'company' => 'ScaleCore',
                'university' => 'UT Austin',
                'status' => 'Reviewing',
                'status_class' => 'bg-blue-100 text-blue-700',
                'initials' => 'MR',
                'initials_bg' => 'bg-indigo-100 text-indigo-700',
                'type' => 'Full-time',
                'applied' => 'Oct 24, 2023',
                'skills' => ['Laravel', 'MySQL', 'AWS'],
                'match' => 'Resume Review',
            ],
            [
                'id' => 4,
                'name' => 'Linda Lee',
                'email' => 'lee.linda@email.com',
                'phone' => '+1 (415) 555-0103',
                'location' => 'Seattle, WA',
                'experience' => '9 years',
                'current_role' => 'Software Architect',
                'company' => 'CloudBridge',
                'university' => 'Carnegie Mellon',
                'status' => 'Pending',
                'status_class' => 'bg-amber-100 text-amber-700',
                'initials' => 'LL',
                'initials_bg' => 'bg-emerald-100 text-emerald-700',
                'type' => 'Contract',
                'applied' => 'Oct 22, 2023',
                'skills' => ['Architecture', 'Microservices', 'Leadership'],
                'match' => 'Pending Recruiter Review',
            ],
            [
                'id' => 5,
                'name' => 'David Kim',
                'email' => 'dkim.design@web.com',
                'phone' => '+1 (310) 555-0134',
                'location' => 'Los Angeles, CA',
                'experience' => '5 years',
                'current_role' => 'Frontend Engineer',
                'company' => 'Pixel Foundry',
                'university' => 'UCLA',
                'status' => 'Rejected',
                'status_class' => 'bg-rose-100 text-rose-700',
                'initials' => 'DK',
                'initials_bg' => 'bg-slate-100 text-slate-700',
                'type' => 'Full-time',
                'applied' => 'Oct 21, 2023',
                'skills' => ['Vue', 'Figma', 'CSS'],
                'match' => 'Closed Application',
            ],
            [
                'id' => 6,
                'name' => 'Angela White',
                'email' => 'angela@cloudcareers.io',
                'phone' => '+1 (206) 555-0110',
                'location' => 'Denver, CO',
                'experience' => '6 years',
                'current_role' => 'DevOps Specialist',
                'company' => 'OpsLayer',
                'university' => 'Georgia Tech',
                'status' => 'Hired',
                'status_class' => 'bg-emerald-100 text-emerald-700',
                'initials' => 'AW',
                'initials_bg' => 'bg-green-100 text-green-700',
                'type' => 'Full-time',
                'applied' => 'Oct 18, 2023',
                'skills' => ['Docker', 'Kubernetes', 'CI/CD'],
                'match' => 'Offer Accepted',
            ],
            [
                'id' => 7,
                'name' => 'Noah Patel',
                'email' => 'noah.patel@hiremail.dev',
                'phone' => '+1 (617) 555-0177',
                'location' => 'Chicago, IL',
                'experience' => '4 years',
                'current_role' => 'Product Designer',
                'company' => 'Northstar',
                'university' => 'RISD',
                'status' => 'New',
                'status_class' => 'bg-slate-100 text-slate-700',
                'initials' => 'NP',
                'initials_bg' => 'bg-orange-100 text-orange-700',
                'type' => 'Contract',
                'applied' => 'Oct 17, 2023',
                'skills' => ['Product Design', 'Wireframing', 'Research'],
                'match' => 'New Application',
            ],
            [
                'id' => 8,
                'name' => 'Priya Sharma',
                'email' => 'priya.sharma@uxlabs.in',
                'phone' => '+91 98765 44321',
                'location' => 'Bengaluru, IN',
                'experience' => '6 years',
                'current_role' => 'UX Researcher',
                'company' => 'UX Labs',
                'university' => 'NID Ahmedabad',
                'status' => 'Interviewing',
                'status_class' => 'bg-cyan-100 text-cyan-700',
                'initials' => 'PS',
                'initials_bg' => 'bg-pink-100 text-pink-700',
                'type' => 'Full-time',
                'applied' => 'Oct 16, 2023',
                'skills' => ['User Research', 'Interviews', 'Journey Maps'],
                'match' => 'Interview Loop',
            ],
            [
                'id' => 9,
                'name' => 'Ethan Brown',
                'email' => 'ethan.brown@product.io',
                'phone' => '+1 (503) 555-0108',
                'location' => 'Portland, OR',
                'experience' => '5 years',
                'current_role' => 'QA Automation Engineer',
                'company' => 'Product.io',
                'university' => 'Oregon State',
                'status' => 'Reviewing',
                'status_class' => 'bg-blue-100 text-blue-700',
                'initials' => 'EB',
                'initials_bg' => 'bg-violet-100 text-violet-700',
                'type' => 'Full-time',
                'applied' => 'Oct 15, 2023',
                'skills' => ['Cypress', 'Playwright', 'Testing'],
                'match' => 'Assessment Review',
            ],
        ]);
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


    private function toJson($data)
    {
        $lines = explode("\n", $data);
        $lines = array_filter(
            array_map('trim', $lines),
            fn($title) => !empty($title)
        );

        return json_encode($lines);
    }
}
