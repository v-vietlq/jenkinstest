<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name_vi', 'description_vi', 'slug_vi', 'name_en', 'description_en', 'slug_en', 'status', 'parent','position','value_vi','value_en'];

    protected $dates = ['created_at', 'updated_at'];

    public function getSomeDateAttribute($date)
    {
        return $date->format('m-d-Y');
    }

    public function job()
    {
        return $this->hasMany(Job::class);
    }
}
