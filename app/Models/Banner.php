<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Banner
 * @package App\Models
 */
class Banner extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'banner';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'image_vi', 'description_vi', 'link_vi', 'image_en', 'description_en', 'link_en', 'status', 'position_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function getSomeDateAttribute($date)
    {
        return $date->format('m-d-Y');
    }
}
