<?php
namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\AbstractRepository;

class EloquentUser extends AbstractRepository implements UserRepository
{
    /**
     * @var User
     */
    protected $model;

    /**
     * EloquentUser constructor.
     * @param $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

}
