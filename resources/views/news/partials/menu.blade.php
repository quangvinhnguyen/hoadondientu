<!-- Menu -->
<header class="clearfix">
	<a href="" class="pull-left"><img alt="" src="images/logo/newsmall.png"></a>
	<nav id="main-menu" class="right navigation">
		<ul class="sf-menu no-bullet inline-list m0">
			<li><a href="gioithieu">Giới thiệu </a></li>
			<li><a href="#">Tải phần mềm</a></li>
			@foreach ($categories as $cate)
				<li>
					<a href="category/{{ $cate->slug }}">{{ $cate->name }}</a>
	    		</li>
			@endforeach
			<li><a href="huongdan">Hướng dẫn</a></li>
			<li><a href="http://118.69.187.103:8090">Tra cứu</a></li>
    		<li><a href="contact.html">Liên Hệ</a></li>
		</ul>
	</nav>

	<!-- <div class="search-bar left clearfix">
		<form action="{{route('search')}}" method="get">
			<input name="key" type="text" data-value="search" value="Tìm kiếm">
			<input type="submit" value="">
		</form>
	</div> -->
</header>
