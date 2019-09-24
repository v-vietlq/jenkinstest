<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Employer\EmployerRepository;
use App\Repositories\Job\JobRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category_Job\CategoryJobRepository;
use DB;

class AjaxController extends Controller
{
  
    /**
     * @var EmployerRepository
     */
    private $employer;
    /**
     * @var JobRepository
     */
    private $job;
    /**
     * @var CategoryRepository
     */
    private $category;
    /**
     * @var CategoryJobRepository
     */
    private $category_job;

    /**
     * HomeController constructor.
     * @param EmployerRepository $employer
     * @param JobRepository $job
     * @param CategoryRepository $category
     * @param CategoryJobRepository $category_job
     */
    public function __construct(EmployerRepository $employer,JobRepository $job,CategoryRepository $category,CategoryJobRepository $category_job )
    {
        $this->employer = $employer;
        $this->job = $job;
        $this->category = $category;
        $this->category_job = $category_job;
    }

    public function searchJob(Request $request){

        $search_key = $request->search_key; // 1- Từ khóa tìm kiếm
        $career_position = $request->career_position; // 2-Vị trí công việc - career
        $thanhpho = $request->thanhpho; // 3-Thành phố
        $quan = $request->quan; // 4 - Quận
        $thanhpho_check = $request->thanhpho_check; // Chọn thành phố radio_check
        $quan_check = $request->quan_check; // Chọn quận ở radio check
        $nganhnghe = $request->nganhnghe; // 5 -radio check - ngành nghề
        $kinhnghiem = $request->kinhnghiem; // 6 - radio check - kinh nghiệm
        $mucluong = $request->mucluong; // 7 - radio check -mức lương
        $gioitinh = $request->gioitinh; // 8 - radio check - giới tính
        $thoigian = $request->thoigian; // 9 - radio check - thời gian

        $locale = \App::getLocale(); 
        if($locale == 'vi'){
            //TH1: Chỉ search theo 1-2
            if($search_key != "" && $career_position != "" && $thanhpho == "" && $nganhnghe == "" && $kinhnghiem== "" && $mucluong== "" && $gioitinh== "" && $thoigian== "" ){
                $first = DB::table('job')
                ->where('name_vi','like','%'.$search_key.'%')
                ->select('id')
                ->get(); 

                $data = [];
                foreach($first as $item){
                    $id = $item->id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $career_position],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 1){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH : search theo city-district
            elseif($search_key != "" && $career_position != "" && $thanhpho != "" && $nganhnghe == "" && $kinhnghiem== "" && $mucluong== "" && $gioitinh== "" && $thoigian== "" ){ 
            if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $career_position],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 1){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH2: Chỉ chọn ngành nghề
            elseif( $nganhnghe != "" &&$kinhnghiem == "" && $mucluong== "" && $gioitinh== "" && $thoigian== ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 1){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH2: Chỉ chọn kinh nghiệm
            elseif($nganhnghe == "" && $kinhnghiem != "" && $mucluong== "" && $gioitinh== "" && $thoigian== ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $career_position],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH3: Chỉ chọn lương
            elseif($nganhnghe == "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh== "" && $thoigian== ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $career_position],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH4: Chỉ chọn giới tính
            elseif($nganhnghe == "" &&$kinhnghiem == "" && $mucluong == "" && $gioitinh != "" && $thoigian== ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $career_position],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH5: Chỉ chọn thời gian
            elseif($nganhnghe == "" &&$kinhnghiem == "" && $mucluong == "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $career_position],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH6: Chỉ chọn nganh nghề - kinh nghiệm
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong == "" && $gioitinh == "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH7: Chỉ chọn nganh nghề - mức lương
            elseif($nganhnghe != "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh == "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH8: Chỉ chọn nganh nghề - giới tính
            elseif($nganhnghe != "" &&$kinhnghiem == "" && $mucluong == "" && $gioitinh != "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH8: Chỉ chọn nganh nghề - thời gian
            elseif($nganhnghe != "" &&$kinhnghiem == "" && $mucluong == "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH9: Chỉ chọn kinh nghiệm - mức lương
            elseif($nganhnghe == "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh == "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH10: Chỉ chọn kinh nghiệm - giới tính
            elseif($nganhnghe == "" &&$kinhnghiem != "" && $mucluong == "" && $gioitinh != "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data; 
            }  
            //TH11: Chỉ chọn kinh nghiệm - thời gian
            elseif($nganhnghe == "" &&$kinhnghiem != "" && $mucluong == "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data; 
            }  
            //TH12: Chỉ chọn mức lương - giới tính
            elseif($nganhnghe == "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh != "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;  
            }
            //TH13: Chỉ chọn mức lương - thời gian
            elseif($nganhnghe == "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH14: Chỉ chọn giới tính - thời gian
            elseif($nganhnghe == "" &&$kinhnghiem == "" && $mucluong == "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH15: Chỉ chọn ngành nghề - kinh nghiệm - mức lương
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh == "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH16: Chỉ chọn ngành nghề - kinh nghiệm - giới tính
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong == "" && $gioitinh != "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH17: Chỉ chọn ngành nghề - kinh nghiệm - thời gian
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong == "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH18: Chỉ chọn ngành nghề - mức lương - giới tính
            elseif($nganhnghe != "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh != "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH19: Chỉ chọn ngành nghề - mức lương - thời gian
            elseif($nganhnghe != "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH20: Chỉ chọn ngành nghề - giới tính - thời gian
            elseif($nganhnghe != "" &&$kinhnghiem == "" && $mucluong == "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH20: Chỉ chọn kinh nghiệm - mức lương - giới tính
            elseif($nganhnghe == "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh != "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH21: Chỉ chọn kinh nghiệm - mức lương - thời gian
            elseif($nganhnghe == "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH22: Chỉ chọn kinh nghiệm - giới tính - thời gian
            elseif($nganhnghe == "" &&$kinhnghiem != "" && $mucluong == "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH23: Chỉ chọn mức lương - giới tính - thời gian
            elseif($nganhnghe == "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH24: chọn tất cả
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 5){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            } 
            //TH25: chọn ngành nghề - kinh nghiệm -mức lương - giới tính
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh != "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 4){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH26: chọn ngành nghề - kinh nghiệm -mức lương - thời gian
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 4){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            } 
            //TH27: chọn ngành nghề - giới tính -mức lương - thời gian
            elseif($nganhnghe != "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 4){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH28: chọn ngành nghề - kinh nghiệm - giới tính - thời gian
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong == "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 4){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            } 
            //TH29: chọn kinh nghiệm - mức lương - giới tính - thời gian
            elseif($nganhnghe == "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_vi','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 4){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_vi as career_vi','job.slug_vi as slug_vi','job.id as job_id','job.name_vi as job_name_vi','employer.name_vi as employer_name_vi','job.viewed','job.place_work_vi','job.years_experience','job.salary_vi')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            } 
            //return $data;
        }//Tiếng Anh
        else{
            //TH1: Chỉ search theo 1-2
            if($search_key != "" && $career_position != "" && $thanhpho == "" && $nganhnghe == "" && $kinhnghiem== "" && $mucluong== "" && $gioitinh== "" && $thoigian== "" ){
                $first = DB::table('job')
                ->where('name_en','like','%'.$search_key.'%')
                ->select('id')
                ->get(); 
                $data = [];
                foreach($first as $item){
                    $id = $item->id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $career_position],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 1){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH : search theo city-district
            elseif($search_key != "" && $career_position != "" && $thanhpho != "" && $nganhnghe == "" && $kinhnghiem== "" && $mucluong== "" && $gioitinh== "" && $thoigian== "" ){ 
            if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $career_position],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 1){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH2: Chỉ chọn ngành nghề
            elseif( $nganhnghe != "" &&$kinhnghiem == "" && $mucluong== "" && $gioitinh== "" && $thoigian== ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 1){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH2: Chỉ chọn kinh nghiệm
            elseif($nganhnghe == "" && $kinhnghiem != "" && $mucluong== "" && $gioitinh== "" && $thoigian== ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $career_position],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH3: Chỉ chọn lương
            elseif($nganhnghe == "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh== "" && $thoigian== ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $career_position],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH4: Chỉ chọn giới tính
            elseif($nganhnghe == "" &&$kinhnghiem == "" && $mucluong == "" && $gioitinh != "" && $thoigian== ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $career_position],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH5: Chỉ chọn thời gian
            elseif($nganhnghe == "" &&$kinhnghiem == "" && $mucluong == "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $career_position],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH6: Chỉ chọn nganh nghề - kinh nghiệm
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong == "" && $gioitinh == "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH7: Chỉ chọn nganh nghề - mức lương
            elseif($nganhnghe != "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh == "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH8: Chỉ chọn nganh nghề - giới tính
            elseif($nganhnghe != "" &&$kinhnghiem == "" && $mucluong == "" && $gioitinh != "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH8: Chỉ chọn nganh nghề - thời gian
            elseif($nganhnghe != "" &&$kinhnghiem == "" && $mucluong == "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH9: Chỉ chọn kinh nghiệm - mức lương
            elseif($nganhnghe == "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh == "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH10: Chỉ chọn kinh nghiệm - giới tính
            elseif($nganhnghe == "" &&$kinhnghiem != "" && $mucluong == "" && $gioitinh != "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data; 
            }  
            //TH11: Chỉ chọn kinh nghiệm - thời gian
            elseif($nganhnghe == "" &&$kinhnghiem != "" && $mucluong == "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data; 
            }  
            //TH12: Chỉ chọn mức lương - giới tính
            elseif($nganhnghe == "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh != "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;  
            }
            //TH13: Chỉ chọn mức lương - thời gian
            elseif($nganhnghe == "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH14: Chỉ chọn giới tính - thời gian
            elseif($nganhnghe == "" &&$kinhnghiem == "" && $mucluong == "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 2){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH15: Chỉ chọn ngành nghề - kinh nghiệm - mức lương
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh == "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH16: Chỉ chọn ngành nghề - kinh nghiệm - giới tính
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong == "" && $gioitinh != "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH17: Chỉ chọn ngành nghề - kinh nghiệm - thời gian
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong == "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH18: Chỉ chọn ngành nghề - mức lương - giới tính
            elseif($nganhnghe != "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh != "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH19: Chỉ chọn ngành nghề - mức lương - thời gian
            elseif($nganhnghe != "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH20: Chỉ chọn ngành nghề - giới tính - thời gian
            elseif($nganhnghe != "" &&$kinhnghiem == "" && $mucluong == "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH20: Chỉ chọn kinh nghiệm - mức lương - giới tính
            elseif($nganhnghe == "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh != "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH21: Chỉ chọn kinh nghiệm - mức lương - thời gian
            elseif($nganhnghe == "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH22: Chỉ chọn kinh nghiệm - giới tính - thời gian
            elseif($nganhnghe == "" &&$kinhnghiem != "" && $mucluong == "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH23: Chỉ chọn mức lương - giới tính - thời gian
            elseif($nganhnghe == "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 3){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH24: chọn tất cả
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 5){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            } 
            //TH25: chọn ngành nghề - kinh nghiệm -mức lương - giới tính
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh != "" && $thoigian == ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 4){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }  
            //TH26: chọn ngành nghề - kinh nghiệm -mức lương - thời gian
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh == "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 4){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            } 
            //TH27: chọn ngành nghề - giới tính -mức lương - thời gian
            elseif($nganhnghe != "" &&$kinhnghiem == "" && $mucluong != "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 4){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            }
            //TH28: chọn ngành nghề - kinh nghiệm - giới tính - thời gian
            elseif($nganhnghe != "" &&$kinhnghiem != "" && $mucluong == "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $nganhnghe],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 4){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            } 
            //TH29: chọn kinh nghiệm - mức lương - giới tính - thời gian
            elseif($nganhnghe == "" &&$kinhnghiem != "" && $mucluong != "" && $gioitinh != "" && $thoigian != ""){
                if($thanhpho != "" && $quan == "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->select('job.id as job_id')->get();  
                }elseif($thanhpho != "" && $quan != "" && $thanhpho_check == "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho)
                    ->where('job.district',$quan)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check == ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->select('job.id as job_id')->get();
                }elseif($thanhpho_check != "" && $quan_check != ""){
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->where('job.city',$thanhpho_check)
                    ->where('job.district',$quan_check)
                    ->select('job.id as job_id')->get();
                }else{
                    $first = DB::table('job')
                    ->where('job.name_en','like','%'.$search_key.'%')
                    ->select('job.id as job_id')->get();
                }
                $data =[];
                foreach($first as $item){
                    $id = $item->job_id;
                    $category_job = DB::table('category_job')
                    ->where([
                        ['category_id', '=', $kinhnghiem],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $mucluong],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $gioitinh],
                        ['job_id', '=', $id],
                    ])
                    ->orWhere([
                        ['category_id', '=', $thoigian],
                        ['job_id', '=', $id],
                    ])
                    ->get();
                    if($category_job->count() == 4){
                        $final =DB::table('category_job')
                        ->where([
                            ['category.id', '=', $career_position],
                            ['job.id', '=', $id],
                        ])
                        ->join('job', 'category_job.job_id', '=', 'job.id')
                        ->join('category', 'category_job.category_id', '=', 'category.id')
                        ->join('employer', 'job.employer_id', '=', 'employer.id')
                        ->select('category.name_en as career_en','job.slug_en as slug_en','job.id as job_id','job.name_en as job_name_en','employer.name_en as employer_name_en','job.viewed','job.place_work_en','job.years_experience','job.salary_en')
                        ->get(); 
                        array_push($data,$final);
                    }
                }
                return $data;
            } 
        }
    }
}
