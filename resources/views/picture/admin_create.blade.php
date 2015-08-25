{{-- Created at 2015/06/21 09:26 htien Exp $ --}}
@extends('_layouts.admin.main_page')

@section('page_title', 'Tạo album mới')

{{-- ======================================================= LOAD RESOURCES --}}

@section('page_css')

<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
<link rel="stylesheet" href="assets/libs/froala-editor/1.2.7/css/froala_editor.min.css" />
<link rel="stylesheet" href="assets/libs/froala-editor/1.2.7/css/froala_style.min.css" />
<style>
  .clearfix {clear: both;}
  .pic_create_left {width: 30%; float: left; padding: 10px;}
  .pic_create_right {width: 70%; float: left; padding: 10px;}
  .input {height: 30px; border: 1px solid #bdc7d8;}
  .input input {width: 100%; height: 100%; border: 0px; font-size: 14px; line-height: 14px; padding: 2px; font-weight: bold;}
  .button_panel {margin-top: 10px;}
  .btn_normal {background-color: #ccc;}
  .err {color: red; margin-bottom: 10px;}
</style>
@parent

@stop

@section('page_js_load')

<script src="assets/libs/froala-editor/1.2.7/js/froala_editor.min.js"></script>
<!--[if lt IE 9]><script src="assets/libs/froala-editor/1.2.7/js/froala_editor_ie8.min.js"></script><![endif]-->
<script src="assets/libs/froala-editor/1.2.7/js/plugins/char_counter.min.js"></script>
<script src="assets/libs/froala-editor/1.2.7/js/plugins/fullscreen.min.js"></script>
<script src="assets/libs/froala-editor/1.2.7/js/plugins/tables.min.js"></script>
@parent
<script src="app-admin/postcreate.js"></script>

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
      <form action="{{ route('admin::@dmin-zone.pics.upload') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="pic_create_left">
          <div class="err">
            <?php if ($aError != "") echo $aError["empty"]; ?>
          </div>
          <div class="input">
            <input placeholder="Album chưa đặt tên" name="txt_name" />
          </div>
          <div class="input">
            <input placeholder="Nói vài điều về Album này" name="txt_des" />
          </div>
          <div class="button_panel">
            <input class="btn btn-primary" type="submit" value="Đăng" />
          </div>
        </div>
        <div class="pic_create_right">
          <div class="button_panel">
            <input type="file" name="files[]" multiple />
          </div>
        </div>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>

</div>

@stop
