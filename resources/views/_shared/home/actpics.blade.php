{{-- Created at 2015/07/26 08:42 htien Exp $ --}}
<style>
  li {margin-bottom: 5px;}
</style>
<div id="actPics" class="box">
  <h4 class="box-title"><span>Ảnh hoạt động</span></h4>
  <div class="UISlider">
    <ul class="slideList no-bullets">
      <?php
        foreach ($arrPic as $val) {
          $fileName = $val["fileName"];
      ?>
          <li>
            <div class="text-center">
              <a href="home/album/<?php echo $lastPicCateId; ?>">
                <img src="<?php echo "uploads/album/" . $fileName; ?>" alt=""
                      style="width: 600px;height: 480px;background-color: #ccc;"/>
              </a>
            </div>
          </li>
      <?php } ?>
    </ul>
  </div>
</div>
