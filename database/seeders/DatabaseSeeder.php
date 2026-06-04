<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;

use App\Models\Application;
use App\Models\CompanyJob;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@jobboard.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Create 5 Employers + their Companies + Jobs
        $jobTitles = [
            'Backend Laravel Developer',
            'Frontend React Developer',
            'Full Stack Engineer',
            'DevOps Engineer',
            'Mobile Developer',
            'UI/UX Designer',
            'Data Analyst',
            'Product Manager',
        ];

        $companies = [
            ['name' => 'TechCorp Solutions', 'location' => 'New York, USA'],
            ['name' => 'StartupHub', 'location' => 'London, UK'],
            ['name' => 'Digital Agency Pro', 'location' => 'Dubai, UAE'],
            ['name' => 'CloudBase Inc', 'location' => 'Berlin, Germany'],
            ['name' => 'FinTech Ventures', 'location' => 'Singapore'],
        ];

        foreach ($companies as $index => $companyData) {
            // Create employer user
            $employer = User::create([
                'name' => 'Employer ' . ($index + 1),
                'email' => 'employer' . ($index + 1) . '@jobboard.com',
                'password' => bcrypt('password'),
                'role' => 'employer',
            ]);

            // Create their company
            $company = Company::create([
                'user_id' => $employer->id,
                'name' => $companyData['name'],
                'slug' => Str::slug($companyData['name']),
                'email' => 'hr@' . Str::slug($companyData['name']) . '.com',
                'location' => $companyData['location'],
                'description' => 'We are ' . $companyData['name'] . ', a leading tech company.',
                'size' => collect(['10-15', '20-50', '50-150'])->random(),
                'is_verified' => true,
            ]);

            // Create 3 jobs per company
            foreach (array_slice($jobTitles, 0, 3) as $title) {
                CompanyJob::create([
                    'company_id' => $company->id,
                    'title' => $title,
                    'slug' => Str::slug($title . '-' . $company->id . '-' . rand(1, 999)),
                    'description' => 'We are looking for an experienced ' . $title . ' to join our team. You will work on exciting projects with a great team.',
                    'requirements' => json_encode([
                        'Bachelor degree in Computer Science',
                        '2+ years of experience',
                        'Strong knowledge of PHP/Laravel',
                        'Good communication skills',
                    ]),
                    'benefits' => json_encode([
                        'Competitive salary',
                        'Remote work options',
                        'Health insurance',
                        'Annual bonus',
                    ]),
                    'responsibilities' => json_encode([
                        'Build and maintain REST APIs',
                        'Write clean and testable code',
                        'Collaborate with the team',
                        'Participate in code reviews',
                    ]),
                    'location' => $companyData['location'],
                    'type' => collect(['full-time', 'remote', 'contract'])->random(),
                    'experience' => collect(['entry', 'mid', 'senior'])->random(),
                    'salary_min' => rand(3, 8) * 1000,
                    'salary_max' => rand(9, 20) * 1000,
                    'currency' => 'USD',
                    'status' => 'active',
                    'expires_at' => now()->addDays(rand(10, 60)),
                ]);
            }
        }

        // 3. Create 10 Candidates
        $candidates = [];
        for ($i = 1; $i <= 10; $i++) {
            $candidates[] = User::create([
                'name' => 'Candidate ' . $i,
                'email' => 'candidate' . $i . '@jobboard.com',
                'password' => bcrypt('password'),
                'role' => 'candidate',
                'bio' => 'Experienced developer with ' . $i . ' years of experience.',
            ]);
        }

        // 4. Create Applications (each candidate applies to 3 random jobs)
        $jobs = CompanyJob::all();

        foreach ($candidates as $candidate) {
            $appliedJobs = $jobs->random(3);

            foreach ($appliedJobs as $job) {
                Application::create([
                    'user_id' => $candidate->id,
                    'company_job_id' => $job->id,
                    'cover_letter' => 'I am very interested in the ' . $job->title . ' position. I have relevant experience and would love to contribute to your team.',
                    'status' => collect(['pending', 'reviewing', 'shortlisted', 'rejected'])->random(),
                ]);
            }
        }
    }
}