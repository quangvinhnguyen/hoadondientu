<!doctype html>
<html lang="en">
@include('news.partials.head')
<body>
	<!-- Header -->
	@include('news.partials.header')
	<!-- End Header -->
	<!-- Container -->
	<section class="container row clearfix">
		<!-- Menu top -->
		@include('news.partials.menu')
	
			<!-- Content -->
			<section>
				<!-- Slider -->
				@include('news.partials.slide')
				<!-- End Slider -->
                @yield('content')
	
			</section>

		<!-- End Inner Container -->
	</section>
	<!-- End Container -->
	@include('news.partials.footer')
			<!-- End Footer -->
	<!-- Import js -->
	@include('news.partials.importjs')
	@yield('js')
</body>
</html>