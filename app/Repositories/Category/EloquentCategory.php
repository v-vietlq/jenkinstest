<?php
namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\AbstractRepository;

class EloquentCategory extends AbstractRepository implements CategoryRepository
{
    /**
     * @var Category
     */
    protected $model;

    /**
     * EloquentCategory constructor.
     * @param $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getParentId ($id) 
    {
        $category = $this->model->select('parent')->where('id',$id)->first();
        return $category->parent;
    }

    public function countPosition($parent)
    {
        $position = $this->model->where('parent',$parent)->max('position');
        return $position + 1;
    }

    public function getAllByPosition()
    {
        return $this->model->select()
            ->orderBy('position', 'asc')
            ->get();
    }

    public function countChildCate($id) 
    {
        $result = $this->model->where('parent',$id)->count();
        return $result;
    }

    public function totalItem () 
    {
        $result = $this->model->count();
        return $result;
    }

    public function getCategoryByParent ($parent)
    {
        $result = $this->model->where('parent',$parent)->get();
        return $result;
    }
    
    public function headerNews(){
        return $this->model->where('parent','23')->get(); 
    }

    public function getCareer($parent)
    {
        $result = $this->model->where('parent',$parent)->where('position','>','1')->get();
        return $result;
    }
}
