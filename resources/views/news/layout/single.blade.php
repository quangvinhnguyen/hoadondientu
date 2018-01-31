<!doctype html>
<html lang="en">
@include('news.partials.head')
<body>
	<!-- Header -->
	@include('news.partials.header')
	<!-- End Header -->

	<!-- Container -->
	<section class="container row ">
		<!-- Menu top -->
		@include('news.partials.menu')
		<!-- Inner Container -->
		<section class="inner-container clearfix">

			<!-- Content -->
			<section id="content" class="eight column row pull-left">
				@yield('content')
			</section>
			<!-- End Content -->

			<!-- Sidebar -->
			@include('news.partials.sidebar')
			<!-- End Sidebar -->
		</section>
		<!-- End Inner Container -->
	</section>
	<!-- End Container -->

			<!-- Footer -->
			@include('news.partials.footer')
			<!-- End Footer -->
	<!-- Import js -->
	@include('news.partials.importjs')
</body>
</html>