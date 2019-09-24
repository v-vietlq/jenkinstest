<header id="jf-dashboardheader" class="jf-dashboardheader jf-haslayout">
    <div class="jf-rightarea">
        <ul class="jf-langnotification">
            <li>
                <a id="jf-languagesbutton" style="border-right: 1px solid #eff2f5;"  href="javascript:void(0);" class="jf-languagesbutton">
                    <span>{{ trans('form.profile.lang') }}</span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="jf-languagedropdown">
                    <li>
                        <a href="{{ url('locale/vi') }}">
                            <span>Vn</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('locale/en') }}">
                            <span>En</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="jf-userlogedin">
            <figure class="jf-userimg">
                <img src="{{asset('member/images/usrer-img-01.jpg')}}" alt="image description">
            </figure>
            <div class="jf-username">
                <h3>Lê Quang An</h3>
                <!-- <span>Sr. Creative Designer</span> -->
            </div>
            <nav class="jf-usernav">
                <ul>
                    <li><a href="dashboard.html"><i class="ti-search"></i><span> {{trans('form.profile.search')}}</span></a></li>
                    <li><a href="{{ route('member.profile') }}"><i class="ti-briefcase"></i><span>{{trans('form.profile.personal')}}</span></a></li>
                    <li><a href="{{ route('member.following') }}"><i class="ti-briefcase"></i><span>{{trans('form.profile.profile')}}</span></a></li>
                    <li><a href="{{ route('member.applied') }}"><i class="ti-bookmark"></i><span>{{trans('form.profile.apllied')}}</span></a></li>
                    <li><a href="{{ route('member.following') }}"><i class="ti-heart"></i><span>{{trans('form.profile.interested')}}</span></a></li>
                    <li><a href="{{ route('member.changepass') }}"><i class="ti-unlock"></i><span>{{trans('form.profile.changepass')}}</span></a></li>						
                    <li><a href="{{ route('site.index') }}"><i class="ti-power-off"></i><span>{{trans('form.profile.logout')}}</span></a></li>
                </ul>
            </nav>
        </div>
    </div>

    @include('member.blocks.menu_left')

    
</header>