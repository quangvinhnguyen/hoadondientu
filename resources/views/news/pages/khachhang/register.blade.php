@extends('news.layout.single')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center">
               Đăng ký 
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
            <form action="/khachhang/register" method="POST" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <label><span>*</span>Mã số thuế</label>
                    <input type="text" name="mast" id="mast" class="form-control" value="{{ old('mast')}}" placeholder="Nhập mã số thuế ">
                </div>
                <div class="form-group">
                    <label><span>*</span>Tên đơn vị </label>
                    <input type="text" name="tendv" id="tendv" class="form-control" value="{{ old('tendv')}}" placeholder="Nhập tên đơn vị ">
                </div>
                <div class="form-group">
                    <label><span>*</span>Địa chỉ đăng ký kinh doanh </label>
                         <input type='text' class="form-control" id="datepicker" name="dcdkkd" value="{{ old('dcdkkd') }}"placeholder="Nhập địa chỉ đăng ký kinh doanh "/>
                </div>
                <div class="form-group">
                    <label><span>*</span>Người liên hệ</label>
                    <input type="text" name="nguoilienhe" id="nguoilienhe" class="form-control" value="{{ old('nguoilienhe')}}">
                </div>
                <div class="form-group">
                    <label><span>*</span>Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email')}}">
                </div>
                <div class="form-group">
                    <label><span>*</span>Điện thoại di động</label>
                    <input type="text" name="dtdd" id="dtdd" class="form-control" value="{{ old('dtdd')}}">
                </div>
                <div class="form-group">
                    <label>Điện thoại bàn</label>
                    <input type="text" name="dtb" id="dtb" class="form-control" value="{{ old('dtb')}}">
                </div> 
                <div class="form-group">
                    <label>Tài liệu đính kèm (file logo hoặc file hóa đơn mẫu của đơn vị )</label>
                    <input type="file" name="tailieu" class="form-control" placeholder="">
                </div>   
            <div class="text-center">           
                <button type="reset" class="btn" id="follow-button">Làm Mới</button>
                <button type="submit" class="btn">Đăng ký</button>
            </div>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection