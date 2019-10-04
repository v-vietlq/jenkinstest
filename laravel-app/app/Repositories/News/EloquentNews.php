<?php
namespace App\Repositories\News;

use App\Models\News;
use App\Repositories\AbstractRepository;

class EloquentNews extends AbstractRepository implements NewsRepository
{
    /**
     * @var News
     */
    protected $model;

    /**
     * EloquentNews constructor.
     * @param $model
     */
    public function __construct(News $model)
    {
        $this->model = $model;
    }
    //Tin tức ở footer
    public function footerNews () 
    {
        return $this->model->orderBy('created_at','desc')->take(3)->get();;
    }
    //Tất cả tin 
    public function allNews () 
    {
        return $this->model->with('category')->take(3)->paginate(9);
    }
    //Tin mới
    public function latestNews () 
    {
        return $this->model->with('category')->take(3)->orderBy('created_at', 'desc')->get()->toArray();
    }
    //Tin nổi bật
    public function hotNews () 
    {
        return $this->model->with('category')->take(3)->where('featured','on')->orderBy('created_at', 'desc')->get()->toArray();
    }
    //Chi tiết tin
    public function getNewsDetail($id){
        return $this->model->with('category')->where('id',$id)->first()->toArray();
    }
    //Tin trước 
    public function beforeNews($id){
        $first = $this->model->with('category')->where('id','<',$id)->first();
        if($first == null){
            return $this->model->with('category')->where('id','=',$id)->first()->toArray();
        }else{
            return $this->model->with('category')->where('id','<',$id)->first()->toArray();
        }
    }
    //Tin sau
    public function afterNews($id){
        $first = $this->model->with('category')->where('id','>',$id)->first();
        if($first == null){
            return $this->model->with('category')->where('id','=',$id)->first()->toArray();
        }else{
            return $this->model->with('category')->where('id','>',$id)->first()->toArray();
        }
    }
    public function totalItem ()
    {
        $result = $this->model->count();
        return $result;
    }
    public function newsbyCate($id){
        return $this->model->where('category_id',$id)->paginate(9);
    }

}
