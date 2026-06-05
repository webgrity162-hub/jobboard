<?php

namespace App\Console\Commands;

use App\Models\CompanyJob;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;


#[Signature('app:expire-jobs')]
#[Description('Command description')]
class ExpireJobs extends Command
{

    protected $signature = 'app:expire-jobs';
    protected $description = 'This command used for chage job status to expired to those jobs are expired';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $updated_count = CompanyJob::where('expires_at', '<', now())->update(['status' => 'closed']);
        $this->info($updated_count . ' jobs are expired');

        return Command::SUCCESS;
    }

    //for run this command
    //php artisan app:expire-jobs
}
