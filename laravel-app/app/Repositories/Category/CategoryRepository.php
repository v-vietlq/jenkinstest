<?php
namespace App\Repositories\Category;

use App\Repositories\AbstractInterface;

interface CategoryRepository extends AbstractInterface
{
    public function getParentId ($id);

    public function countPosition ($parent);

    public function getAllByPosition ();

    public function countChildCate ($id);

    public function totalItem ();

    public function getCategoryByParent ($parent);

    public function headerNews();

    public function getCareer($parent);
}
