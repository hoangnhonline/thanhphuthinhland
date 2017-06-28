@extends('layout.backend')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Danh mục cha     
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('loai-sp.index') }}">Danh mục cha</a></li>
      <li class="active"><span class="glyphicon glyphicon-pencil"></span></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="{{ route('loai-sp.index') }}" style="margin-bottom:5px">Quay lại</a>
    <a class="btn btn-primary btn-sm" href="{{ route('danh-muc', $detail->slug ) }}" target="_blank" style="margin-top:-6px"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
    <div class="row">
      <!-- left column -->

      <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            Chỉnh sửa
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="POST" action="{{ route('loai-sp.update') }}">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value="{{ $detail->id }}">
            <div class="box-body">
              @if(Session::has('message'))
              <p class="alert alert-info" >{{ Session::get('message') }}</p>
              @endif
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              
               <!-- text input -->
              <div class="form-group">
                <label>Tên danh mục <span class="red-star">*</span></label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $detail->name }}">
              </div>
              <div class="form-group">
                <label>Slug <span class="red-star">*</span></label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{ $detail->slug }}">
              </div>
              <div class="clearfix"></div>
                <div class="form-group" style="margin-top:15px;padding-bottom:25px !important;">
                  <div class="checkbox col-md-3" >
                    <label>
                      <input type="checkbox" name="is_hot" value="1" {{ $detail->is_hot == 1 ? "checked" : "" }}>
                      Danh mục nổi bật
                    </label>
                  </div>
                  <div class="checkbox col-md-3" >
                    <label>
                      <input type="checkbox" name="menu_ngang" value="1" {{ $detail->menu_ngang == 1 ? "checked" : "" }}>
                      Menu ngang 
                    </label>
                  </div>
                  <div class="checkbox col-md-3" >
                    <label>
                      <input type="checkbox" name="menu_doc" value="1" {{ $detail->menu_doc == 1 ? "checked" : "" }}>
                      Menu dọc
                    </label>
                  </div>
                  <div class="checkbox col-md-3" >
                    <label>
                      <input type="checkbox" name="is_hover" value="1" {{ $detail->is_hover == 1 ? "checked" : "" }}>
                      Hover hiện thông tin
                    </label>
                  </div>
                </div>
                <div class="clearfix"></div>
              <!-- textarea -->
              <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="4" name="description" id="description">{{ $detail->description }}</textarea>
              </div>     
              

              <div class="form-group">
                <label>Ẩn/hiện</label>
                <select class="form-control" name="status" id="status">                  
                  <option value="0" {{ $detail->status == 0 ? "selected" : "" }}>Ẩn</option>
                  <option value="1" {{ $detail->status == 1 ? "selected" : "" }}>Hiện</option>
                </select>
              </div>
              <div class="form-group">
                <label>Style banner</label>
                <select class="form-control" name="home_style" id="home_style">                  
                  <option value="0" {{ $detail->home_style == 0 ? "selected" : "" }}>Không banner</option>
                  <option value="1" {{ $detail->home_style == 1 ? "selected" : "" }}>Banner đứng lớn</option>
                  <option value="2" {{ $detail->home_style == 2 ? "selected" : "" }}>Banner đứng nhỏ</option>
                  <option value="3" {{ $detail->home_style == 3 ? "selected" : "" }}>Banner ngang</option>
                </select>
              </div>   
              <div class="form-group" style="margin-top:10px">  
                <label class="col-md-3 row">Icon màu</label>    
                <div class="col-md-9">
                  <img id="thumbnail_mau" src="{{ $detail->icon_mau ? Helper::showImage($detail->icon_mau) : 'http://placehold.it/60x60' }}" class="img-thumbnail" width="60" height="60">
                  
                  <input type="file" id="file-mau" style="display:none" />
               
                  <button class="btn btn-default btn-sm" id="btnUploadMau" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                </div>
              </div> 
              <div class="form-group" style="margin-top:10px">  
                <label class="col-md-3 row">Icon khuyến mãi</label>    
                <div class="col-md-9">
                  <img id="thumbnail_km" src="{{ $detail->icon_km ? Helper::showImage($detail->icon_km) : 'http://placehold.it/60x60' }}" class="img-thumbnail" width="60" height="60">
                  
                  <input type="file" id="file-km" style="display:none" />
               
                  <button class="btn btn-default btn-sm" id="btnUploadKm" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                </div>
              </div> 
              <div class="form-group" style="margin-top:10px">  
                <label class="col-md-3 row">Icon trắng </label>    
                <div class="col-md-9">
                  <img id="thumbnail_icon" src="{{ $detail->icon_url ? Helper::showImage($detail->icon_url) : 'http://placehold.it/60x60' }}" class="img-thumbnail" width="60" height="60">
                  
                  <input type="file" id="file-icon" style="display:none" />
               
                  <button class="btn btn-default btn-sm" id="btnUploadIcon" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                </div>
              </div> 
                
              <div class="form-group" style="margin-top:10px">  
                <label class="col-md-3 row">Banner menu</label>    
                <div class="col-md-9">
                  <img id="thumbnail_banner" src="{{ $detail->banner_menu ? Helper::showImage($detail->banner_menu) : 'http://placehold.it/60x60' }}" class="img-thumbnail" width="120" height="120">
                  
                  <input type="file" id="file-banner" style="display:none" />
               
                  <button class="btn btn-default btn-sm" id="btnUploadBanner" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                </div>
              </div>              
              <div class="form-group">
                <label>Màu nền</label>
                <input type="text" class="form-control" name="bg_color" id="bg_color" value="{{ $detail->bg_color }}">
              </div>
              <div class="form-group">
                  <label>Phí dịch vụ</label>
                  <input type="text" class="form-control" name="phi_dich_vu" id="phi_dich_vu" value="{{ $detail->phi_dich_vu }}">
                </div>
            </div>         
            <!-- /.box-body -->           
            <input type="hidden" name="icon_url" id="icon_url" value="{{ $detail->icon_url }}"/>          
            <input type="hidden" name="icon_mau" id="icon_mau" value="{{ $detail->icon_mau }}"/>
            <input type="hidden" name="icon_name" id="icon_name" value="{{ old('icon_name') }}"/>             
            <input type="hidden" name="image_name_mau" id="image_name_mau" value="{{ old('image_name_mau') }}"/>
            
            <input type="hidden" name="icon_km" id="icon_km" value="{{ $detail->icon_km }}"/>             
            <input type="hidden" name="image_name_km" id="image_name_km" value="{{ old('image_name_km') }}"/>

            <input type="hidden" name="banner_menu" id="banner_menu" value="{{ $detail->banner_menu }}"/>       
            <input type="hidden" name="banner_name" id="banner_name" value="{{ old('banner_name') }}"/>  
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
              <a class="btn btn-default btn-sm" class="btn btn-primary btn-sm" href="{{ route('loai-sp.index')}}">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-5">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thông tin SEO</h3>
          </div>
          <!-- /.box-header -->     
            <!-- /.box-header -->
            <div class="box-body">
              <input type="hidden" name="meta_id" value="{{ $detail->meta_id }}">
              <div class="form-group">
                <label>Meta title </label>
                <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ !empty((array)$meta) ? $meta->title : "" }}">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Meta desciption</label>
                <textarea class="form-control" rows="6" name="meta_description" id="meta_description">{{ !empty((array)$meta) ? $meta->description : "" }}</textarea>
              </div>  

              <div class="form-group">
                <label>Meta keywords</label>
                <textarea class="form-control" rows="4" name="meta_keywords" id="meta_keywords">{{ !empty((array)$meta) ? $meta->keywords : "" }}</textarea>
              </div>  
              <div class="form-group">
                <label>Custom text</label>
                <textarea class="form-control" rows="6" name="custom_text" id="custom_text">{{ !empty((array)$meta) ? $meta->custom_text : ""  }}</textarea>
              </div>
            
          </div>
        <!-- /.box -->     

      </div>
      <!--/.col (left) -->      
    </div>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<input type="hidden" id="route_upload_tmp_image" value="{{ route('image.tmp-upload') }}">
@stop
@section('javascript_page')
<script type="text/javascript">
    $(document).ready(function(){
      $('#btnUploadMau').click(function(){        
        $('#file-mau').click();
      });
      $('#btnUploadKm').click(function(){        
        $('#file-km').click();
      });
      $('#btnUploadIcon').click(function(){        
        $('#file-icon').click();
      });
      $('#btnUploadBanner').click(function(){        
        $('#file-banner').click();
      });
      var filesKm = '';
      $('#file-km').change(function(e){
         filesKm = e.target.files;
         
         if(filesKm != ''){
           var dataForm = new FormData();        
          $.each(filesKm, function(key, value) {
             dataForm.append('file', value);
          });
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_km').attr('src',$('#upload_url').val() + response.image_path);
                $('#icon_km').val( response.image_path );
                $('#image_name_km' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
            },
            error: function(response){                             
                var errors = response.responseJSON;
                for (var key in errors) {
                  
                }
                //$('#btnLoading').hide();
                //$('#btnSave').show();
            }
          });
        }
      });

      var files = "";
      $('#file-mau').change(function(e){
         files = e.target.files;
         
         if(files != ''){
           var dataForm = new FormData();        
          $.each(files, function(key, value) {
             dataForm.append('file', value);
          });   
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_mau').attr('src',$('#upload_url').val() + response.image_path);
                $( '#icon_mau' ).val( response.image_path );
                $( '#image_name_mau' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
            },
            error: function(response){                             
                var errors = response.responseJSON;
                for (var key in errors) {
                  
                }
                //$('#btnLoading').hide();
                //$('#btnSave').show();
            }
          });
        }
      });
      var filesIcon = '';
      $('#file-icon').change(function(e){
         filesIcon = e.target.files;
         
         if(filesIcon != ''){
           var dataForm = new FormData();        
          $.each(filesIcon, function(key, value) {
             dataForm.append('file', value);
          });
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_icon').attr('src',$('#upload_url').val() + response.image_path);
                $('#icon_url').val( response.image_path );
                $( '#icon_name' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
            },
            error: function(response){                             
                var errors = response.responseJSON;
                for (var key in errors) {
                  
                }
                //$('#btnLoading').hide();
                //$('#btnSave').show();
            }
          });
        }
      });
      var filesBanner = '';
      $('#file-banner').change(function(e){
         filesBanner = e.target.files;
         
         if(filesBanner != ''){
           var dataForm = new FormData();        
          $.each(filesBanner, function(key, value) {
             dataForm.append('file', value);
          });
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_banner').attr('src',$('#upload_url').val() + response.image_path);
                $('#banner_menu').val( response.image_path );
                $( '#banner_name' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
            },
            error: function(response){                             
                var errors = response.responseJSON;
                for (var key in errors) {
                  
                }
                //$('#btnLoading').hide();
                //$('#btnSave').show();
            }
          });
        }
      });

    });
    
</script>
@stop
