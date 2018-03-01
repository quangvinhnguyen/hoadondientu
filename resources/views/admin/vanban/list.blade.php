@extends('admin.layout.layout')
@section('content')     
<!-- Page Content -->

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 50px;">
                <h1 class="page-header">Văn Bản
                    <small>Danh Sách</small>
                </h1>
                @if(session('flash_success'))
                <div class="alert alert-success">
                    <strong>Thành Công! </strong>{{ session('flash_success') }}
                </div>
                @endif
                 @if(session('flash_err'))
                <div class="alert alert-danger">
                    <strong>Cảnh Báo! </strong>{{ session('flash_err') }}
                </div>
                @endif
                <table class="table table-striped table-bordered table-hover " id="example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>số ký hiệu </th>
                            <th>Trích yếu nội dung</th>
                            <th>Ngày ban hành </th>
                            <th>Hình thức văn bản</th>
                            <th>Cơ quan ban hành</th>
                            <th>Người ký duyệt</th>
                            <th>Tệp đính kèm </th>
                            <th> Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                   
                        @foreach($vanbans as $vanban)
                        <tr class="odd gradeX">
                            <td>{{ $vanban->id }}</td>
                            <td>
                                {{ $vanban->sokh }}
                            </td>
                            <td>{{ $vanban->trichyeunoidung }}</td>
                            <td class="text-center">{{ $vanban->ngaybanhanh }}</td>
                            <td>{{ $vanban->hinhthucvanban }}</td>
                            <td>{{ $vanban->coquanbanhanh }}</td>
                            <td>{{ $vanban->nguoikyduyet }}</td>
                            <td>
                                @if($vanban->tailieu)
                                TRUE
                                @else
                                FALSE
                                @endif
                            </td>
                            <td>
                                @if(Auth::user()->name == "admin")
                                <a href="admin/vanban/update/{{$vanban->id}}" class="btn btn-info btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa 
                                </a>
                                @endif
                                <button data-id="{{$vanban->id}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Xoá
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!-- Modal Delete-->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Xóa Bài Viết</h4>
        </div>
        <div class="modal-body">
            <form id="form-delete">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="del-id">
                <p>Bạn có chắc muốn xóa bài viết với id <strong id="del-id"></strong> này?</p>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="" class="btn btn-danger" id="delete">Xóa</a>
            </div>
            </form> 
        </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#modal-delete').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) 
          var iddel = button.data('id')
          var modal = $(this)
          modal.find('.modal-body #del-id').html(iddel);
          modal.find('.modal-body #delete').attr('href', 'admin/vanban/delete/'+iddel);
        })
    });   
 </script>
<script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="js/bootstrap-flash-alert.js"></script>
@endsection
