<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class News extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title_vi', 'author_vi', 'intro_vi', 'content_vi', 'slug_vi', 'title_tag_vi', 'description_tag_vi', 'title_en', 'author_en', 'intro_en', 'content_en', 'slug_en', 'title_tag_en', 'description_tag_en', 'images', 'status', 'featured', 'category_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function getSomeDateAttribute($date)
    {
        return $date->format('m-d-Y');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
