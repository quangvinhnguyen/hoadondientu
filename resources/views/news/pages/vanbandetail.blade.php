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
			<td class="normal_label"><a onclick="window.location= '/main/download/getdoc/?id=054E9CE3-71FF-44EF-8B5B-6920FFB5BC5B'; return false;" class="attach-file doc" href="/main/download/getdoc/?id=054E9CE3-71FF-44EF-8B5B-6920FFB5BC5B">TT-10.2014.TTBTC.doc</a><br></td>
		</tr>
	</tbody></table>
@endsection