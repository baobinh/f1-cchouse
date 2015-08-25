{{-- Created at 2015/06/21 09:28 htien Exp $ --}}
@extends('_layouts.admin.main_page')

@section('page_title', 'Sửa album')

{{-- ======================================================= LOAD RESOURCES --}}

@section('page_css')

<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
<link rel="stylesheet" href="assets/libs/froala-editor/1.2.7/css/froala_editor.min.css" />
<link rel="stylesheet" href="assets/libs/froala-editor/1.2.7/css/froala_style.min.css" />
@parent
<style>
  .clearfix {clear: both;}
  .pic_create_left {width: 30%; float: left; padding: 10px;}
  .pic_create_right {width: 70%; float: left; padding: 10px;}
  .input {height: 30px; border: 1px solid #bdc7d8;}
  .input input {width: 100%; height: 100%; border: 0px; font-size: 14px; line-height: 14px; padding: 2px; font-weight: bold;}
  .button_panel {margin-top: 10px;}
  .btn_normal {background-color: #ccc;}
  .clearfix {clear: both;}
  
  .album {min-height: 500px; margin: 10px 0px 10px 10px; padding: 10px; border: 1px dotted #ccc;}
  .album .album_element {width: 250px; float: left; margin-bottom: 10px; 
                          margin-right: 10px; border: 1px solid #ccc; background-color: #ccc;}
  .album .album_element:hover {background-color: #9EFFFF;}
  .album .album_element .album_image {}
  .album .album_element .album_image a {display: block;}
  .album .album_element .album_image img {height: 250px;}
  
  .err {color: red; margin-bottom: 10px;}
</style>
@stop

@section('page_js_load')

<script src="assets/libs/froala-editor/1.2.7/js/froala_editor.min.js"></script>
<!--[if lt IE 9]><script src="assets/libs/froala-editor/1.2.7/js/froala_editor_ie8.min.js"></script><![endif]-->
<script src="assets/libs/froala-editor/1.2.7/js/plugins/char_counter.min.js"></script>
<script src="assets/libs/froala-editor/1.2.7/js/plugins/fullscreen.min.js"></script>
<script src="assets/libs/froala-editor/1.2.7/js/plugins/tables.min.js"></script>
@parent
<script src="app-admin/postedit.js"></script>

@stop

{{-- ========================================================= LOAD CONTENT --}}

@section('content')

<?php
$aError = "";
if (isset($errors)) {
  if (is_array($errors)) {
    $aError = $errors;
  }
}
?>
<ol class="breadcrumb">
  <li><a href="{{ route('admin::index') }}">Vùng quản lý</a></li>
  <li><a href="{{ route('admin::@dmin-zone.pics.index') }}">Album ảnh</a></li>
  <li class="active">Tạo album mới</li>
</ol>

<div class="container">

  <div class="panel panel-primary">
    <div class="panel-heading">Album ảnh &raquo; Tạo album</div>
    <div class="panel-body">
      <form action="{{ route('admin::@dmin-zone.pics.update', $datas['pic_cate_id']) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input type="hidden" name="h_pic_cate_id" value="<?php echo $datas["pic_cate_id"]?>" />
        <div class="pic_create_left">
          <div class="err">
            <?php if ($aError != "") echo $aError["empty"]; ?>
          </div>
          <div class="input">
            <input value="<?php echo $datas["pic_cate_name"]; ?>" name="txt_name" />
          </div>
          <div class="input">
            <input value="<?php echo $datas["pic_cate_desc"]; ?>" name="txt_des" />
          </div>
          <div class="button_panel">
            <input class="btn btn-primary" type="submit" value="Cập nhật" />
            <a class="btn btn-danger" href="{{ route('admin::@dmin-zone.pics.destroy', $datas['pic_cate_id']) }}">Xóa</a>
          </div>
        </div>
        <div class="pic_create_right">
          <div class="button_panel">
            <input type="file" name="files[]" multiple />
          </div>
          <div class="album">
            <?php if (isset($datas["file_names"])) { ?>
              <?php foreach ($datas["file_names"] as $value) { ?>
                <div class="album_element">
                  <div class="album_image">
                    <img src="uploads/album/<?php echo $value ?>" width="250" height="250" />
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>

</div>

@stop
