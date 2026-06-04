<?php
namespace App\Services\Interfaces;

Interface JobRepositoryInterface{
    public function getAll(array $data);
    public function getBySlug($slug);
    public function create($data);
    public function update($id,$data);
    public function delete($id);
    public function getJobByCompany($id);
}

