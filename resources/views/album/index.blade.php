{{-- Created at 2015/05/27 03:44 htien Exp $ --}}
@extends('_layouts.home.main_page') @section('page_title', 'Trang Chủ')
@section('page_body_attributes') class="home-page" @stop {{--
======================================================= LOAD RESOURCES
--}} @section('page_css')

<link rel="stylesheet"
  href="assets/libs/owl-carousel/2.0.0/css/owl.carousel.css" />
  
<style>
.main{
            width:1100px;
            background-color: #000;
            margin: 0 auto;
            overflow: overlay;
}
.wrapper{
            width:960px;
            float:left;
            margin:20px;
}
.wrapper .album_title {
  color: #fff;
  font-size: 25px;
  font-weight: bold;
}

#big_img {
            height: 400px;
            margin:20px 20px 0px 20px;
            text-align: center;
            background-color: #000;
}

#big_img img {
  max-height: 400px;
}

.thumbnail-inner{
            width:920px;
            background-color: #000;
            float: left;
            margin-left: 20px;
}
.thumbnail-inner img{
            width:130px;
            height: 100px;
            margin:8px 0px 0px 12px;
            border:3px solid red;
            border-radius: 5px;
            opacity: 0.5;
            cursor: pointer;
}
.thumbnail-inner img:hover{
            opacity: 1;
}

.wrapper_album {
  display: inline-block;
  background-color: pink;
  padding: 10px;
}

.wrapper_album a:hover div.album_element{
  background-color: #000;
}

.wrapper_album div.album_element {
  float: left;
  width: 250px;
  height: 300px;
  margin: 10px;
  background-color: #0098db;
}

.wrapper_album div.album_element img {
  width: 250px;
  height: 250px;
}

.album_element .album_title {
    height: 50px;
    text-align: center;
    line-height: 50px;
    color: #fff;
}

</style>
@parent
<link rel="stylesheet" href="app-home/home.css" />

@stop @section('page_js_load')

<script
  src="assets/libs/jquery-jcarousel/0.3.3/js/jquery.jcarousel.min.js"></script>
<script src="assets/libs/owl-carousel/2.0.0/js/owl.carousel.js"></script>
<script>
window.onload = gallery;
//when we load your gallery in browser then gallery function is loaded
function gallery(){
  // gallery is the name of function
  var allimages = document.images;
  //now we create a variable allimages
  //and we store all images in this allimages variable
  for(var i=0; i<allimages.length; i++){
   //now we create a for loop
   allimages[i].onclick = imgChanger;
   //in above line we are adding a listener to all the thumbs stored inside the allimages array on onclick event.
  }
}
//declaring the imgChanger function
function imgChanger(){
  //changing the src attribute value of the large image.
  document.getElementById('myPicture').src ="uploads/album/" + this.id;
}
</script>
@parent
<script src="app-home/home.js"></script>

@stop

{{-- ========================================================= LOAD
CONTENT --}} @section('content_before')

{{--@include('_shared.home.featured_section')--}} @stop

@section('content')

<div class="main">
   <div class="wrapper">
     <div class="album_title"><?php echo $picCate->name; ?></div>
       <div id="big_img">
          <img src="uploads/album/<?php echo $arrPic[0]["fileName"]; ?>" id="myPicture" class="border" />
       </div>
       <div class="thumbnail-inner">
         <?php
          foreach ($arrPic as $val) {
            $fileName = $val["fileName"];
         ?>
          <img src="<?php echo "uploads/album/" . $fileName; ?>" id="<?php echo $fileName; ?>"/>
         <?php } ?>
       </div>
    </div>
      
    <div class="wrapper_album">
      <?php
        foreach ($arrAllPicCates as $pc) {
          $fileName = $pc["lastFileName"];
      ?>
          <a href="home/album/<?php echo $pc["id"]; ?>">
            <div class="album_element">
              <div><img src="uploads/album/<?php echo $fileName; ?>" /></div>
              <div class="album_title"><?php echo $pc["name"]; ?></div>
            </div>
          </a>
      <?php }?>
      <div style="clear: both;"></div>
    </div>
</div>
<div>

@stop