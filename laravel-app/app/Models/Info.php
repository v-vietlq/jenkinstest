<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'fullname', 'birthday', 'phone', 'email', 'address', 'gender', 'height', 'weight', 'driver_license', 'company_did', 'position_did','cv_file', 'literacy', 'years_experience', 'marital_status', 'zalo_phone','user_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function getSomeDateAttribute($date)
    {
        return $date->format('m-d-Y');
    }

}
