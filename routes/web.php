<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PublicJobController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PublicJobController::class, 'home'])->name('home');

// Public Job Routes
Route::get('/jobs', [PublicJobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{slug}', [PublicJobController::class, 'show'])->name('jobs.show');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {



    Route::middleware(['role:employer', 'isSetUpCompanyDetails'])->group(function () {
        Route::get('/employer/setup-company', function () {
            return view('employer.setup-company');
        })->name('employer.setup-company');

        Route::post('/employer/setup-company', [AuthController::class, 'setupCompany'])->name('employer.setup-company.post');
        Route::get('/employer/dashboard', function () {
            return view('employer.dashboard');
        })->name('employer.dashboard');

        Route::get('/employer/applicants', [EmployerController::class, 'applicants'])->name('employer.applicants');
        Route::get('/employer/applicants/{id}', [EmployerController::class, 'applicantShow'])->name('employer.applicants.show');
        Route::get('/employer/manage-jobs', [EmployerController::class, 'manageJobs'])->name('employer.manageJobs');
        Route::get('/employer/post-job', [EmployerController::class, 'postNewjob'])->name('employer.post.new.job');
        Route::get('/employer/company-profile', [EmployerController::class, 'companyProfile'])->name('employer.company.profile');
        Route::post('/employer/post-job-new', [EmployerController::class, 'postNewJobStore'])->name('employer.post-new-job-store');
        Route::patch(
            '/employer/applications/{id}/status',
            [EmployerController::class, 'updateStatus']
        )
            ->name('employer.applications.status');

    });



    Route::middleware(['role:candidate'])->group(function () {
        Route::get('/candidate/dashboard', [CandidateController::class, 'index'])->name('candidate.dashboard');

        Route::get('/candidate/jobs', function () {
            return view('candidate.jobs.index');
        })->name('candidate.jobs.index');

        Route::get('/candidate/jobs/{slug}', function ($slug, App\Services\JobService $jobService) {
            $job = $jobService->getBySlug($slug);
            return view('candidate.jobs.show', compact('job'));
        })->name('candidate.jobs.show');

        Route::get('/candidate/job-alerts', function () {
            return view('candidate.job-alerts');
        })->name('candidate.job-alerts');

        Route::get('/candidate/skill-assessments', function () {
            return view('candidate.skill-assessments');
        })->name('candidate.skill-assessments');

        Route::get('/candidate/job-preferences', function () {
            return view('candidate.job-preferences');
        })->name('candidate.job-preferences');

        Route::get('/candidate/settings', [CandidateController::class, 'profileInfo'])->name('candidate.settings');
        Route::post('/candidate/settings', [CandidateController::class, 'updateProfile'])->name('candidate.settings.post');
        Route::post('/candidate/settings-password', [CandidateController::class, 'updatePassword'])->name('candidate.settings-password.post');
        Route::post('/candidate/jobs/{id}/apply', [CandidateController::class, 'apply'])->name('candidate.jobs.apply');
    });

    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/download/{filename}', [CandidateController::class, 'downloadResume'])
        ->name('resume.download')->where('filename', '.*');

    // Mark single notification as read
Route::patch('/notifications/{id}/read', [NotificationController::class, 'markRead'])
     ->name('notifications.read');

// Mark all as read
Route::patch('/notifications/read-all', [NotificationController::class, 'markAllRead'])
     ->name('notifications.readAll');

// View all notifications page
Route::get('/employer/notifications', [NotificationController::class, 'index'])
     ->name('employer.notifications');

});
