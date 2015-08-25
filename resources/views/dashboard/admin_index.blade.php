{{-- Created at 2015/06/21 06:05 htien Exp $ --}}
@extends('_layouts.admin.main_page')

@section('page_title', 'Vùng quản lý')

{{-- ======================================================= LOAD RESOURCES --}}

{{-- ========================================================= LOAD CONTENT --}}

@section('content')

<div class="container">

  <div class="panel admin-panel">
    <div class="panel-heading">Vùng quản lý</div>
    <div class="panel-body">
      <p>Danh mục các chức năng quản lý chính.</p>

      <div class="row">

        <div class="col-md-6">

          <div class="panel panel-primary">
            <div class="panel-heading">Thống Kê Dữ Liệu</div>
            <div class="panel-body">
              <br />
            </div>
          </div>

          <div class="panel panel-primary">
            <div class="panel-heading">Bài viết gần đây</div>
            <div class="panel-body">
              <br />
            </div>
          </div>

        </div>

        <div class="col-md-6">

          <div class="panel panel-primary">
            <div class="panel-heading">Lưu Lượng Truy Cập</div>
            <div class="panel-body">
              <br />
            </div>
          </div>

          <div class="panel panel-primary">
            <div class="panel-heading">Bài viết nhanh</div>
            <div class="panel-body">
              <a class="btn btn-success" href="{{ route('admin::@dmin-zone.posts.index') }}">Bài viết <span class="glyphicon glyphicon-menu-right"></span></a>
              <a class="btn btn-success" href="{{ route('admin::@dmin-zone.pics.index') }}">Bộ sưu tập hình ảnh <span class="glyphicon glyphicon-menu-right"></span></a>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>

</div>

@stop
