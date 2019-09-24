<?php
namespace App\Repositories\Job;

use App\Repositories\AbstractInterface;

interface JobRepository extends AbstractInterface
{
    public function allJob ();

    public function totalItem ();
    
    public function relatedJob($id);

    public function getJobDetail($id);
}
