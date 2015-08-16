{{-- Created at 2015/08/10 16:44 htien Exp $ --}}
@extends('_layouts.home.main_page')

@section('page_title', 'Ghi danh')
@section('page_body_attributes')
id="ghidanh-page"
@stop

{{-- ======================================================= LOAD RESOURCES --}}

@section('page_css')
@parent

<style>

</style>

@stop

{{-- ========================================================= LOAD CONTENT --}}

@section('content')

<div class="container-fluid">
  <form action="{{ route('ghidanh') }}" method="post">
    <h1>Ghi danh</h1>

    <h3>Thông tin của Phụ huynh</h3>
    <hr />
    <div class="form-group">
      <label>Họ và tên:</label>
      <input class="form-control" type="text" name="ht" />
    </div>
    <div class="form-group">
      <label>Địa chỉ:</label>
      <input class="form-control" type="text" name="dc" />
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </div>
    <div class="form-group">
      <label>Số ĐT:</label>
      <input class="form-control" type="text" name="sdt" />
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input class="form-control" type="text" name="email" />
    </div>

    <h3>Thông tin của trẻ</h3>
    <hr />
    <div class="form-group">
      <label>Họ và tên:</label>
      <input class="form-control" type="text" name="htt" />
    </div>

    <input type="submit" value="Đăng ký" />
  </form>
</div>

@stop