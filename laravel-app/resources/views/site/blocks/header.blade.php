<header id="jf-header" class="jf-header jf-haslayout" lang="{{ app()->getLocale() }}">
    <div class="jf-topbar">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="jf-langnotification" style="margin-bottom: 0px;" >
                            <li>
                                <a id="jf-languagesbutton" href="javascript:void(0);" class="jf-languagesbutton">
                                    <span>{{ trans('form.home.lang') }}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="jf-languagedropdown">
                                    <li><a href="{{ url('locale/vi') }}"><span>Vn</span></a>
                                    </li>
                                    <li><a href="{{ url('locale/en') }}"><span>En</span></a></li>
                                </ul>
                            </li>
                    </ul>
                    <div class="jf-userloginreg">
                        <!-- Chưa đăng nhập -->
                        <ul class="jf-btnappdowld">
                            <li><a href="#" data-toggle="modal" data-target="#myModaldangky" >{{ trans('form.home.register') }} |</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#myModal"  >{{ trans('form.home.login') }}</a></li>
                        </ul>
                        <!-- Khi đã đăng nhập thành công -->
                        <div class="jf-userlogedin">
                            <figure class="jf-userimg">
                                <img src="{{ asset('site/images/usrer-img-01.jpg')}}" alt="image description">
                            </figure>
                            <div class="jf-username">
                                <h3>Lê Quang An</h3>
                            </div>
                            <nav class="jf-usernav">
                                <ul>
                                    <li><a href="dashboard.html"><i class="ti-search"></i><span> {{trans('form.home.searchjob')}} </span></a></li>
                                    <li><a href="{{ route('member.profile') }}"><i class="ti-briefcase"></i><span>{{trans('form.home.personal')}}</span></a></li>
                                    <li><a href="{{ route('member.following') }}"><i class="ti-briefcase"></i><span>{{trans('form.home.profile')}}</span></a></li>
                                    <li><a href="{{ route('member.applied') }}"><i class="ti-bookmark"></i><span>{{trans('form.home.applied')}}</span></a></li>
                                    <li><a href="{{ route('member.following') }}"><i class="ti-heart"></i><span>{{trans('form.home.job_interest')}}</span></a></li>
                                    <li><a href="{{ route('member.changepass') }}"><i class="ti-unlock"></i><span>{{trans('form.home.change_pass')}}</span></a></li>						
                                    <li><a href="{{ route('site.index') }}"><i class="ti-power-off"></i><span>{{trans('form.home.logout')}}</span></a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="jf-navigationlogoarea">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="jf-logo"><a href="{{route('site.index')}}"><img src="{{ asset('site/images/logo.png')}}" alt="company logo here"></a></strong>
                    <div class="jf-rightarea">
                        <nav id="jf-nav" class="jf-nav navbar-expand-lg navbar-toggleable-sm">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="lnr lnr-menu"></i>
                            </button>
                            <div class="collapse navbar-collapse jf-navigation" id="navbarNav">
                                <ul>
                                    <li class="menu-item-has-children page_item_has_children">
                                        <a href="{{route('site.gioithieu')}}">{{ trans('form.home.intro') }}</a>
                                    </li>
                                    <li class="menu-item-has-children page_item_has_children">
                                        <a href="{{route('site.index')}}">{{ trans('form.home.search') }}</a>
                                        {{-- <ul class="sub-menu">
                                            <li><a href="">Chi tiết tin tuyển dụng</a></li>
                                        </ul> --}}
                                    </li>
                                    <li class="menu-item-has-children page_item_has_children">
                                        <a href="{{route('site.nhatuyendung')}}">{{ trans('form.home.employer') }}</a>
                                        {{-- <ul class="sub-menu">
                                            @foreach($name_employer as $item)
                                            <li><a href="">{{ $item->name_vi }}</a></li>
                                            @endforeach
                                        </ul> --}}
                                    </li>
                                    <li class="menu-item-has-children page_item_has_children">
                                        <a href="{{route('site.tintuc')}}">{{ trans('form.home.news') }}</a>
                                        <ul class="sub-menu">
                                            @php  $locale = \App::getLocale(); @endphp
                                            @foreach($news_header_by_category as $item)
                                            @if($locale == 'vi')
                                            <li><a href="{{ route('site.tin_danhmuc',['id' => $item['id']]) }}">{{ $item->name_vi }}</a></li>
                                            @else 
                                            <li><a href="{{ route('site.tin_danhmuc',['id' => $item['id']]) }}">{{ $item->name_en }}</a></li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>	
                </div>
            </div>
        </div>
    </div>
</header>