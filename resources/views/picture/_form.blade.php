{{-- Created at 2015/06/22 05:26 htien Exp $ --}}

<div class="row">
  <div class="col-md-8">

    <div class="form-group">
      {!! Form::label('post_title', 'Tiêu đề bài viết', ['class' => 'control-label']) !!}
      {!! Form::text('post_title', null, ['id' => 'post_title', 'class' => 'form-control', 'placeholder' => 'Nhập tiêu đề', 'required' => 'true']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('post_excerpt', 'Nội dung Tóm tắt', ['class' => 'control-label']) !!}
      {!! Form::textarea('post_excerpt', null, ['id' => 'post_excerpt', 'class' => 'form-control', 'placeholder' => 'Nhập tóm tắt', 'required' => 'true']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('post_content', 'NỘI DUNG BÀI VIẾT', ['class' => 'control-label']) !!}
      {!! Form::textarea('post_content', null, ['id' => 'post_content', 'class' => 'form-control froala', 'placeholder' => 'Nhập nội dung', 'required' => 'true']) !!}
    </div>

  </div>
  <div class="col-md-4">

    <div class="form-group">
      {!! Form::label('post_avatar', 'Ảnh đại diện', ['class' => 'control-label']) !!}
      <a class="btn btn-danger btn-xs pull-right" href="javascript:void(0)" onclick="_func.postResetInput('[name=file]')">Xóa</a>
      {!! Form::hidden('post_avatar') !!}
      {!! Form::file('file', ['class' => 'form-control', 'onchange' => '_func.postImgAvatar(this)']) !!}
      <div class="post-avatar">
        <img src="assets/img/blank.gif" alt="" />
      </div>
    </div>

    <div class="form-group">
      <label for="post_categories">Chuyên mục</label>
      <div>
        @if (Route::currentRouteNamed('admin::@dmin-zone.posts.edit'))

        <select id="post_categories" class="form-control" name="post_category" required="required" size="20">
          @foreach ($categories as $c)
          @if ($category->id == $c->value)
            <option selected="selected" value="{{ $c->value }}">{{ $c->name }}</option>
          @else
            <option value="{{ $c->value }}">{{ $c->name }}</option>
          @endif
          @endforeach
        </select>

        @else

        <select id="post_categories" class="form-control" name="post_category" required="required" size="20">
          @foreach ($categories as $c)
          <option value="{{ $c->value }}">{{ $c->name }}</option>
          @endforeach
        </select>

        @endif
      </div>
    </div>

  </div>
</div>

{{--<div class="form-group">--}}
  {{--{!! Form::label('post_content', 'NỘI DUNG BÀI VIẾT', [ 'class' => 'control-label' ]) !!}--}}
  {{--<textarea id="post_content" class="form-control froala" placeholder="Nhập nội dung" required="true" name="post_content" rows="25">--}}
    {{--@if (Route::currentRouteNamed('admin::@dmin-zone.posts.edit')) {{ ($post->post_content) }} @endif--}}
  {{--</textarea>--}}
{{--</div>--}}

<div class="form-group" style="margin-top:40px">
  <div class="btn-group">
    @if (Route::currentRouteNamed('admin::@dmin-zone.posts.edit'))
    <a class="btn btn-primary" href="{{ route('admin::@dmin-zone.posts.show', $post->id) }}">
      <span class="glyphicon glyphicon-menu-left"></span>
    </a>
    @endif

    @if (in_array(Route::currentRouteName(), ['admin::@dmin-zone.posts.create', 'admin::@dmin-zone.posts.edit']))
    {!! Form::submit($button_name, ['class' => 'btn btn-success', 'onclick' => '_func.cfmOnX.deactive()']) !!}
    @endif
  </div>

  @if (Route::currentRouteNamed('admin::@dmin-zone.posts.edit'))
  <a class="btn btn-danger pull-right" href="javascript:void(0)" onclick="_func.cfmOnDeletePost('{{ $post->id }}', '{{ $post->post_title }}', '{{ csrf_token() }}')">
    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa
  </a>
  @endif

</div>
