@extends('news.layout.single')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center">
               LIÊN HỆ
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12"id="formdangky">
             @if(count($errors)>0)
             <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{ $err }}<br>
                @endforeach
            </div>
            @endif
            <form action="/lienhe/send" method="POST" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}" />
               
                <div class="form-group">
                    <label><span>*</span>Tên người liên hệ </label>
                    <input type="text" name="tenlh" id="tenlh" class="form-control" value="{{ old('tenlh')}}" placeholder="Nhập họ và tên người liên hệ ">
                </div>
                
                
                <div class="form-group">
                    <label><span>*</span>Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email')}}">
                </div>
                <div class="form-group">
                    <label><span>*</span>Số điện thoại</label>
                    <input type="text" name="sdt" id="sdt" class="form-control" value="{{ old('sdt')}}">
                </div>
				<div class="form-group">
                    <label><span>*</span>Nội dung </label>
                    <input type="textarea" name="comment" id="comment" class="form-control" value="{{ old('comment')}}" style="height: 100px;
    width: 100%;">
                </div>
               
            <div class="text-center">          
                <button type="submit" class="btn">Gửi</button>
            </div>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection
@section('js')
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/gmap3.min.js"></script>
@endsection