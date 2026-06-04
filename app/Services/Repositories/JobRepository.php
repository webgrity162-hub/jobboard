<?php
namespace App\Services\Repositories;

use App\Models\CompanyJob;
use App\Services\Interfaces\JobRepositoryInterface;

class JobRepository implements JobRepositoryInterface{
    public function getAll(array $data){
        return CompanyJob::query()->with(['company','applicants'])
        ->when($data['title'] ?? null,function($query) use($data){
            $query->where('title','like','%'.$data['title'].'%');
        })
        ->when($data['location'] ?? null,function($query) use($data){
            $query->where('location','like','%'.$data['location'].'%');
        })->orderBy('created_at','desc')
        ->paginate($data['item'] ?? 4);
    }
    public function getBySlug($slug){
        return CompanyJob::with(['company','applicants'])->where('slug',$slug)->first();
    }
    public function create($data){
        // dd($data);
        return CompanyJob::create($data);
    }
    public function update($id,$data){
        return CompanyJob::find($id)->update($data);
    }

    public function delete($id){
        return CompanyJob::find($id)->delete();
    }

    public function getJobByCompany($id){
        return CompanyJob::where('company_id',$id)->get();
    }
}
