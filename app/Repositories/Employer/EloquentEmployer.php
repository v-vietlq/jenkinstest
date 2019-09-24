<?php
namespace App\Repositories\Employer;

use App\Models\Employer;
use App\Repositories\AbstractRepository;
use App\Http\Resources\Employer as EmployerResources;

class EloquentEmployer extends AbstractRepository implements EmployerRepository
{
    /**
     * @var Employer
     */
    protected $model;

    /**
     * EloquentEmployer constructor.
     * @param $model
     */
    public function __construct(Employer $model)
    {
        $this->model = $model;
    }

    public function allEmployer () 
    {
        return $this->model->with('job')->get()->toArray();
    }

    public function getEmployerDetail($id){
        return $this->model->with('job')->where('id',$id)->first()->toArray();
    }

    public function totalItem () 
    {
        $result = $this->model->count();
        return $result;
    }

    public function search ($keyword) 
    {
        $result = $this->model
                ->where("name_vi","LIKE","%$keyword%")
                ->orWhere("name_en","LIKE","%$keyword%")
                ->paginate(10);
        return new EmployerResources($result);
    }

    public function getItem ($id)
    {
        $result = $this->model->find($id)->with('job')->first();
        return $result;
    }

    public function getItemEmployer ($id)
    {
        $result = $this->model->find($id)->first();
        return $result;
    }

    public function getJobByEmployer ($employer)
    {
        $result = $this->model->find($employer)->with('job')->first();
        return $result;
    }
    public function getAllEmployer(){
        return $this->model
        ->select()
        ->orderBy('created_at', 'desc')
        ->paginate(9);
    }
}
