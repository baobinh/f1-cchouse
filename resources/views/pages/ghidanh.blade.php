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
    @if (session()->has('status'))
    <p style="color:red">{{ session('status') }}</p>
    @endif

    @if (count($errors) > 0)
    <ul style="color:red">
      @foreach ($errors->all() as $err)
      <li>{{ $err }}</li>
      @endforeach
    </ul>
    @endif

    <h1>Ghi danh</h1>

    <h3>Thông tin của Phụ huynh</h3>
    <hr />
    <div class="form-group">
      <label>Họ và tên (phụ huynh):</label>
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
      <label>Họ và tên (trẻ):</label>
      <input class="form-control" type="text" name="htt" />
    </div>
    <div class="form-group">
      <label>Đăng ký môn học:</label>
      <input class="form-control" type="text" name="mh" />
    </div>

    <input type="submit" value="Đăng ký" />
  </form>
</div>

@stop