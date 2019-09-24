<?php
namespace App\Repositories\Career;

use App\Models\Career;
use App\Repositories\AbstractRepository;
use App\Http\Resources\Employer as EmployerResources;

class EloquentCareer extends AbstractRepository implements CareerRepository
{
    /**
     * @var Career
     */
    protected $model;

    /**
     * EloquentCareer constructor.
     * @param $model
     */
    public function __construct(Career $model)
    {
        $this->model = $model;
    }

}
