<?php
namespace App\Repositories\Info;

use App\Models\Info;
use App\Repositories\AbstractRepository;

class EloquentInfo extends AbstractRepository implements InfoRepository
{
    /**
     * @var User
     */
    protected $model;

    /**
     * EloquentUser constructor.
     * @param $model
     */
    public function __construct(Info $model)
    {
        $this->model = $model;
    }


    public function removeByUserId(int $user_id)
    {
        return $this->model->where('user_id',$user_id)->delete();
    }
}
