<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category_Job extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category_job';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'category_id', 'job_id'];

    public $timestamps = false;

    public function getSomeDateAttribute($date)
    {
        return $date->format('m-d-Y');
    }
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
