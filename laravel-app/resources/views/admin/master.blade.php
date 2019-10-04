<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.blocks.head')
</head>

<body class="navbar-top">

	<!-- Main navbar -->
	@include('admin.blocks.navbar')
	<!-- /main navbar -->

	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		@include('admin.blocks.sidebar')
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			@include('admin.blocks.pageheader')
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Dashboard content -->
				@include('admin.blocks.alert')

				@yield('content')
				<!-- /dashboard content -->

			</div>
			<!-- /content area -->


			<!-- Footer -->
			@include('admin.blocks.footer')
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
