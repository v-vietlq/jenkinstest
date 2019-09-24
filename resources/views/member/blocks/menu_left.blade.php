<div id="jf-sidebarwrapper" class="jf-sidebarwrapper">
    <!-- <a id="jf-btnmenutoggle" href="javascript:void(0);" class="jf-btnmenutoggle"><i class="lnr lnr-menu"></i></a> -->
    <div class="jf-verticalscrollbar">
    
        <div class="jf-logoarea">
            <a class="jf-logoicon" href="{{ route('site.index') }}"><img src="{{asset('site/images/logo-icon.png')}}" alt="imagedescription" class="mCS_img_loaded"></a>
            <strong class="jf-logo"><a href="{{ route('site.index') }}"><img src="{{asset('site/images/logow.png')}}" alt="image description" class="mCS_img_loaded"></a></strong>
        </div>
        <nav id="jf-dashboardnav" class="jf-dashboardnav">
            <ul>
                <li class="jf-insightesnoti jf-notificationicon">
                    <a href="{{ route('site.index') }}">
                        <i class="ti-search"></i>
                        <span> {{trans('form.profile.search')}}</span>
                    </a>
                </li>
                <li class="jf-profilenoti jf-notificationicon jf-active">
                    <a href="{{ route('member.profile') }}">
                        <i class="ti-user"></i>
                        <span>{{trans('form.profile.personal_account')}}</span>
                    </a>
                </li>
                <li class="jf-profilenoti jf-notificationicon jf-active">
                    <a href="{{ route('member.hoso') }}">
                        <i class="ti-briefcase"></i>
                        <span>{{trans('form.profile.profile')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('member.applied') }}">
                        <i class="ti-bookmark"></i>
                        <span>{{trans('form.profile.apllied')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('member.following') }}">
                        <i class="ti-heart"></i>
                        <span>{{trans('form.profile.interested')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('member.changepass') }}">
                        <i class="ti-unlock"></i>
                        <span>{{trans('form.profile.changepass')}}</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div id="weather"></div>
    </div>
    <a class="jf-btnlogout" href="{{ route('site.index') }}"><i class="ti-power-off"></i></a>
</div>