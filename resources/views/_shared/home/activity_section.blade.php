{{-- Created at 2015/06/01 04:00 htien Exp $ --}}

<section id="activity-section" class="ivy-section">
  {{--@if (! Route::is('enrolstudents'))--}}
  {{--<div class="ivy-page-wrapper">--}}
    {{--<section id="enrolstudents-section" class="ivy-section">--}}
    {{--<div>--}}
      {{--<h2>--}}
        {{--<a href="{{ route('enrolstudents') }}">--}}
          {{--<span class="glyphicon glyphicon-star"></span>--}}
          {{--Chiêu sinh khóa mới 2015--}}
          {{--<span class="glyphicon glyphicon-star"></span>--}}
        {{--</a>--}}
      {{--</h2>--}}
    {{--</div>--}}
    {{--</section>--}}
  {{--</div>--}}
  {{--@endif--}}

  <h2 class="hidden">Activities</h2>
  <div id="activity-wrapper">
    <div class="cuztom-row">

      <div id="activity-image-wrapper">
        <div class="ribbon"></div>
        <div class="ivy-page-wrapper">
          <img class="cover-image" src="assets/img/demo/slide-image-4.jpg" alt="Ảnh bìa" />
        </div>
        <div id="activity-image-slider" class="ivy-page-wrapper owl-carousel">
          <div class="item">
            {{--<img class="owl-lazy" data-src="media/s_hoatdong/giaoducthieunhi-trochoi-dangian-1.jpg" alt="" >--}}
            <img src="assets/img/photos/banners/slide_banner.jpg" alt="" />
            <div class="act-item__tile__overlay"></div>
            <div class="act-item__tile__details">
              <h3 class="act-item__tile__details__title">Hoạt động ngoại khóa 1</h3>
              <div class="act-item__tile__supplementary">
                <div class="act-item__tile__description">Học tập, vui chơi, vận động thể chất, giải trí lành mạnh và bổ ích.</div>
              </div>
            </div>
          </div>
          <div class="item">
            {{--<img class="owl-lazy" data-src="media/s_hoatdong/giaoducthieunhi-trochoi-dangian-2.jpg" alt="" />--}}
            <img src="media/s_hoatdong/giaoducthieunhi-trochoi-dangian-2.jpg" alt="" />
            <div class="act-item__tile__overlay"></div>
            <div class="act-item__tile__details">
              <h3 class="act-item__tile__details__title">Hoạt động ngoại khóa 2</h3>
              <div class="act-item__tile__supplementary">
                <div class="act-item__tile__description">Học tập, vui chơi, vận động thể chất, giải trí lành mạnh và bổ ích.</div>
              </div>
            </div>
          </div>
          <div class="item">
            {{--<img class="owl-lazy" data-src="media/s_hoatdong/giaoducthieunhi-trochoi-dangian-3.jpg" alt="" />--}}
            <img src="media/s_hoatdong/giaoducthieunhi-trochoi-dangian-3.jpg" alt="" />
            <div class="act-item__tile__overlay"></div>
            <div class="act-item__tile__details">
              <h3 class="act-item__tile__details__title">Hoạt động ngoại khóa 3</h3>
              <div class="act-item__tile__supplementary">
                <div class="act-item__tile__description">Học tập, vui chơi, vận động thể chất, giải trí lành mạnh và bổ ích.</div>
              </div>
            </div>
          </div>
          <div class="item">
            {{--<img class="owl-lazy" data-src="media/s_hoatdong/giaoducthieunhi-trochoi-dangian-4.jpg" alt="" />--}}
            <img src="media/s_hoatdong/giaoducthieunhi-trochoi-dangian-4.jpg" alt="" />
            <div class="act-item__tile__overlay"></div>
            <div class="act-item__tile__details">
              <h3 class="act-item__tile__details__title">Hoạt động ngoại khóa 4</h3>
              <div class="act-item__tile__supplementary">
                <div class="act-item__tile__description">Học tập, vui chơi, vận động thể chất, giải trí lành mạnh và bổ ích.</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{--<div class="cuztom-col col-sm-12 col-md-9 col-lg-9">--}}
        {{--<div id="activity-image-wrapper">--}}
          {{--<div class="ribbon"></div>--}}
          {{--<img class="cover-image" src="img/demo/slide-image-4.jpg" alt="" />--}}
          {{--<div id="activity-image-slider" class="owl-carousel">--}}
            {{--<div class="item">--}}
              {{--<img class="lazyOwl" data-src="img/demo/slide-image-3.jpg" src="img/blank.gif" alt="" >--}}
            {{--</div>--}}
            {{--<div class="item">--}}
              {{--<img class="lazyOwl" data-src="img/demo/slide-image-4.jpg" src="img/blank.gif" alt="" />--}}
            {{--</div>--}}
          {{--</div>--}}
        {{--</div>--}}
      {{--</div>--}}
      {{--<div class="cuztom-col col-sm-12 col-md-3 col-lg-3">--}}
        {{--<div id="activity-menu-wrapper">--}}
          {{--<h3>Hoạt Động</h3>--}}
          {{--<div id="activity-menu">--}}
            {{--<ul class="overview">--}}
              {{--<li>--}}
                {{--<a class="menu-box" href="javascript:void(0)">--}}
                  {{--<span class="title">Bóng Đá</span>--}}
                  {{--<p>Phasellus faucibus tempor</p>--}}
                  {{--<span class="arrow"></span>--}}
                {{--</a>--}}
              {{--</li>--}}
              {{--<li>--}}
                {{--<a class="menu-box" href="javascript:void(0)">--}}
                  {{--<span class="title">Võ Thuật</span>--}}
                  {{--<p>Duis lobortis fermentum erat</p>--}}
                  {{--<span class="arrow"></span>--}}
                {{--</a>--}}
              {{--</li>--}}
              {{--<li>--}}
                {{--<a class="menu-box" href="javascript:void(0)">--}}
                  {{--<span class="title">Văn Nghệ</span>--}}
                  {{--<p>Vivamus viverra arcu pretium</p>--}}
                  {{--<span class="arrow"></span>--}}
                {{--</a>--}}
              {{--</li>--}}
              {{--<li>--}}
                {{--<a class="menu-box" href="javascript:void(0)">--}}
                  {{--<span class="title">Rạp Phim</span>--}}
                  {{--<p>Praesent fringilla rutrum augue</p>--}}
                  {{--<span class="arrow"></span>--}}
                {{--</a>--}}
              {{--</li>--}}
              {{--<li>--}}
                {{--<a class="menu-box" href="javascript:void(0)">--}}
                  {{--<span class="title">Hoạt động 1</span>--}}
                  {{--<p>Praesent fringilla rutrum augue</p>--}}
                  {{--<span class="arrow"></span>--}}
                {{--</a>--}}
              {{--</li>--}}
              {{--<li>--}}
                {{--<a class="menu-box" href="javascript:void(0)">--}}
                  {{--<span class="title">Hoạt động 2</span>--}}
                  {{--<p>Praesent fringilla rutrum augue</p>--}}
                  {{--<span class="arrow"></span>--}}
                {{--</a>--}}
              {{--</li>--}}
              {{--<li>--}}
                {{--<a class="menu-box" href="javascript:void(0)">--}}
                  {{--<span class="title">Hoạt động 3</span>--}}
                  {{--<p>Praesent fringilla rutrum augue</p>--}}
                  {{--<span class="arrow"></span>--}}
                {{--</a>--}}
              {{--</li>--}}
              {{--<li>--}}
                {{--<a class="menu-box" href="javascript:void(0)">--}}
                  {{--<span class="title">Hoạt động 4</span>--}}
                  {{--<p>Praesent fringilla rutrum augue</p>--}}
                  {{--<span class="arrow"></span>--}}
                {{--</a>--}}
              {{--</li>--}}
              {{--<li>--}}
                {{--<a class="menu-box" href="javascript:void(0)">--}}
                  {{--<span class="title">Hoạt động 5</span>--}}
                  {{--<p>Praesent fringilla rutrum augue</p>--}}
                  {{--<span class="arrow"></span>--}}
                {{--</a>--}}
              {{--</li>--}}
            {{--</ul>--}}
          {{--</div>--}}
          {{--<div class="buttons">--}}
            {{--<a class="prev" href="javascript:void(0)">&lt;</a>--}}
            {{--<a class="next" href="javascript:void(0)">&gt;</a>--}}
          {{--</div>--}}
        {{--</div>--}}
      {{--</div>--}}

    </div>
  </div>
</section>
