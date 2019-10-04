<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apllied extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'applied';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','type', 'user_id', 'job_id'];

    public $timestamps = false;

    public function getSomeDateAttribute($date)
    {
        return $date->format('m-d-Y');
    }
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
