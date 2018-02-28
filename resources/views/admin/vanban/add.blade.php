@extends('admin.layout.layout')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Văn bản
                    <small>Thêm </small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:70px">
             @if(count($errors)>0)
             <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{ $err }}<br>
                @endforeach
            </div>
            @endif
            @if(session('errfile'))
                <div class="alert alert-danger">
                    <strong>{{session('errfile')}}</strong>
                </div>
            @endif
           
            <form action="admin/vanban/add" method="POST" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <label>Số ký hiệu</label>
                    <input type="text" name="sokh" id="sokh" class="form-control" value="{{ old('sokh')}}" placeholder="Nhập số ký hiệu ">
                </div>
                <div class="form-group">
                    <label>Trích yếu nội dung</label>
                    <input type="text" name="trichyeunoidung" id="trichyeunoidung" class="form-control" value="{{ old('trichyeunoidung')}}">
                </div>
                <div class="form-group">
                    <label>Ngày ban hành</label>
                         <input type='text' class="form-control" id="datepicker" name="ngaybanhanh" value="{{ old('ngaybanhanh') }}"/>
                </div>
                <div class="form-group">
                    <label>Hình thức văn bản</label>
                    <input type="text" name="hinhthucvanban" id="hinhthucvanban" class="form-control" value="{{ old('hinhthucvanban')}}">
                </div>

                <div class="form-group">
                    <label>Cơ quan ban hành</label>
                    <input type="text" name="coquanbanhanh" id="coquanbanhanh" class="form-control" value="{{ old('coquanbanhanh')}}">
                </div>
                <div class="form-group">
                    <label>Người ký duyệt</label>
                    <input type="text" name="nguoikyduyet" id="nguoikyduyet" class="form-control" value="{{ old('nguoikyduyet')}}">
                </div>
                <div class="form-group">
                    <label>Tài liệu đính kèm</label>
                    <input type="file" name="tailieu" class="form-control" placeholder="">
                </div>
                <button type="reset" class="btn btn-default">Làm Mới</button>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
@section('script')
<script src="js/slug.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
            $(document).ready(
                    function () {
                        $("#datepicker").datepicker({
                            dateFormat: 'dd-mm-yy',
                            changeMonth: true, //Tùy chọn này cho phép người dùng chọn tháng
                            changeYear: true //Tùy chọn này cho phép người dùng lựa chọn từ phạm vi năm
                        });
                    }
            );
        </script>
<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<script src="js/select2.min.js"></script>
<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
@endsection