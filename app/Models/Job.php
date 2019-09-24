<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Career;
class Job extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name_vi', 'salary_vi', 'age_vi', 'time_work_vi','address_vi', 'place_work_vi', 'description_vi', 'slug_vi', 'title_tag_vi', 'keyword_tag_vi', 'description_tag_vi','content_vi','welfare_vi','contact_info_vi', 'name_en', 'salary_en', 'age_en', 'time_work_en', 'address_en', 'place_work_en', 'description_en', 'slug_en', 'title_tag_en', 'keyword_tag_en', 'description_tag_en','content_en','welfare_en','contact_info_en','quantity','contract','working_hours','gender','literacy','years_experience', 'viewed', 'banner', 'sticker', 'status', 'post_time_at', 'delete_time_at', 'city', 'district' , 'ward','employer_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function getSomeDateAttribute($date)
    {
        return $date->format('m-d-Y');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
