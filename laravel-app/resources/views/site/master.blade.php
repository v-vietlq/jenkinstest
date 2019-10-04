<!doctype html>	
<html class="no-js" lang="zxx"> 
@include('site.blocks.head')
<body class="jf-home jf-userlogin">
	<!--Wrapper Start-->
	<div id="jf-wrapper" class="jf-wrapper">
		<!--Header Start-->
		@include('site.blocks.header')
		<!--Header End-->
		@yield('content')
		<!--Footer Start-->
    	@include('site.blocks.footer')
		<!--Footer End-->

		<!-- form popup -->

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		@include('site.blocks.signin')
		@include('site.blocks.resetpass')
		@include('site.blocks.signup')

		<!-- end form popup -->


	</div>

	<script src="{{ asset('site/js/vendor/jquery-3.3.1.js')}}"></script>
	<script src="{{ asset('site/js/vendor/jquery-library.js')}}"></script>
	<script src="{{ asset('site/js/vendor/bootstrap.min.js')}}"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&language=en"></script>
	<script src="{{ asset('site/js/jquery.basictable.min.js')}}"></script>
	<script src="{{ asset('site/js/jquery.sortable.js')}}"></script>
	<script src="{{ asset('site/js/owl.carousel.min.js')}}"></script>
	<script src="{{ asset('site/js/circle-progress.js')}}"></script>
	<script src="{{ asset('site/js/magnific-popup.js')}}"></script>
	<script src="{{ asset('site/js/scrollbar.min.js')}}"></script>
	<script src="{{ asset('site/js/chosen.jquery.js')}}"></script>
	<script src="{{ asset('site/js/prettyPhoto.js')}}"></script>
	<script src="{{ asset('site/js/chartist.js')}}"></script>
	<script src="{{ asset('site/js/appear.js')}}"></script>
	<script src="{{ asset('site/js/gmap3.js')}}"></script>
	<script src="{{ asset('site/js/main.js')}}"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script>
		var currentTab = 0; // Current tab is set to be the first tab (0)
		showTab(currentTab); // Display the current tab

		function showTab(n) {
		// This function will display the specified tab of the form ...
		var x = document.getElementsByClassName("tab");
		x[n].style.display = "block";
		// ... and fix the Previous/Next buttons:
		if (n == 0) {
			document.getElementById("prevBtn").style.display = "none";
		} else {
			document.getElementById("prevBtn").style.display = "inline";
		}
		if (n == (x.length - 1)) {
			document.getElementById("nextBtn").innerHTML = "Hoàn tất";
		} else {
			document.getElementById("nextBtn").innerHTML = "Kế tiếp";
		}
		// ... and run a function that displays the correct step indicator:
		fixStepIndicator(n)
		}

		function nextPrev(n) {
		// This function will figure out which tab to display
		var x = document.getElementsByClassName("tab");
		// Exit the function if any field in the current tab is invalid:
		if (n == 1 && !validateForm()) return true;
		// Hide the current tab:
		x[currentTab].style.display = "none";
		// Increase or decrease the current tab by 1:
		currentTab = currentTab + n;
		// if you have reached the end of the form... :
		if (currentTab >= x.length) {
			//...the form gets submitted:
			document.getElementById("regForm").submit();
			return false;
		}
		// Otherwise, display the correct tab:
		showTab(currentTab);
		}

		function validateForm() {
		// This function deals with validation of the form fields
		var x, y, i, valid = true;
		x = document.getElementsByClassName("tab");
		y = x[currentTab].getElementsByTagName("input");
		// A loop that checks every input field in the current tab:
		for (i = 0; i < y.length; i++) {
			// If a field is empty...
			if (y[i].value == "") {
			// add an "invalid" class to the field:
			y[i].className += " invalid";
			// and set the current valid status to false:
			valid = false;
			}
		}
		// If the valid status is true, mark the step as finished and valid:
		if (valid) {
			document.getElementsByClassName("step")[currentTab].className += " finish";
		}
		return valid; // return the valid status
		}

		function fixStepIndicator(n) {
		// This function removes the "active" class of all steps...
		var i, x = document.getElementsByClassName("step");
		for (i = 0; i < x.length; i++) {
			x[i].className = x[i].className.replace(" active", "");
		}
		//... and adds the "active" class to the current step:
		x[n].className += " active";
		}
	</script>	
</body>
</html>