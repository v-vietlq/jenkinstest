@extends('site.master')
@section('title',trans('form.introduce.home'))
@section('keywords','Thẻ từ khóa')
@section('description','thẻ mô tả')
@section('content') 
@include('site.components.myJs')

<style>
.jf-searchoptions .form-group .jf-radio.jf-all label{
    background:black;
}
</style>
<!-- Home Slider Start-->
<main id="jf-main" class="jf-main jf-haslayout" style="background: url({{asset('site/images/hinh1.jpg')}});width:100%">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jf-slidercontent">
                    <center><h2 style="color:white">{{ trans('form.home.title_search') }}</h2></center><br />
                    <form class="jf-formtheme jf-formbannersearch">
                        <fieldset class="jf-searcharea">
                            <div class="jf-searchholder">
                                <label><em class="lnr lnr-apartment"></em><span>{{ trans('form.home.search_key') }}</span></label>
                                <div class="form-group jf-inputwithicon">
                                    <input  type="search" id="search_key" name="search_key" class="form-control" placeholder="{{ trans('form.home.input') }}">
                                </div>
                            </div>
                            <div class="jf-searchholder">
                                <label><em class="lnr lnr-apartment"></em><span>{{ trans('form.home.career') }}</span></label>
                                <span class="jf-select" style="width: 86%;">
                                    <select data-placeholder="All" id="career_position" class="chosen-select locations" name="career_job">
                                        <option value="">{{ trans('form.home.select_career') }}</option>
                                        @foreach($careers as $item)
                                            @php  $locale = \App::getLocale(); @endphp
                                            @if ($locale == 'vi')
                                                <option value="{{ $item->id }}">{{ $item->name_vi }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name_en }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </span>
                            </div>
                            <div class="jf-searchholder">
                                <label><em class="lnr lnr-apartment"></em><span>{{ trans('form.home.city') }}</span></label>
                                <span class="jf-select" style="width: 86%;">
                                    <select style="padding: 10px 20px 10px 23px;" data-placeholder="All" id="city" class="locations city" name="city">
                                        <option value="">Hồ Chí Minh</option>
                                    </select>
                                </span>
                            </div>
                            
                            <div class="jf-searchholder">
                                <label><em class="lnr lnr-apartment"></em><span>{{ trans('form.home.district') }}</span></label>
                                <span class="jf-select" style="width: 86%;">
                                    <select style="padding: 10px 20px 10px 23px;" data-placeholder="All" id="district" class="locations district" name="district">
                                            <option value="">Vui lòng chọn quận</option>
                                    </select>
                                </span>
                            </div>
                            <div class="jf-searchbtn">
                                <a href="javascript:void(0)" id="findBtn" class="jf-btn"><i class="lnr lnr-magnifier"></i></a>
                            </div>
                        </fieldset>
                    </form><br />
                </div>
            </div>
        </div>
    </div>
</main>
<!--Home Slider End-->
<!--Main Start-->
<div class="jf-haslayout" style="margin-top:35px">
    <div class="container">
        <div class="row">
            <div id="jf-threecolumns" class="jf-threecolumns">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-3 float-left">
                    <aside id="jf-sidebar" class="jf-sidebar jf-sidebarcol">
                        {{-- Đổ dữ liệu category Ngành nghề - Kinh nghiệm - Khu vực --}}
                        <div id="jf-narrowsearchcollapse" class="check jf-themecollapse jf-narrowsearchcollapse category-check">
                            <?php foreach($category as $item){ 
                                $id = $item->id; //Lấy id 
                            ?>
                                <div class="jf-widget jf-themecollapsetitle">
                                    <div class="jf-widgettitle">
                                        @if ($locale == 'vi')
                                        <h3>{{ $item->name_vi }}</h3>
                                        @else
                                        <h3>{{ $item->name_en }}</h3>
                                        @endif
                                        <span class="fa fa-chevron-right"></span>
                                    </div>
                                </div>
                                <div class="jf-widget jf-themecollapsecontent">
                                    <div class="jf-checkboxgroup">
                                        <label>
                                            <input  style="width: 20px;height: 13px;" checked="checked" type="radio" class="{{$item->name_en}}" name="{{$item->name_en}}" value=""><span class="checkmark"></span> <span>{{ trans('form.home.all') }}</span> 
                                        </label><br />
                                        <?php 
                                            $child_cate = DB::table('category')->where('parent',$id)->where('position','>',1)->get(); // category con
                                            foreach($child_cate as $childs){ 
                                        ?>
                                        <label>
                                        @if($locale == 'vi')
                                            <input  style="width: 20px;height: 13px;" type="radio" class="{{$item->name_en}}" name="{{$item->name_en}}" value="{{$childs->id}}"><span class="checkmark"></span> <span>{{ $childs->name_vi }}  </span> 
                                        @else
                                            <input  style="width: 20px;height: 13px;" type="radio" class="{{$item->name_en}}" name="{{$item->name_en}}" value="{{$childs->id}}"><span class="checkmark"></span> <span>{{ $childs->name_en }}  </span>
                                        @endif
                                        </label><br />
                                        <?php } ?>
                                            {{-- <a href="javascript:void(0);" class="jf-viewmore">{{ trans('form.home.view_more') }}</a>  --}}
                                    </div>
                                </div>   
                            <?php } ?>
                            {{-- Kết thúc đổ dữ liệu --}}
                            <div class="jf-widget jf-themecollapsetitle">
                                <div class="jf-widgettitle">
                                    <h3>{{ trans('form.home.area') }}</h3>
                                    <span class="fa fa-chevron-right"></span>
                                </div>
                            </div>
                            <div class="jf-widget jf-themecollapsecontent">
                                <div class="jf-checkboxgroup">
                                    <div class="jf-searchholder" style="width: 100%;border: 1px solid #ddd;padding: 6px 0;margin-bottom: 10px;" >
                                        <span class="jf-select">
                                            <select data-placeholder="All" class="form-control locations" id="city2" name="city">
                                                <option value="">Hồ chí minh</option>
                                            </select>
                                        </span>
                                    </div> 
                                    <div class="jf-searchholder" style="width: 100%;border: 1px solid #ddd;padding: 6px 0;" >
                                    <span class="jf-select">
                                        <select data-placeholder="All" id="district2" class="form-control locations" name="district">
                                            <option value="">Quận 1</option>
                                        </select>
                          
                                    </span>
                                </div>
                                </div>
                                
                            </div>
                            <!-- <div class="jf-widget jf-Jobssearch">
                                <div class="jf-Jobssearchbtn">
                                    <a href="javascript:void(0);" class="jf-btn jf-active">Tìm việc</a>
                                </div>
                            </div> -->
                        </div>
                    </aside>
                </div>
                <!-- Công việc - job -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-9 float-left">
                    <div class="jf-innersectionhead">
                        <div class="jf-title" id="result_search">
                            {{-- <h2>Kết quả tìm kiếm</h2>
                            <span>có 1000 kết quả tìm kiếm</span> --}}
                        </div>
                    </div>

                    <div class="jf-candidatessearchsvtwo" >
                        <div id="job_replace">
                        @foreach($job as $item)
                        <div class="jf-candidatessearcgrid jf-verticaltop">
                            <div class="jf-candidatessearch">
                                @if($locale == 'vi')
                                    <a href="{{ route('site.detail_job',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">
                                        <figure class="jf-candidatescover">
                                            <img src="{{ asset('site/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                        </figure>
                                        <figure>
                                            <img src="{{ asset('site/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                        </figure>
                                    </a>
                                @else 
                                    <a href="{{ route('site.detail_job',['id' => $item['id'],'slug' => $item['slug_en']]) }}">
                                        <figure class="jf-candidatescover">
                                            <img src="{{ asset('site/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                        </figure>
                                        <figure>
                                            <img src="{{ asset('site/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                        </figure>
                                    </a>
                                @endif
                                <div class="jf-employerdetails">
                                    @if($locale == 'vi')
                                        <h3 style="text-align: center;"> <a href="{{ route('site.detail_job',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">
                                                <?php $employer = $item['employer']; echo $employer['name_vi']; ?>
                                        </a></h3>
                                    @else
                                        <h3 style="text-align: center;"> <a href="{{ route('site.detail_job',['id' => $item['id'],'slug' => $item['slug_en']]) }}">
                                                <?php $employer = $item['employer']; echo $employer['name_en']; ?>
                                        </a></h3>
                                    @endif
                                    @if($locale == 'vi')
                                        {{-- Sticker --}}
                                        @if($item['sticker'] == 1)
                                            <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-fulltimejob" >Hot</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> {{ trans('form.job_detail.interested') }}</a></h3>
                                        @else
                                        <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-parttimejob" >Nổi bật</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> {{ trans('form.job_detail.interested') }}</a></Nổi>
                                        @endif
                                    @else 
                                        {{-- Sticker --}}
                                        @if($item['sticker'] == 1)
                                        <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-fulltimejob" >Hot</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> {{ trans('form.job_detail.interested') }}</a></h3>
                                        @else
                                        <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-parttimejob" >Featured</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> {{ trans('form.job_detail.interested') }}</a></Nổi>
                                        @endif
                                    @endif
                                    
                                    <!-- <h3 style="text-align: center;"><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background: #ccc9c1;color: white;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike jf-btnliked"><i class="fa fa-heart-o"></i> quan tâm</a></h3> -->

                                    <h4>
                                        @if($locale == 'vi')
                                            <span>{{ trans('form.home.name_title') }}: {{ $item['name_vi'] }}</span>
                                        @else
                                        <span>{{ trans('form.home.name_title') }}: {{ $item['name_en'] }}</span>
                                        @endif
                                    </h4>
                                    <h4>
                                        @if($locale == 'vi')
                                            <span><i class="lnr lnr-eye"></i>{{ $item['viewed'] }} {{ trans('form.home.view') }}</span>
                                            <span><i class="lnr lnr-diamond"></i>{{ trans('form.job_detail.salary') }}: {{$item['salary_vi']}}</span>
                                            <span><i class="lnr lnr-briefcase"></i>{{ trans('form.job_detail.exp') }}: {{$item['years_experience']}} năm</span>
                                            <span><i class="lnr lnr-map-marker"></i>{{ $item['place_work_vi'] }}</span>
                                            <span><i class="lnr lnr-tag"></i>
                                                <a href="javascript:void(0);">
                                                    {{ trans('form.home.industry') }}: 
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
                                        @else 
                                            <span><i class="lnr lnr-eye"></i>{{ $item['viewed'] }} {{ trans('form.home.view') }}</span>
                                            <span><i class="lnr lnr-diamond"></i>{{ trans('form.job_detail.salary') }}: {{$item['salary_en']}}</span>
                                            <span><i class="lnr lnr-briefcase"></i>{{ trans('form.job_detail.exp') }}: {{$item['years_experience']}} years</span>
                                            <span><i class="lnr lnr-map-marker"></i>{{ $item['place_work_en'] }}</span>
                                            <span><i class="lnr lnr-tag"></i>
                                                <a href="javascript:void(0);">
                                                    {{ trans('form.home.industry') }}: <?php $first = DB::table('category')
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
                                        @endif
                                    </h4>
                                </div>
                                <center><a href="javascript:void(0);" class="jf-btn jf-active">{{ trans('form.job_detail.apply_now') }}</a></center><br />
                            </div>
                        </div>
                        @endforeach
                        </div>

                        {{--  Phân trang --}}
                        @if($job->currentPage() != 1)
                        <nav class="jf-pagination">
                            <ul>
                                @if($job->currentPage() != 1)
                                <li class="jf-prevpage"><a href="{{ $job->url($job->currentPage() - 1)}}"><i class="fa fa-angle-left"></i> Previous</a></li>
                                @endif
                                @for($i=1 ; $i <= $job->lastPage(); $i = $i + 1)
                                    <li class="{{ ($job->currentPage() == $i) ? 'jf-active' : '' }}"><a href="{{ $job->url($i)}}">{{ $i }}</a></li>
                                @endfor
                                @if($job->currentPage() != $job->lastPage())
                                <li class="jf-nextpage"><a href="{{ $job->url($job->currentPage() + 1)}}">Next <i class="fa fa-angle-right"></i></a></li> 
                                @endif
                            </ul>
                        </nav>
                        @endif

                    </div>
                </div>
                <!-- Công việc - job -->
            </div>
        </div>
    </div>
</div>
<!--Main End-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
    var domain = 'http://localhost:8000';
    
    function sortName (object) {
        var array = []
    
        Object.keys(object).forEach(function(key) {
            array.push(object[key]);
        });
    
        array.sort(function(a, b) {
            var textA = a.slug.toUpperCase();
            var textB = b.slug.toUpperCase();
            return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        });
    
        return array;
    }
    
    function loadData (url,tag,selected = '',area = '') {
        $.ajax({
            type: "GET",
            url: domain + "/hanhchinhvn/" + url,
            dataType: "json",
            success: function (repsonse) {
                var obj = sortName(repsonse);
                var option = '';
                obj.forEach(function(item, index){ 
                    if (selected == item.code) {
                        option += '<option value="'+item.code+'" selected>'+ item.name_with_type +'</option>';
                    } else {
                        option += '<option value="'+item.code+'">'+ item.name_with_type +'</option>';
                    }
                    
                });
    
                $(tag).html("<option value=''>Vui lòng chọn</option>"+option);
    
                if (area == 'district') {
                    var idFirstDistrict = obj[0].code;
                    loadData('phuong/' + idFirstDistrict + '.json','select[name="ward"]');
                }
            }
        });
    }
    
    loadData('tinh_tp.json','select[name="city"]','{{ old('city') }}');
    loadData('quan/{{ old('city',89) }}.json','select[name="district"]','{{ old('district') }}');
    loadData('phuong/{{ old('district',886) }}.json','select[name="ward"]','{{ old('ward') }}');
    
    $('select[name="city"]').on('change',function () {
        var selectedCity = $(this).val();
        loadData('quan/' + selectedCity + '.json','select[name="district"]','<?php echo old('district') ?>','district');
        
    });
    
    $('select[name="district"]').on('change',function () {
        var selectedDestrict = $(this).val();
        loadData('phuong/' + selectedDestrict + '.json','select[name="ward"]',{{ old('ward') }});
    });
    </script>
@endsection