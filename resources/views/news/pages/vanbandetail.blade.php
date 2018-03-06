@extends('news.layout.single')
@section('content')
<table style="width:100%">
		<colgroup>
			<col><col>
		</colgroup>
		<tbody><tr class="odd_row">
			<td class="normal_label">Số ký hiệu</td>
			<td class="normal_label">{{$vanban->sokh}}</td>
		</tr>
		<tr class="round_row">
			<td class="normal_label">Trích yếu nội dung</td>
			<td class="normal_label">{{$vanban->trichyeunoidung}}</td>
		</tr>
		<tr class="odd_row">
			<td class="normal_label">Ngày ban hành</td>
			<td class="normal_label">{{$vanban->ngaybanhanh}}</td>
		</tr>
		<tr class="round_row">
			<td class="normal_label">Hình thức văn bản</td>
			<td class="normal_label">{{$vanban->hinhthucvanban}}</td>
		</tr>
		<tr class="odd_row">
			<td class="normal_label">Cơ quan ban hành</td>
			<td class="normal_label">{{$vanban->coquanbanhanh}}</td>
		</tr>
		<tr class="round_row">
			<td class="normal_label">Người ký duyệt</td>
			<td class="normal_label">{{$vanban->nguoikyduyet}}</td>
		</tr>
		<tr class="odd_row">
			<td class="normal_label">Tệp đính kèm</td>
			<td class="normal_label"><a onclick="window.location= '/{{$vanban->tailieu}}'; return false;" class="attach-file doc" href="/{{$vanban->tailieu}}">{{$vanban->tailieu}}</a><br></td>
		</tr>
	</tbody></table>
	<br>
	<h4 class="post-title">Văn bản khác</h4>
	<ul class="arrow-list">
		@foreach($vanbankhac as $vanban)
			<li>
				<a href="vanban/detail/{{ $vanban->id }}">{{ $vanban->trichyeunoidung }}</a>
			</li>
		@endforeach
	</ul>
	<h4 class="post-title">Bình Luận</h4>
	<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=863868720428280";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-comments" data-href="http://localhost/vanban/{{$vanban->trichyeunoidung}}" data-numposts="5" data-width="100%"></div>
	<br>
@endsection