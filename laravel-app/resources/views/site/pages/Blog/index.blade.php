@extends('site.master')
@section('title',trans('form.news.title_home'))
@section('content') 
<!--breadcrumbarea start-->
<div class="jf-breadcrumbarea">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="jf-breadcrumb">
                    <li><a href="#">{{ trans('form.news.home') }}</a></li>
                    <li class="jf-active">{{ trans('form.news.news') }}</li>
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
                        <div id="jf-content" class="jf-content">
                            <div class="jf-posts jf-postsgrid">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 float-left">
                                        @php $locale = \App::getLocale();  @endphp
                                        @foreach($news as $item)
                                        <article class="jf-newsarticle jf-newsarticlevtwo">
                                        @if($locale == 'vi')
                                            <a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">
                                                <figure class="jf-newsimg">
                                                    <img src="{{ asset('site/images/bloggrid/img-11.jpg')}}" alt="image description">
                                                </figure>
                                            </a>
                                            <div class="jf-addcontent">
                                                <div class="jf-postauthorname">
                                                    <div class="jf-articlecontent">
                                                        <div class="jf-articletitle">
                                                            <h3><a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">{{ $item['title_vi'] }}</a></h3>
                                                        </div>
                                                        <i class="lnr lnr-calendar-full"></i> <span>{{ date('d-m-Y', strtotime($item['created_at'])) }}</span>
                                                    </div>
                                                    <div class="jf-description">
                                                        <p>{{ $item['intro_vi'] }}</p>
                                                    </div>
                                                </div>
                                                <ul class="jf-postarticlemeta">
                                                    <li>
                                                    <i class="lnr lnr-tag"></i>
                                                        <span>{{ $item['keyword_tag_vi'] }}</span>
                                                    </li>
                                                    <li>
                                                        <i class="lnr lnr-eye"></i>
                                                        <a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_vi']]) }}"> <span>{{ trans('form.news.detail') }}</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        @else 
                                            <a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_en']]) }}">
                                                <figure class="jf-newsimg">
                                                    <img src="{{ asset('site/images/bloggrid/img-11.jpg')}}" alt="image description">
                                                </figure>
                                            </a>
                                            <div class="jf-addcontent">
                                                <div class="jf-postauthorname">
                                                    <div class="jf-articlecontent">
                                                        <div class="jf-articletitle">
                                                            <h3><a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_en']]) }}">{{ $item['title_en'] }}</a></h3>
                                                        </div>
                                                        <i class="lnr lnr-calendar-full"></i> <span>{{ date('d-m-Y', strtotime($item['created_at'])) }}</span>
                                                    </div>
                                                    <div class="jf-description">
                                                        <p>{{ $item['intro_en'] }}</p>
                                                    </div>
                                                </div>
                                                <ul class="jf-postarticlemeta">
                                                    <li>
                                                    <i class="lnr lnr-tag"></i>
                                                        <span>{{ $item['keyword_tag_en'] }}</span>
                                                    </li>
                                                    <li>
                                                        <i class="lnr lnr-eye"></i>
                                                        <a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_en']]) }}"> <span>{{ trans('form.news.detail') }}</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                        </article>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{--  Phân trang --}}
                            @if($news->currentPage() != 1)
                            <nav class="jf-pagination">
                                <ul>
                                    @if($news->currentPage() != 1)
                                    <li class="jf-prevpage"><a href="{{ $news->url($news->currentPage() - 1)}}"><i class="fa fa-angle-left"></i> Previous</a></li>
                                    @endif
                                    @for($i=1 ; $i <= $news->lastPage(); $i = $i + 1)
                                        <li class="{{ ($news->currentPage() == $i) ? 'jf-active' : '' }}"><a href="{{ $news->url($i)}}">{{ $i }}</a></li>
                                    @endfor
                                    @if($news->currentPage() != $news->lastPage())
                                    <li class="jf-nextpage"><a href="{{ $news->url($news->currentPage() + 1)}}">Next <i class="fa fa-angle-right"></i></a></li> 
                                    @endif
                                </ul>
                            </nav>
                            @endif
                        </div>
                    </div>

                    {{-- Tin mới nhất & Tin nổi bật --}}
                    @include('site.components.hot_and_latest_news')
                    {{-- Tin mới nhất & Tin nổi bật --}}
                    
                </div>
            </div>
        </div>
    </div>
</main>
<!--Main End-->
@endsection