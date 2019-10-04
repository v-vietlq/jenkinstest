<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
class Employer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name_vi', 'address_vi', 'about_vi', 'slug_vi', 'title_tag_vi', 'keyword_tag_vi', 'description_tag_vi', 'name_en','address_en', 'about_en', 'slug_en', 'title_tag_en', 'keyword_tag_en', 'description_tag_en', 'phone', 'logo', 'banner', 'viewed', 'status'];

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
