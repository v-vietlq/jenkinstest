@extends('site.master')
@section('title',trans('form.job_detail.title'))
@section('keywords','Thẻ từ khóa')
@section('description','thẻ mô tả')
@section('content') 
<!--Banner start-->
<div id="jf-innerbannervtwo" style="background:url({{asset('site/images/innerbanner/img-02.jpg')}}) !important" class="jf-innerbannervtwo">
</div>
<!--*Banner End-->
<!--Main Start-->
<main id="jf-main" class="jf-main jf-haslayout">
    <!--************************************
            Blog Grid Start
    *************************************-->
    <div class="jf-haslayout jf-sectionspace">
        <div class="container">
            <div class="row">
                <div class="jf-candidatesdetails">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                        <div class="jf-jobapplycenter jf-jobapplycentervthree">
                            <figure class="jf-companyimg">
                                <img src="{{asset('site/images/successstory/img-profile.jpg')}}" alt="image description">
                            </figure>
                            <div class="jf-companycontent">
                                @php
                                    $employers = $job_detail['employer']; // nhà tuyển dụng              
                                    $locale = \App::getLocale(); 
                                @endphp
                                <div class="jf-jobapplydetails">
                                    <div class="jf-companyname">
                                        @if($locale == 'vi')
                                            <h3>{{ $employers['name_vi'] }}</h3>
                                            <span style="margin-bottom: 6px;" ><i class="lnr lnr-location"></i> {{ trans('form.job_detail.position') }}: {{ $job_detail['name_vi'] }}</span>
                                            <span><i class="lnr lnr-clock"></i> {{ trans('form.job_detail.time') }}: {{ $job_detail['time_work_vi'] }}</span>
                                            <ul class="jf-postarticlemetavthree">
                                                <li>
                                                    <a>
                                                        <i class="lnr lnr-map-marker"></i>
                                                        <span>{{ trans('form.job_detail.address') }}: {{ $employers['address_vi'] }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a>
                                                        <i class="lnr lnr-eye"></i>
                                                        <span> {{ trans('form.job_detail.view') }}: {{ $job_detail['viewed'] }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <ul class="jf-postarticlemetavthree">
                                                <li><i class="lnr lnr-diamond"></i> <span>{{ trans('form.job_detail.salary') }}: {{ $job_detail['salary_vi'] }}</span></li>
                                            </ul>
                                        @else
                                            <h3>{{ $employers['name_en'] }}</h3>
                                            <span style="margin-bottom: 6px;" ><i class="lnr lnr-location"></i> {{ trans('form.job_detail.position') }}: {{ $job_detail['name_en'] }}</span>
                                            <span><i class="lnr lnr-clock"></i> {{ trans('form.job_detail.time') }}: {{ $job_detail['time_work_en'] }} </span>
                                            <ul class="jf-postarticlemetavthree">
                                                <li>
                                                    <a>
                                                        <i class="lnr lnr-map-marker"></i>
                                                        <span>{{ trans('form.job_detail.address') }}: {{ $employers['address_en'] }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a>
                                                        <i class="lnr lnr-eye"></i>
                                                        <span> {{ trans('form.job_detail.view') }}: {{ $job_detail['viewed'] }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <ul class="jf-postarticlemetavthree">
                                                <li><i class="lnr lnr-diamond"></i> <span>{{ trans('form.job_detail.salary') }}: {{ $job_detail['salary_en'] }}</span></li>
                                            </ul>
                                        @endif
                                        <ul class="jf-postarticlemetavthree">
                                            <li>
                                                <a href="tel:0969436832">
                                                    <i class="lnr lnr-phone-handset"></i>
                                                    <span>{{ trans('form.job_detail.phone') }}: {{ $employers['phone'] }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a>
                                                    <i class="lnr lnr-calendar-full"></i>
                                                    <span>{{ trans('form.job_detail.day_post') }}: {{ date('d-m-Y', strtotime($job_detail['created_at'])) }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jf-jobapplybtnlike">
                                    <div class="jf-likebtnbox">
                                        <a href="javascript:void(0);" class="jf-btn jf-active">{{ trans('form.job_detail.apply_now') }}</a>
                                        <a style="width: 149px;border-radius: 7%;background-color: #ccc9c1;color: white;" href="javascript:void(0);" class="jf-btn jf-active jf-btnlike"> <i class="fa fa-heart-o"></i> {{ trans('form.job_detail.interested') }}</a>
                                        <!-- <a style="width: 149px;border-radius: 7%;background-color: #ccc9c1;" href="javascript:void(0);" class="jf-btn jf-active jf-btnlike jf-btnliked"> <i class="fa fa-heart-o"></i> Quan tâm</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="jf-twocolumns" class="jf-twocolumns">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 float-left">
                                    <!-- <div class="jf-adds jf-addsvthree">
                                        <a href="javascript:void(0);">
                                            <figure>	
                                                <img src="{{asset('site/images/adds-01.jpg')}}" alt="img description">
                                            </figure>
                                        </a>
                                        <span>Advertisement 540px X 80px</span>
                                    </div> -->
                                    <div class="jf-introduction jf-candidatebg">
                                        <div class="jf-title">
                                            <i class="lnr lnr-magic-wand"></i>
                                            <h2>{{ trans('form.job_detail.intro') }}</h2>
                                        </div>
                                        @if($locale == 'vi')
                                            <div class="jf-description">
                                                <p>{{ $job_detail['description_vi'] }}</p>
                                            </div>
                                        @else
                                            <div class="jf-description">
                                                <p>{{ $job_detail['description_en'] }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="jf-candidateinfo jf-candidatebg">
                                        <div class="jf-jobdetailinfo">
                                            <div class="jf-title">
                                                <i class="lnr lnr-tag"></i>
                                                <h2>{{ trans('form.job_detail.info') }}</h2>
                                            </div>
                                            <ul>
                                                @if($locale == 'vi')
                                                    <li><span><i class="lnr lnr-users"></i> {{ trans('form.job_detail.gender') }}:</span>
                                                        <em>
                                                            @php 
                                                                $gioitinh = unserialize($job_detail['gender']);
                                                                if($gioitinh[0] == 1){
                                                                    echo "Nữ";
                                                                }elseif($gioitinh[0] == 2){
                                                                    echo "Nam";
                                                                }else{
                                                                    echo "Không yêu cầu";
                                                                }
                                                            @endphp
                                                        </em>
                                                    </li>
                                                    <li><span><i class="lnr lnr-user"></i> {{ trans('form.job_detail.age') }}:</span><em>{{ $job_detail['age_vi'] }}</em></li>
                                                    <li><span><i class="lnr lnr-clock"></i> {{ trans('form.job_detail.time_work') }}:</span><em>{{ $job_detail['time_work_vi'] }} </em></li>
                                                    <li><span><i class="lnr lnr-map-marker"></i> {{ trans('form.job_detail.place_work') }}:</span><em>{{ $job_detail['place_work_vi'] }}</em></li>
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job_detail.exp') }}:</span>
                                                        <em> 
                                                            @php
                                                                if($job_detail['years_experience'] == 1){
                                                                    echo trans('form.job.less_than_a_year');
                                                                }elseif($job_detail['years_experience'] == 2){
                                                                    echo trans('form.job.a_year');
                                                                }elseif($job_detail['years_experience'] == 2){
                                                                    echo trans('form.job.two_year');
                                                                }else{
                                                                    echo trans('form.job.over_two_years');
                                                                }
                                                            @endphp
                                                        </em>
                                                    </li>
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job.contact_info_vi') }}:</span><em>{{ $job_detail['contact_info_vi'] }}</em></li>
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job.literacy') }}:</span>
                                                        <em>
                                                            @php 
                                                                $job_detail['literacy'];
                                                                if($job_detail['literacy'] == 1 ){
                                                                    echo trans('form.job.junior_high_school');
                                                                }elseif($job_detail['literacy'] == 2){
                                                                    echo trans('form.job.high_school');
                                                                }elseif($job_detail['literacy'] == 3){
                                                                    echo trans('form.job.intermediate');
                                                                }elseif($job_detail['literacy'] == 4){
                                                                    echo trans('form.job.college');
                                                                }elseif($job_detail['literacy'] == 5){
                                                                    echo trans('form.job.university');
                                                                }else{
                                                                    echo trans('form.job.after_university'); 
                                                                }
                                                            @endphp
                                                        </em>
                                                    </li>     
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job.contract') }}:</span>
                                                        <em>
                                                            @php 
                                                                $contract = unserialize($job_detail['contract']);
                                                                if($contract[0]){
                                                                    echo trans('form.job.fulltime');
                                                                }else{
                                                                    echo trans('form.job.parttime');
                                                                }
                                                            @endphp 
                                                        </em>
                                                    </li>  
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job.working_hours') }}:</span>
                                                        <em>
                                                            @php 
                                                                $working_hours = unserialize($job_detail['working_hours']);
                                                                if($working_hours[0]){
                                                                    echo trans('form.job.shifts');
                                                                }else{
                                                                    echo trans('form.job.office');
                                                                }
                                                            @endphp 
                                                        </em>
                                                    </li>  
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job.content_vi') }}:</span><em>{{ $job_detail['content_vi'] }} </em></li>   
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job.welfare_vi') }}:</span><em>{{ $job_detail['welfare_vi'] }} </em></li> 
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job.quantity') }}:</span><em>{{ $job_detail['quantity'] }} </em></li>                                
                                                @else
                                                    <li><span><i class="lnr lnr-users"></i> {{ trans('form.job_detail.gender') }}:</span>
                                                        <em>
                                                            @php 
                                                                $gioitinh = unserialize($job_detail['gender']);
                                                                if($gioitinh[0] == 1){
                                                                    echo "Female";
                                                                }elseif($gioitinh[0] == 2){
                                                                    echo "Male";
                                                                }else{
                                                                    echo "Not required";
                                                                }
                                                            @endphp
                                                        </em>
                                                    </li>
                                                    <li><span><i class="lnr lnr-user"></i> {{ trans('form.job_detail.age') }}:</span><em>{{ $job_detail['age_en'] }}</em></li>
                                                    <li><span><i class="lnr lnr-clock"></i> {{ trans('form.job_detail.time_work') }}:</span><em>{{ $job_detail['time_work_en'] }} </em></li>
                                                    <li><span><i class="lnr lnr-map-marker"></i> {{ trans('form.job_detail.place_work') }}:</span><em>{{ $job_detail['years_experience'] }}</em></li>
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job.contact_info_vi') }}:</span><em>{{ $job_detail['contact_info_en'] }} </em></li>
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job.literacy') }}:</span>
                                                        <em>
                                                            @php 
                                                                $job_detail['literacy'];
                                                                if($job_detail['literacy'] == 1 ){
                                                                    echo trans('form.job.junior_high_school');
                                                                }elseif($job_detail['literacy'] == 2){
                                                                    echo trans('form.job.high_school');
                                                                }elseif($job_detail['literacy'] == 3){
                                                                    echo trans('form.job.intermediate');
                                                                }elseif($job_detail['literacy'] == 4){
                                                                    echo trans('form.job.college');
                                                                }elseif($job_detail['literacy'] == 5){
                                                                    echo trans('form.job.university');
                                                                }else{
                                                                    echo trans('form.job.after_university'); 
                                                                }
                                                            @endphp
                                                        </em>
                                                    </li> 
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job.contract') }}:</span>
                                                        <em>
                                                            @php 
                                                                $contract = unserialize($job_detail['contract']);
                                                                if($contract[0]){
                                                                    echo trans('form.job.fulltime');
                                                                }else{
                                                                    echo trans('form.job.parttime');
                                                                }
                                                            @endphp 
                                                        </em>
                                                    </li>  
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job.working_hours') }}:</span>
                                                        <em>
                                                            @php 
                                                                $working_hours = unserialize($job_detail['working_hours']);
                                                                if($working_hours[0]){
                                                                    echo trans('form.job.shifts');
                                                                }else{
                                                                    echo trans('form.job.office');
                                                                }
                                                            @endphp 
                                                        </em>
                                                    </li>   
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job.content_en') }}:</span><em>{{ $job_detail['content_en'] }} </em></li> 
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job.welfare_en') }}:</span><em>{{ $job_detail['welfare_en'] }} </em></li>
                                                    <li><span><i class="lnr lnr-briefcase"></i> {{ trans('form.job.quantity') }}:</span><em>{{ $job_detail['quantity'] }} </em></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="jf-followedcom jf-candidatebg">
                                        <div class="jf-title">
                                            <i class="lnr lnr-bubble"></i>
                                            <h2>{{ trans('form.job_detail.related') }}</h2>
                                        </div>
                                        <div class="jf-employergrids jf-employerlist jf-employerlistvtwo">
                                            @foreach($related_job as $item)
                                            <div class="jf-employedetails">
                                                <div class="jf-widget">
                                                    <div class="jf-angrycreativelist">
                                                        <div class="jf-angrycreative">
                                                            @if($locale == 'vi')
                                                                <a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">
                                                                <figure>
                                                                    <img src="{{asset('site/images/topcompanies/img-01.png')}}" alt="image description">
                                                                </figure>
                                                                </a>
                                                            @else 
                                                                <a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_en']]) }}">
                                                                    <figure>
                                                                        <img src="{{asset('site/images/topcompanies/img-01.png')}}" alt="image description">
                                                                    </figure>
                                                                    </a>
                                                            @endif
                                                        </div>
                                                        <div class="jf-employerdetails">
                                                            @if($locale == 'vi')
                                                                <a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">
                                                                    <h3>
                                                                        @php 
                                                                            $employer = $item['employer'];
                                                                            echo $employer['name_vi'];
                                                                        @endphp
                                                                    </h3>
                                                                </a>
                                                                <h4><span>{{ $item['name_vi'] }}</span><span><i class="lnr lnr-eye"></i>{{ $item['viewed'] }} {{ trans('form.home.view') }}</span></h4>
                                                            @else 
                                                                <a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_en']]) }}">
                                                                    <h3>
                                                                        @php 
                                                                            $employer = $item['employer'];
                                                                            echo $employer['name_en'];
                                                                        @endphp
                                                                    </h3>
                                                                </a>
                                                                <h4><span>{{ $item['name_en'] }}</span><span><i class="lnr lnr-eye"></i>{{ $item['viewed'] }} {{ trans('form.home.view') }}</span></h4>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <ul class="jf-professionalinfo">
                                                        @if($locale == 'vi')
                                                            <li><i class="lnr lnr-briefcase"></i><a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">{{ trans('form.home.detail') }}</a></li>
                                                            <li style="width:66%"><i class="lnr lnr-tag"></i>
                                                                <a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">
                                                                    <?php $first = DB::table('category')
                                                                        ->where('parent',2)
                                                                        ->select('id as child_id','name_vi','name_en')
                                                                        ->get();
                                                                        $job_id = $item['id'];
                                                                        foreach($first as $item){
                                                                            $child_id = $item->child_id;
                                                                            $second = DB::table('category_job')
                                                                            ->where([
                                                                                ['category_id', '=', $child_id],
                                                                                ['job_id', '=', $job_id ],
                                                                            ])->get();
                                                                            if($second->count() == 1){
                                                                                echo $item->name_vi;
                                                                            }
                                                                        }
                                                                    ?>
                                                                </a>
                                                            </li>
                                                        @else 
                                                            <li><i class="lnr lnr-briefcase"></i><a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_en']]) }}">{{ trans('form.home.detail') }}</a></li>
                                                            <li style="width:66%"><i class="lnr lnr-tag"></i>
                                                                <a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_en']]) }}">
                                                                    <?php $first = DB::table('category')
                                                                        ->where('parent',2)
                                                                        ->select('id as child_id','name_vi','name_en')
                                                                        ->get();
                                                                        $job_id = $item['id'];
                                                                        foreach($first as $item){
                                                                            $child_id = $item->child_id;
                                                                            $second = DB::table('category_job')
                                                                            ->where([
                                                                                ['category_id', '=', $child_id],
                                                                                ['job_id', '=', $job_id ],
                                                                            ])->get();
                                                                            if($second->count() == 1){
                                                                                echo $item->name_en;
                                                                            }
                                                                        }
                                                                    ?>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                           @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">
                                    <aside id="jf-sidebar" class="jf-sidebar">
                                        @if(session('success'))
                                        <div class="alert alert-success"> {{session('success')}} </div>
                                        @endif
                                        <div class="jf-candidate jf-candidatebg ">
                                            <div class="jf-title">
                                                <i class="lnr lnr-envelope"></i>
                                                <h2>{{ trans('form.job_detail.request') }}</h2>
                                            </div>
                                            @php $locale = \App::getLocale();  @endphp
                                            @if($locale == 'vi')
                                                <form method="POST" action="{{ route('site.contact',['id' => $job_detail['id'] ,'slug' => $job_detail['slug_vi']]) }}" class="jf-formtheme jf-formcontactus jf-formcontactusvtwo">
                                            @else 
                                                <form method="POST" action="{{ route('site.contact',['id' => $job_detail['id'] ,'slug' => $job_detail['slug_en']]) }}" class="jf-formtheme jf-formcontactus jf-formcontactusvtwo">
                                            @endif
                                                @csrf
                                                <fieldset>
                                                    <div class="form-group jf-inputwithicon">
                                                        <i class="lnr lnr-users"></i>
                                                        <input type="text" name="fullname" class="form-control" placeholder="{{ trans('form.job_detail.name') }}">
                                                    </div>
                                                    <div class="form-group jf-inputwithicon">
                                                        <i class="lnr lnr-envelope"></i>
                                                        <input type="email" name="txtemail" class="form-control" placeholder="{{ trans('form.job_detail.email') }}">
                                                    </div>
                                                    <div class="form-group jf-inputwithicon">
                                                        <i class="lnr lnr-phone"></i>
                                                        <input style="padding: 10px 20px 10px 44px;" type="text" name="txtphone" class="form-control" placeholder="{{ trans('form.job_detail.phone_request') }}">
                                                    </div>
                                                    <div class="form-group jf-inputwithicon">
                                                        <i class="lnr lnr-map"></i>
                                                        <input style="padding: 10px 20px 10px 44px;" type="text" name="txtaddress" class="form-control" placeholder="{{ trans('form.job_detail.address') }}">
                                                    </div>
                                                    <div class="form-group jf-inputwithicon">
                                                    
                                                        <textarea name="message" class="form-control" placeholder="{{ trans('form.job_detail.content') }}"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="jf-btn jf-active" type="submit">{{ trans('form.job_detail.send') }}</button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--Main End-->
@endsection



