@extends('site.master')
@section('title',trans('form.employer.title_detail'))
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
                                <div class="jf-jobapplydetails">
                                    <div class="jf-companyname">
                                        @php $locale = \App::getLocale(); @endphp
                                        @if($locale == 'vi')
                                            <h3>{{ $detail_employer['name_vi'] }}</h3>
                                        @else 
                                            <h3>{{ $detail_employer['name_en'] }}</h3>
                                        @endif
                                        <ul class="jf-postarticlemetavthree">
                                            <li>
                                                <a>
                                                    <i class="lnr lnr-map-marker"></i>
                                                    @if($locale == 'vi')
                                                        <span>{{ trans('form.job_detail.address') }}: {{ $detail_employer['address_vi'] }}</span>
                                                    @else 
                                                        <span>{{ trans('form.job_detail.address') }}: {{ $detail_employer['address_en'] }}</span>
                                                    @endif
                                                </a>
                                            </li>
                                            <li>
                                                <a>
                                                    <i class="lnr lnr-eye"></i>
                                                    <span>{{ $detail_employer['viewed'] }} {{ trans('form.job_detail.view') }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="jf-postarticlemetavthree">
                                            <li>
                                                <a href="tel:0969436832">
                                                    <i class="lnr lnr-phone-handset"></i>
                                                    <span>{{ trans('form.job_detail.phone') }}: {{ $detail_employer['phone'] }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a>
                                                    <i class="lnr lnr-calendar-full"></i>
                                                    <span>{{ trans('form.introduce.date_post') }}: {{ date('d-m-Y', strtotime($detail_employer['created_at'])) }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="jf-twocolumns" class="jf-twocolumns">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 float-left">
                                    <div class="jf-introduction jf-candidatebg">
                                        <div class="jf-title">
                                            <i class="lnr lnr-magic-wand"></i>
                                            <h2>{{ trans('form.job_detail.intro') }}</h2>
                                        </div>
                                        <div class="jf-description">
                                            @if($locale == 'vi')
                                                <p>{{ $detail_employer['about_vi'] }}</p>
                                            @else 
                                                <p>{{ $detail_employer['about_en'] }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="jf-candidatessearchsvtwo">
                                @foreach($job_by_employer as $item)
                                @php
                                    $employers = $item['employer']; // table employer
                                @endphp
                                <div class="jf-candidatessearcgrid jf-verticaltop">
                                    <div class="jf-candidatessearch">
                                        @if($locale == 'vi')
                                            <a href="{{ route('site.detail_job',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">
                                        @else 
                                            <a href="{{ route('site.detail_job',['id' => $item['id'],'slug' => $item['slug_en']]) }}">
                                        @endif
                                            <figure class="jf-candidatescover">
                                                <img src="{{ asset('site/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                            </figure>
                                            <figure>
                                                <img src="{{ asset('site/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                            </figure>
                                        </a>
                                        <div class="jf-employerdetails">
                                            @if($locale == 'vi')
                                                <h3 style="text-align: center;"> <a href="{{ route('site.detail_job',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">{{ $item['name_vi']  }}</a></h3>
                                                {{-- Sticker --}}
                                                @if($item['sticker'] == 1)
                                                    <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-fulltimejob" >Hot</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> {{ trans('form.job_detail.interested') }}</a></h3>
                                                @else
                                                <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-parttimejob" >Nổi bật</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> {{ trans('form.job_detail.interested') }}</a></Nổi>
                                                @endif                                                  

                                                <h4><span>{{ trans('form.home.name_title') }}: {{ $item['name_vi'] }}</span><br></h4>
                                                <h4>
                                                    <span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>{{$item['viewed']}} {{ trans('form.job.viewed') }}</span></span>
                                                    <span><i class="lnr lnr-diamond"></i>{{ trans('form.job_detail.salary') }}: {{ $item['salary_vi'] }} </span>
                                                    <span><i class="lnr lnr-briefcase"></i>{{ trans('form.job_detail.exp') }}: {{ $item['years_experience'] }} năm </span>
                                                    <span><i class="lnr lnr-map-marker"></i>{{ $item['address_vi'] }}</span>
                                                    <span><i class="lnr lnr-tag"></i>
                                                        <a href="javascript:void(0);">{{ trans('form.home.industry') }}: 
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
                                                    </span>
                                                </h4>
                                            @else 
                                                <h3 style="text-align: center;"> <a href="{{ route('site.detail_job',['id' => $item['id'],'slug' => $item['slug_en']]) }}">{{ $item['name_en']  }}</a></h3>
                                                {{-- Sticker --}}
                                                @if($item['sticker'] == 1)
                                                    <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-fulltimejob" >Hot</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> {{ trans('form.job_detail.interested') }}</a></h3>
                                                @else
                                                <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-parttimejob" >Featured</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> {{ trans('form.job_detail.interested') }}</a></Nổi>
                                                @endif 

                                                <h4><span>{{ trans('form.home.name_title') }}: {{ $item['name_en'] }}</span><br></h4>
                                                <h4>
                                                    <span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>{{$item['viewed']}} {{ trans('form.job.viewed') }}</span></span>
                                                    <span><i class="lnr lnr-diamond"></i>{{ trans('form.job_detail.salary') }}: {{ $item['salary_en'] }} </span>
                                                    <span><i class="lnr lnr-briefcase"></i>{{ trans('form.job_detail.exp') }}: {{ $item['years_experience'] }} years</span>
                                                    <span><i class="lnr lnr-map-marker"></i>{{ $item['address_en'] }}</span>
                                                    <span><i class="lnr lnr-tag"></i>
                                                        <a href="javascript:void(0);">{{ trans('form.home.industry') }}:
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
                                                    </span>
                                                </h4>
                                            @endif
                                        </div>
                                        <center><a href="javascript:void(0);" class="jf-btn jf-active">{{ trans('form.job_detail.apply_now') }}</a></center><br />
                                    </div>
                                </div>
                                @endforeach
                                <!-- <nav class="jf-pagination">
                                    <ul>
                                        <li class="jf-prevpage"><a href="#"><i class="fa fa-angle-left"></i> Previous</a></li>
                                        <li class="jf-active"><a href="#">01</a></li>
                                        <li><a href="#">02</a></li>
                                        <li><a href="#">03</a></li>
                                        <li><a href="#">04</a></li>
                                        <li><a href="#">05</a></li>
                                        <li><a href="#"></a></li>
                                        <li class="jf-nextpage"><a href="#">Next <i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                </nav> -->
                            </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--************************************
            Blog Grid End
    *************************************-->
</main>
<!--Main End-->
@endsection