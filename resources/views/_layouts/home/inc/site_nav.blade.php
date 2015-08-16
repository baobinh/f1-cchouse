{{-- Created at 2015/05/27 05:08 htien Exp $ --}}

<?php
  $navItems = [
    ['title' => 'Tin Tức - Hoạt Động', 'name' => 'hoat-dong'],
    ['title' => 'Phòng Ban', 'name' => 'phong'],
    ['title' => 'Hoạt Động Thanh Thiếu Nhi', 'name' => 'hoat-dong-ttn'],
    ['title' => 'Góc Măng Non', 'name' => 'goc-mang-non']
  ];
?>

<nav id="navbar" class="ivy-site-nav ivy-site-navbar navbar">
  <div class="ivy-page-wrapper">

    <div id="navbar-menu-wrapper">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand{!! Route::is('home') ? ' active' : '' !!}" href="{{ route('home') }}">
          <i class="fa fa-university"></i>
        </a>
      </div>

      <div id="bs-navbar-collapse-1" class="collapse navbar-collapse">
        @if (count($navItems) > 0)
        <ul class="nav navbar-nav">
          @foreach ($navItems as $i)
          <li{!! Request::is("tin/$i[name]") || Request::is("tin/$i[name]/*") ? ' class="active"' : '' !!}><a href="{{ route('article.index', "$i[name]") }}">{{ $i['title'] }}</a></li>
          @endforeach
          <li><a href="{{ route('ghidanh') }}">Ghi danh</a></li>
        </ul>
        @endif

        <ul class="nav navbar-nav navbar-right">
          <li{!! Request::is('lien-he') ? ' class="active"' : '' !!}>
            <a href="{{ route('page', 'lien-he') }}"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Liên Hệ</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ route('page', 'gioi-thieu') }}">Giới Thiệu</a></li>
              <li class="divider"></li>
              <li><a href="#" data-toggle="modal" data-target="#my-message">Thông tin website</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

  </div>
</nav>
