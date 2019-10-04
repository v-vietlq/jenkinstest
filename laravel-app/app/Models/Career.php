<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'career';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name_vi', 'description_vi', 'slug_vi', 'title_tag_vi', 'keyword_tag_vi', 'description_tag_vi', 'name_en', 'description_en', 'slug_en', 'title_tag_en', 'keyword_tag_en', 'description_tag_en', 'status', 'viewed'];

    protected $dates = ['created_at', 'updated_at'];

    public function getSomeDateAttribute($date)
    {
        return $date->format('m-d-Y');
    }
}
