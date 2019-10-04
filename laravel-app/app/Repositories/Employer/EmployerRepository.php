<?php
namespace App\Repositories\Employer;

use App\Repositories\AbstractInterface;

interface EmployerRepository extends AbstractInterface
{
    public function totalItem ();

    public function allEmployer ();

    public function getEmployerDetail($id);

    public function search ($keyword);

    public function getItem ($id);

    public function getJobByEmployer ($employer);

    public function getAllEmployer();
}
