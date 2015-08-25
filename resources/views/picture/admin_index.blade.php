{{-- Created at 2015/06/21 06:04 htien Exp $ --}}
@extends('_layouts.admin.main_page')

<style>
  .clearfix {clear: both;}
  .album {min-height: 500px; margin: 10px 0px 10px 10px;}
  .album .album_element {width: 250px; float: left; margin-bottom: 10px; 
                          margin-right: 10px; border: 1px solid #ccc; background-color: #ccc;}
  .album .album_element:hover {background-color: #9EFFFF;}
  .album .album_element .album_image {}
  .album .album_element .album_image a {display: block;}
  .album .album_element .album_image img {height: 250px;}
  .album .album_element .album_info {padding: 10px;}
  .album .album_element .album_info a {font-weight: bold; display: block;}
  .album .album_element .album_info a:hover {text-decoration: underline}
  .err {color: red; margin-bottom: 10px;}
</style>

@section('page_title', 'Quản lý bộ sưu tập hình ảnh')

{{-- ======================================================= LOAD RESOURCES --}}

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
  <li class="active">Bộ sưu tập ảnh</li>
</ol>

<div class="ivy-page-wrapper">

  <div class="panel panel-primary posts-list">
    <div class="panel-heading">
      <h2 class="title">
        <img src="assets/img/album_icon.png" />
        <span class="literal">Bộ sưu tập ảnh</span>
        <a class="btn btn-danger btn-sm" href="{{ route('admin::@dmin-zone.pics.create') }}">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tạo album
        </a>
      </h2>
      <div class="list-post-status">
        <a href="javascript:void(0)">Tổng số album</a>
      </div>
    </div>
    <div>
      <div class="err">
        <?php if ($aError != "") echo $aError["emptyPicCate"]; ?>
      </div>
      <div class="album">
        <?php if (isset($datas)) { ?>
          <?php foreach ($datas as $value) { ?>
            <div class="album_element">
              <div class="album_image"><a href="{{ route('admin::@dmin-zone.pics.edit', $value['pic_cate_id']) }}">
                <img src="uploads/album/<?php echo $value["pic_file_name"] == "" ? "image-album-icon.png" : 
                                                    $value["pic_file_name"]->file_name ; ?>" width="250" height="250" /></a></div>
              <div class="album_info">
                <a href="{{ route('admin::@dmin-zone.pics.edit', $value['pic_cate_id']) }}"><span><?php echo $value["pic_cate_name"] ?></span></a><br />
                <span><?php echo $value["total_pic_by_cate"]; ?> hình</span>
              </div>
            </div>
          <?php } ?>
        <?php } ?>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

</div>

@stop
