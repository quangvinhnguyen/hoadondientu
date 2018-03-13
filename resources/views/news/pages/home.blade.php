@extends('news.layout.layoutforhomepage')

@section('content')
<section class="row">
<article class="six column text-center">
<h2 >Đăng ký</h2>
		<div class="post-image">	 
			<figure>
				<a href="/khachhang"><img src="images/DangKy.png" alt=""></a>
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
	<a href="#"><h4 class="cat-title">Văn bản ban hành </h4></a>


	<table style="width:100%">
  <thead>
  <tr>
     <th>Cơ quan ban hành</th>
	 <th>Trích yếu nội dung</th>
  </tr>
  </thead>
  <tbody>
  
	@foreach($vanbans as $vanban)
  <tr>
  <td>{{$vanban->coquanbanhanh}}</td>
     <td><a href="vanban/detail/{{ $vanban->id }} " style='color: blue'>{{$vanban->trichyeunoidung}}</a></td>
  </tr>
  @endforeach
  </tbody>
</table>
	</div>
</div>

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
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div style="position:fixed; z-index:9999999; right:10px; bottom:10px;" class="fb-page" data-tabs="messages"
data-href="https://www.facebook.com/Hóa-đơn-điện-tử-Visnam-323344591505075" data-width="250" data-height="350" 
data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
	
@endsection
