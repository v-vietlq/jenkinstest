<!doctype html>
<html class="no-js" lang="">
@include('member.blocks.head')
<body class="jf-userlogin">
	<div id="jf-wrapper" class="jf-wrapper">
		<!--Header Start-->
        @include('member.blocks.header')
		<!--Header End-->
		@yield('content')
		<!--Footer Start-->
		@include('member.blocks.footer')
		<!--Footer End-->
	</div>

	<script src="{{asset('member/js/vendor/jquery-3.3.1.js')}}"></script>
	<script src="{{asset('member/js/vendor/bootstrap.min.js')}}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ3q6w3hiHe_MIbB1Jy31bGOwL8LYlwJw"></script>
	<script src="{{asset('member/js/jquery.basictable.min.js')}}"></script>
	<script src="{{asset('member/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('member/js/circle-progress.js')}}"></script>
	<script src="{{asset('member/js/jquery.collapse.js')}}"></script>
	<script src="{{asset('member/js/countdown.min.js')}}"></script>
	<script src="{{asset('member/js/jquery.sortable.js')}}"></script>
	<script src="{{asset('member/js/scrollbar.min.js')}}"></script>
	<script src="{{asset('member/js/chosen.jquery.js')}}"></script>
	<script src="{{asset('member/js/prettyPhoto.js')}}"></script>
	<script src="{{asset('member/js/chartist.js')}}"></script>
	<script src="{{asset('member/js/appear.js')}}"></script>
	<script src="{{asset('member/js/gmap3.js')}}"></script>
	<script src="{{asset('member/js/main.js')}}"></script>
</body>
</html>