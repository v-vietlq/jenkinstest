@extends('site.master')
@section('title',trans('form.introduce.title'))
@section('keywords','Thẻ từ khóa')
@section('description','thẻ mô tả')
@section('content') 
<!--breadcrumbarea start-->
<div class="jf-breadcrumbarea">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="jf-breadcrumb">
                    <li><a href="#">{{ trans('form.introduce.home') }}</a></li>
                    <li>{{ trans('form.introduce.intro') }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbarea End-->
<!--Main Start-->
<main id="jf-main" class="jf-main jf-haslayout">
    <div class="jf-sectionspace jf-haslayout">
        <div class="container">
            <div class="row">
                <div id="jf-twocolumns" class="jf-twocolumns">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 pull-right">
                        <div id="jf-content" class="jf-content jf-blogdetail">
                            <div class="jf-innersectionhead">
                                <div class="jf-title">
                                    @php $locale = \App::getLocale(); @endphp
                                    @if($locale == 'vi')
                                        <h2>{{ $page['title_vi'] }}</h2>
                                    @else 
                                        <h2>{{ $page['title_en'] }}</h2>
                                    @endif
                                </div>
                            </div>
                            <ul class="jf-postarticlemetavtwo">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="lnr lnr-calendar-full"></i>
                                        <span>{{ trans('form.introduce.date_post') }}: {{ date('d-m-Y', strtotime($page['created_at'])) }}</span>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="javascript:void(0);">
                                        <i class="lnr lnr-tag"></i>
                                        <span>Thể loại tin </span>
                                    </a>
                                </li> --}}
                            </ul>
                            <figure class="jf-blogdetailimgvtwo">
                                <img src="{{ asset('site/images/blogdetail/img-03.jpg')}}" alt="image description">
                            </figure>
                            @if($locale == 'vi')
                                <div class="jf-description">
                                        {{ $page['content_vi'] }}
                                </div>
                            @else 
                                <div class="jf-description">
                                        {{ $page['content_en'] }}
                                </div>
                            @endif
                        </div>
                    </div>
                    @include('site.components.hot_and_latest_news')
                </div>
            </div>
        </div>
    </div>
</main>
<!--Main End-->
@endsection