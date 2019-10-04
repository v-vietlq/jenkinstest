<?php
namespace App\Repositories\Banner;

use App\Models\Banner;
use App\Repositories\AbstractRepository;

class EloquentBanner extends AbstractRepository implements BannerRepository
{
    /**
     * @var Banner
     */
    protected $model;

    /**
     * EloquentBanner constructor.
     * @param $model
     */
    public function __construct(Banner $model)
    {
        $this->model = $model;
    }

}
