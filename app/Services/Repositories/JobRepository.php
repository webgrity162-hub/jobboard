<?php
namespace App\Services\Repositories;

use App\Models\CompanyJob;
use App\Services\Interfaces\JobRepositoryInterface;

class JobRepository implements JobRepositoryInterface
{
    public function getAll(array $data)
    {
        return CompanyJob::query()->with(['company', 'applicants'])
            ->when($data['title'] ?? null, function ($query) use ($data) {
                $query->where('title', 'like', '%' . $data['title'] . '%');
            })
            ->when($data['location'] ?? null, function ($query) use ($data) {
                $query->where('location', 'like', '%' . $data['location'] . '%');
            })->orderBy('created_at', 'desc')
            ->paginate($data['item'] ?? 4);
    }
    public function getBySlug($slug)
    {
        return CompanyJob::with(['company', 'applicants'])->where('slug', $slug)->first();
    }

    public function getByCompanyAndId($company_id, $id)
    {
        return CompanyJob::where('company_id', $company_id)->find($id);
    }

    public function create($data)
    {
        // dd($data);
        return CompanyJob::create($data);
    }
    public function update($id, $data)
    {
        return CompanyJob::find($id)->update($data);
    }

    public function delete($id)
    {
        return CompanyJob::find($id)->delete();
    }

    public function getJobByCompany($id)
    {
        return CompanyJob::where('company_id', $id)->get();
    }
    public function getJobForCompany($id, $data)
    {
        return CompanyJob::select(['id', 'title', 'slug', 'location', 'type', 'status', 'expires_at'])
            ->withCount('applicants')
            ->where('company_id', $id)
            ->when($data['status'] ?? null, function ($query, $status) {
                if ($status == 'closed') {
                    $query->where('expires_at', '<', now());
                } else {
                    $query->where('status', $status)->where('expires_at', '>', now());
                }
            })
            ->latest()
            ->paginate(5);
    }
    public function getJobCount($company_id): array
    {
        $jobs = CompanyJob::where('company_id', $company_id)->get(['status', 'expires_at']);

        return [
            'all' => $jobs->count(),
            'active' => $jobs->where('status', 'active')->where('expires_at', '>', now())->count(),
            'draft' => $jobs->where('status', 'draft')->count(),
            'closed' => $jobs->where('expires_at', '<', now())->count(),
        ];
    }

    public function getJobWithApplicants($id){
        return CompanyJob::select(['id'])->withCount('applicants')->find($id);
    }
}
