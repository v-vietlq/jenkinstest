<?php
namespace App\Repositories\Category_Job;

use App\Repositories\AbstractInterface;

interface CategoryJobRepository extends AbstractInterface
{
    public function getCateByJob ($job);

    public function getJobByCate ($cate);

    public function deleteCateByJob ($job);

}
