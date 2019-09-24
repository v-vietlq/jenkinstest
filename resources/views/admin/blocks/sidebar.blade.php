<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        @if (Auth::check())
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#">
                            @if (empty(Auth::user()->avatar))
                                <img src="{{ asset('backend/global_assets/images/placeholders/placeholder.jpg') }}" class="rounded-circle mr-2" height="34" alt="">
                            @else 
                                <img src="{{ Auth::user()->avatar }}" class="rounded-circle mr-2" height="34" alt="">
                            @endif
                        </a>
                    </div>

                    <div class="media-body">
                        
                        <div class="media-title font-weight-semibold">{{ Auth::user()->email }}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="index.html" class="nav-link">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>

                @foreach (menu() as $menu)
                    @if ($menu["status"] == 'on')
                        <li class="nav-item nav-item-submenu {{ request()->is($menu["request"]) ? 'nav-item-expanded nav-item-open' : '' }}">
                            <a href="" class="nav-link"><i class="{{ $menu["icon"] }}"></i> <span>{{ __($menu["name"]) }}</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Icons">
                                @foreach ($menu["action"] as $submenu)
                                    <li class="nav-item"><a href="{{ route($submenu["route"]) }}" class="nav-link {{ request()->is($submenu["request"]) ? 'active' : '' }}">{{ __($submenu["name"]) }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
    
</div>