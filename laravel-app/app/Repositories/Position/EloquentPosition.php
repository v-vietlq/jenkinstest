<?php
namespace App\Repositories\Position;

use App\Models\Position;
use App\Repositories\AbstractRepository;

class EloquentPosition extends AbstractRepository implements PositionRepository
{
    /**
     * @var Position
     */
    protected $model;

    /**
     * EloquentPosition constructor.
     * @param $model
     */
    public function __construct(Position $model)
    {
        $this->model = $model;
    }

}
