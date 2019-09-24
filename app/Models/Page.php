<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'page';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title_vi', 'intro_vi', 'content_vi', 'slug_vi', 'title_tag_vi', 'description_tag_vi', 'title_en', 'intro_en', 'content_en', 'slug_en', 'title_tag_en', 'description_tag_en', 'image', 'status'];

    protected $dates = ['created_at', 'updated_at'];

    public function getSomeDateAttribute($date)
    {
        return $date->format('m-d-Y');
    }

    public function content () 
    {
        return $this->hasMany('App\Models\Content');
    }

}
