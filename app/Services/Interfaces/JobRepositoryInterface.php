<?php
namespace App\Services\Interfaces;

Interface JobRepositoryInterface{
    public function getAll(array $data);
    public function getBySlug($slug);
    public function getByCompanyAndId($company_id, $id);
    public function create($data);
    public function update($id,$data);
    public function delete($id);
    public function getJobByCompany($id);
    public function getJobForCompany($id, $data);

    public function getJobCount($company_id);
    public function getJobWithApplicants($id);
}

