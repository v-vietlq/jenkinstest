@extends('site.master')
@section('title',trans('form.news.title_detail'))
@section('keywords','Thẻ từ khóa')
@section('description','thẻ mô tả')
@section('content') 
<!--breadcrumbarea start-->
<div class="jf-breadcrumbarea">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="jf-breadcrumb">
                    <li><a href="#">{{ trans('form.news.home') }}</a></li>
                    <li>{{ trans('form.news.detail') }}</li>
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
                            <div class="jf-nextprevposts">
                                <div class="jf-btnprevpost">
                                    @php $locale = \App::getLocale();  @endphp
                                    @if($locale == 'vi')
                                        <a href="{{ route('site.chitiet',['id' => $before_news['id'],'slug' => $before_news['slug_vi']]) }}">
                                            <figure>
                                                <img src="{{ asset('site/images/thumbnail/img-01.jpg')}}" alt="image description">
                                            </figure>
                                            <div class="jf-posttname">
                                                <h3>{{ $before_news['title_vi'] }}</h3>
                                                <span><i class="lnr lnr-arrow-left"></i> {{ trans('form.news.before_news') }}</span>
                                            </div>
                                        </a>
                                    @else 
                                        <a href="{{ route('site.chitiet',['id' => $before_news['id'],'slug' => $before_news['slug_en']]) }}">
                                            <figure>
                                                <img src="{{ asset('site/images/thumbnail/img-01.jpg')}}" alt="image description">
                                            </figure>
                                            <div class="jf-posttname">
                                                <h3>{{ $before_news['title_en'] }}</h3>
                                                <span><i class="lnr lnr-arrow-left"></i> {{ trans('form.news.before_news') }}</span>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                                <div class="jf-btnnextpost">
                                    @if($locale == 'vi')
                                        <a href="{{ route('site.chitiet',['id' => $after_news['id'],'slug' => $after_news['slug_vi']]) }}">
                                            <figure>
                                                <img src="{{ asset('site/images/thumbnail/img-02.jpg')}}" alt="image description">
                                            </figure>
                                            <div class="jf-posttname">
                                                <h3>{{ $after_news['title_vi'] }}</h3>
                                                <span>{{ trans('form.news.after_news') }}<i class="lnr lnr-arrow-right"></i></span>
                                            </div>
                                        </a>
                                    @else 
                                        <a href="{{ route('site.chitiet',['id' => $after_news['id'],'slug' => $after_news['slug_en']]) }}">
                                            <figure>
                                                <img src="{{ asset('site/images/thumbnail/img-02.jpg')}}" alt="image description">
                                            </figure>
                                            <div class="jf-posttname">
                                                <h3>{{ $after_news['title_en'] }}</h3>
                                                <span>{{ trans('form.news.after_news') }}<i class="lnr lnr-arrow-right"></i></span>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="jf-innersectionhead">
                                <div class="jf-title">
                                    @if($locale == 'vi')
                                        <h2>{{ $news_detail['title_vi'] }}</h2>
                                    @else 
                                        <h2>{{ $news_detail['title_en'] }}</h2>
                                    @endif
                                </div>
                            </div>
                            <ul class="jf-postarticlemetavtwo">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="lnr lnr-calendar-full"></i>
                                        <span>{{ date('d-m-Y', strtotime($news_detail['created_at'])) }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="lnr lnr-tag"></i>
                                        <span>
                                            @php 
                                                $category = $news_detail['category'];
                                                if($locale == 'vi'){
                                                    echo $category['name_vi']; // Tên thể loại
                                                }else{
                                                    echo $category['name_en']; // Tên thể loại
                                                }
                                            @endphp 
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <figure class="jf-blogdetailimgvtwo">
                                <img src="{{ asset('site/images/blogdetail/img-03.jpg')}}" alt="image description">
                            </figure>
                            <div class="jf-description">
                                @if($locale == 'vi')
                                    <p>{{ $news_detail['content_vi'] }}</p>
                                @else 
                                    <p>{{ $news_detail['content_en'] }}</p>
                                @endif
                            </div>
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