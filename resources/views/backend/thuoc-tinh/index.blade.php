@extends('layout.backend')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thuộc tính 
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route( 'thuoc-tinh.index' ) }}">Thuộc tính</a></li>
    <li class="active">Danh sách</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      @if(Session::has('message'))
      <p class="alert alert-info" >{{ Session::get('message') }}</p>
      @endif
      <a href="{{ route('thuoc-tinh.create') }}?loai_id={{ $loai_id }}&loai_thuoc_tinh_id={{ $loai_thuoc_tinh_id }}" class="btn btn-info btn-sm" style="margin-bottom:5px">Tạo mới</a>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Bộ lọc</h3>
        </div>
        <div class="panel-body">
          <form class="form-inline" role="form" method="GET" action="{{ route('thuoc-tinh.index') }}" id="searchForm">
            <div class="form-group">
              <label for="email">Danh mục</label>
              <select class="form-control" name="loai_id" id="loai_id">
                <option value="0">--Tất cả--</option>
                @foreach( $loaiSp as $k => $v )
                <option value="{{ $k }}" {{ $k == $loai_id ? "selected" : "" }}>{{ $v }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="email">Loại thuộc tính</label>
              <select class="form-control" name="loai_thuoc_tinh_id" id='loai_thuoc_tinh_id'>
                <option value="0">--Tất cả--</option>
                @foreach( $loaiThuocTinh as $k => $v )
                <option value="{{ $k }}" {{ $k == $loai_thuoc_tinh_id ? "selected" : "" }}>{{ $v }}</option>
                @endforeach
              </select>
            </div>             
            <button type="submit" class="btn btn-default btn-sm">Lọc</button>
          </form>         
        </div>
      </div>
      <div class="box">

        <div class="box-header with-border">
          <h3 class="box-title">Danh sách</h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered" id="table-list-data">            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 1%;white-space:nowrap">Thứ tự</th>
              <th>Tên</th>            
              <th style="text-align:center">Danh mục</th>         
              <th width="1%" style="white-space:nowrap">Thao tác</th>
            </tr>
            <tbody>
            @if( $items->count() > 0 )
              <?php $i = 0; ?>
              @foreach( $items as $item )
                <?php $i ++; ?>
              <tr id="row-{{ $item->id }}">
                <td><span class="order">{{ $i }}</span></td>
                <td style="vertical-align:middle;text-align:center">
                  <img src="{{ URL::asset('backend/dist/img/move.png')}}" class="move img-thumbnail" alt="Cập nhật thứ tự"/>
                </td>
                <td>                  
                  <a href="{{ route( 'thuoc-tinh.edit', [ 'id' => $item->id ]) }}">{{ $item->id }}-{{ $item->name }}</a>
                </td>
                
                <td style="text-align:center">
                  {{ $loaiSp[$item->loai_id] }}
                </td>                               
                <td style="white-space:nowrap">                  
                  <a href="{{ route( 'thuoc-tinh.edit', [ 'id' => $item->id ]) }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>                                   
                  <a onclick="return callDelete('{{ $item->name }}','{{ route( 'thuoc-tinh.destroy', [ 'id' => $item->id ]) }}');" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                  
                </td>
              </tr> 
              @endforeach
            @else
            <tr>
              <td colspan="5">Không có dữ liệu.</td>
            </tr>
            @endif

          </tbody>
          </table>
        </div>        
      </div>
      <!-- /.box -->     
    </div>
    <!-- /.col -->  
  </div> 
</section>
<!-- /.content -->
</div>
<input type="hidden" id="route-ajax-get-thuoc-tinh-by-id" value="{{ route('loai-thuoc-tinh.ajax-get-loai-thuoc-tinh-by-id') }}">
@stop
@section('javascript_page')
<script type="text/javascript">
function callDelete(name, url){  
  swal({
    title: 'Bạn muốn xóa "' + name +'"?',
    text: "Dữ liệu sẽ không thể phục hồi.",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes'
  }).then(function() {
    location.href= url;
  })
  return flag;
}
$(document).ready(function(){
  $('#loai_id, #loai_thuoc_tinh_id').change(function(){
    $('#searchForm').submit();
  });
  $('#loai_id').change(function(){
    $.ajax({
      url : $('#route-ajax-get-thuoc-tinh-by-id').val(),
      data : {
        loai_id : $(this).val()
      },
      type: "GET",
      success : function(data){
        $('#loai_thuoc_tinh_id').html(data);
      }
    })
  });
  $('#table-list-data tbody').sortable({
        placeholder: 'placeholder',
        handle: ".move",
        start: function (event, ui) {
                ui.item.toggleClass("highlight");
        },
        stop: function (event, ui) {
                ui.item.toggleClass("highlight");
        },          
        axis: "y",
        update: function() {
            var rows = $('#table-list-data tbody tr');
            var strOrder = '';
            var strTemp = '';
            for (var i=0; i<rows.length; i++) {
                strTemp = rows[i].id;
                strOrder += strTemp.replace('row-','') + ";";
            }     
            updateOrder("loai_thuoc-tinh", strOrder);
        }
    });
});
function updateOrder(table, strOrder){
  $.ajax({
      url: $('#route_update_order').val(),
      type: "POST",
      async: false,
      data: {          
          str_order : strOrder,
          table : table
      },
      success: function(data){
          var countRow = $('#table-list-data tbody tr span.order').length;
          for(var i = 0 ; i < countRow ; i ++ ){
              $('span.order').eq(i).html(i+1);
          }                        
      }
  });
}
</script>
@stop