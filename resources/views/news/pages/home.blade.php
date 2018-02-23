@extends('news.layout.layoutforhomepage')

@section('content')
<section class="row">
<article class="six column text-center">
<h2 >Đăng ký</h2>
		<div class="post-image">	 
			<figure>
				<a href=""><img src="images/DangKy.png" alt=""></a>
			</figure>
		</div>
		<div class="post-container">
			<h4 >Các bước đăng ký Hóa đơn điện tử</h4>
		</div>
</article>
<article class="six column text-center">
<h2 >Nghiệp vụ</h2>
		<div class="post-image">	 
			<figure>
				<a href=""><img src="images/NghiepVuPM.png" alt="" </a>
			</figure>
		</div>
		<div class="post-container">
			<h4>Thiết lập và hóa đơn nhanh chóng dễ dàng</h4>
		</div>
</article>
<article class="six column text-center">
<h2 class="" >Hổ trợ</h2>
		<div class="post-image">	 
			<figure>
				<a href=""><img src="images/tongdai.png" alt="" style="max-height:203px"></a>
			</figure>
		</div>
		<div class="post-container">
		<h4 class="" >Tư vấn chuyên nghiệp và thân thiện</h4>
		</div>
</article>


</section>
<!-- End Carousel Posts -->
<!-- Gallery Posts -->
<div class="clearfix mb25 oh">
	<a href="category/video"><h4 class="cat-title">Văn bản ban hành </h4></a>
	</div>
</div>
<!-- <div class="clearfix mb25 oh">
	<a href="category/video"><h4 class="cat-title">Video Nổi Bật</h4></a>
	<div class="carousel-container">
		<div class="carousel-navigation">
			<a class="carousel-prev"></a>
			<a class="carousel-next"></a>
		</div>
		<div class="carousel-item-holder gallery row" data-index="0">
			@foreach( $videos as $video)
			<div class="four column carousel-item">
				<div class="video">
				  <a href="{{$video->feture}}" title="{{$video->title}}">
				  	<video src="{{$video->feture}}" style="width: 100%"></video>
				  </a>       
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div> -->
<!-- End Gallery Posts -->
@endsection
@section('js')
<script type="text/javascript">
    $(function () {
        $('.video a').fancybox({
        	helpers: {  title : { type : 'over' } },
            type: 'iframe'
        });
    });
</script>
@endsection
