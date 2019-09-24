<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title','Admin')</title>

<!-- Global stylesheets -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https:/fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="{{ asset('admin/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->

<!-- Core JS files -->
<script src="{{ asset('admin/global_assets/js/main/jquery.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
@stack('themejs')
<script src="{{ asset('admin/assets/js/app.js') }}"></script>
<!-- Core JS files -->
<script type="text/javascript">
    var publicPath = '{{ Request::root() . "/public" }}';
    var domainPath = '{!! env('APP_URL') !!}';
</script>
<!-- /theme JS files -->