<?php
namespace App\Repositories\Page;

use App\Models\Page;
use App\Repositories\AbstractRepository;

class EloquentPage extends AbstractRepository implements PageRepository
{
    /**
     * @var Page
     */
    protected $model;

    /**
     * EloquentPage constructor.
     * @param $model
     */
    public function __construct(Page $model)
    {
        $this->model = $model;
    }
    public function getIntroductPage()
    {
        return $this->model->select()
            ->orderBy('created_at', 'desc')
            ->first()->toArray();
    }

    public function getContentByPage ($id)
    {
        return $this->model->with('content')->where('id',$id)->first();
    }

}
