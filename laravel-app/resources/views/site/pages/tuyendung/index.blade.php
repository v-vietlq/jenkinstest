@extends('site.master')
@section('title',trans('form.employer.title'))
@section('keywords','Thẻ từ khóa')
@section('description','thẻ mô tả')
@section('content') 

<!--breadcrumbarea start-->
    <div class="jf-breadcrumbarea">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ol class="jf-breadcrumb">
                        <li><a href="index.html">{{ trans('form.employer.home') }}</a></li>
                        <li>{{ trans('form.employer.employer') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbarea End-->
    <!--Main Start-->
    <div class="jf-sectionspace jf-haslayout">
        <div class="jf-haslayout">
            <div class="container">
                <div class="row">
                    <div id="jf-threecolumns" class="jf-threecolumns">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="jf-candidatessearchsvtwo">
                                @php $locale = \App::getLocale(); @endphp
                                @foreach($employer as $item)
                                @if($locale == 'vi')
                                    <div class="jf-candidatessearcgrid jf-verticaltop">
                                        <div class="jf-candidatessearch">
                                            <a href="{{ route('site.detail_tuyendung',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">
                                                <figure class="jf-candidatescover">
                                                    <img src="{{ asset('site/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                                </figure>
                                                <figure>
                                                    <img src="{{ asset('site/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                                </figure>
                                            </a>
                                            <div class="jf-employerdetails">
                                                <h3 style="text-align: center;"> <a href="{{ route('site.detail_tuyendung',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">{{ $item['name_vi'] }} </a></h3>
                                                <h4 style="text-align: center;"><span>{{ $item['about_vi'] }}</span>
                                                </h4>
                                            </div>
                                            <center><a href="{{ route('site.detail_tuyendung',['id' => $item['id'],'slug' => $item['slug_vi']]) }}" class="jf-btn jf-active">{{ trans('form.employer.detail') }}</a></center><br />
                                        </div>
                                    </div>
                                @else 
                                    <div class="jf-candidatessearcgrid jf-verticaltop">
                                        <div class="jf-candidatessearch">
                                            <a href="{{ route('site.detail_tuyendung',['id' => $item['id'],'slug' => $item['slug_en']]) }}">
                                                <figure class="jf-candidatescover">
                                                    <img src="{{ asset('site/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                                </figure>
                                                <figure>
                                                    <img src="{{ asset('site/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                                </figure>
                                            </a>
                                            <div class="jf-employerdetails">
                                                <h3 style="text-align: center;"> <a href="{{ route('site.detail_tuyendung',['id' => $item['id'],'slug' => $item['slug_en']]) }}">{{ $item['name_en'] }} </a></h3>
                                                <h4 style="text-align: center;"><span>{{ $item['about_en'] }}</span>
                                                </h4>
                                            </div>
                                            <center><a href="{{ route('site.detail_tuyendung',['id' => $item['id'],'slug' => $item['slug_en']]) }}" class="jf-btn jf-active">{{ trans('form.employer.detail') }}</a></center><br />
                                        </div>
                                    </div>
                                @endif
                                @endforeach

                               {{--  Phân trang --}}
                                @if($employer->currentPage() != 1)
                                <nav class="jf-pagination">
                                    <ul>
                                        @if($employer->currentPage() != 1)
                                        <li class="jf-prevpage"><a href="{{ $employer->url($employer->currentPage() - 1)}}"><i class="fa fa-angle-left"></i> Previous</a></li>
                                        @endif
                                        @for($i=1 ; $i <= $employer->lastPage(); $i = $i + 1)
                                            <li class="{{ ($employer->currentPage() == $i) ? 'jf-active' : '' }}"><a href="{{ $employer->url($i)}}">{{ $i }}</a></li>
                                        @endfor
                                        @if($employer->currentPage() != $employer->lastPage())
                                        <li class="jf-nextpage"><a href="{{ $employer->url($employer->currentPage() + 1)}}">Next <i class="fa fa-angle-right"></i></a></li> 
                                        @endif
                                    </ul>
                                </nav>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************
                Blog Grid End
        *************************************-->
    </div>
<!--Main End-->
@endsection