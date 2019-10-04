<?php
namespace App\Repositories\Job;

use App\Models\Job;
use App\Repositories\AbstractRepository;

class EloquentJob extends AbstractRepository implements JobRepository
{
    /**
     * @var Job
     */
    protected $model;

    /**
     * EloquentJob constructor.
     * @param $model
     */
    public function __construct(Job $model)
    {
        $this->model = $model;
    }

    public function allJob () 
    {
        //return $this->model->with('employer','career','category')->get()->toArray();
        return $this->model->with('employer','career','category')->paginate(9);
    }

    public function totalItem ()
    {
        $result = $this->model->count();
        return $result;
    }
    //Chi tiết job
    public function getJobDetail($id){
        return $this->model->with('employer')->where('id',$id)->first()->toArray();
    }
    public function jobByEmployer($id){
        return $this->model->with('employer')->where('employer_id',$id)->get()->toArray();
    }

    //job liên quan
    public function relatedJob($id){
        return $this->model->with('employer')->where('id','!=',$id)->inRandomOrder()->limit(4)->get()->toArray();
    }
}
