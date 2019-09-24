<?php
namespace App\Repositories\Content;

use App\Models\Content;
use App\Repositories\AbstractRepository;

class EloquentContent extends AbstractRepository implements ContentRepository
{
    /**
     * @var Content
     */
    protected $model;

    /**
     * EloquentContent constructor.
     * @param $model
     */
    public function __construct(Content $model)
    {
        $this->model = $model;
    }

}
