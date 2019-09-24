<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.blocks.head')
</head>

<body>
    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

            <!-- Dashboard content -->
                @include('admin.blocks.alert')

                @yield('content')
            <!-- /dashboard content -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

</body>
</html>
