<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 float-left">
    <aside id="jf-sidebar" class="jf-sidebar">
        <div class="jf-widget jf-recentposts">
            <div class="jf-widgettitle">
                <h3>{{ trans('form.news.latest_news') }}</h3>
            </div>
            <div class="jf-recentpost">
                @php $locale = \App::getLocale();  @endphp
                @foreach($latest_news as $item)
                <div class="jf-recentpostdetails">
                    @if($locale == 'vi')
                        <figure class="jf-recentpostimg">
                            <a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">
                                <img src="{{ asset('site/images/thumbnail/img-03.jpg')}}" alt="image description">
                            </a>
                        </figure>
                        <div class="jf-recentpostcontent">
                            <h3><a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">{{ $item['title_vi'] }}</a></h3>
                            <span><i class="lnr lnr-calendar-full"></i> {{ date('d-m-Y', strtotime($item['created_at'])) }}</span>
                        </div>
                    @else 
                        <figure class="jf-recentpostimg">
                            <a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_en']]) }}">
                                <img src="{{ asset('site/images/thumbnail/img-03.jpg')}}" alt="image description">
                            </a>
                        </figure>
                        <div class="jf-recentpostcontent">
                            <h3><a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_en']]) }}">{{ $item['title_en'] }}</a></h3>
                            <span><i class="lnr lnr-calendar-full"></i> {{ date('d-m-Y', strtotime($item['created_at'])) }}</span>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        <div class="jf-widget jf-recentposts">
            <div class="jf-widgettitle">
                <h3>{{ trans('form.news.hot_news') }}</h3>
            </div>
            <div class="jf-recentpost">
                @foreach($hot_news as $item)
                <div class="jf-recentpostdetails">
                    @if($locale == 'vi')
                        <figure class="jf-recentpostimg">
                            <a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">
                                <img src="{{ asset('site/images/thumbnail/img-03.jpg')}}" alt="image description">
                            </a>
                        </figure>
                        <div class="jf-recentpostcontent">
                            <h3><a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_vi']]) }}">{{ $item['title_vi'] }}</a></h3>
                            <span><i class="lnr lnr-calendar-full"></i> {{ date('d-m-Y', strtotime($item['created_at'])) }} </span>
                        </div>
                    @else 
                        <figure class="jf-recentpostimg">
                            <a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_en']]) }}">
                                <img src="{{ asset('site/images/thumbnail/img-03.jpg')}}" alt="image description">
                            </a>
                        </figure>
                        <div class="jf-recentpostcontent">
                            <h3><a href="{{ route('site.chitiet',['id' => $item['id'],'slug' => $item['slug_en']]) }}">{{ $item['title_en'] }}</a></h3>
                            <span><i class="lnr lnr-calendar-full"></i> {{ date('d-m-Y', strtotime($item['created_at'])) }} </span>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </aside>
</div>