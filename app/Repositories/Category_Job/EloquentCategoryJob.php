<?php
namespace App\Repositories\Category_Job;

use App\Models\Category_Job;
use App\Repositories\AbstractRepository;

class EloquentCategoryJob extends AbstractRepository implements CategoryJobRepository
{
    /**
     * @var Employer_Job
     */
    protected $model;

    /**
     * EloquentContent constructor.
     * @param $model
     */
    public function __construct(Category_Job $model)
    {
        $this->model = $model;
    }

    public function getCateByJob ($job)
    {
        return $this->model->where('job_id',$job)->pluck('category_id');
    }

    public function getJobByCate ($cate)
    {
        return $this->model->where('category_id',$cate)->with('job')->get()->toArray();
    }

    public function deleteCateByJob ($job)
    {
        return $this->model->where('job_id',$job)->delete();
    }

}
