<div id="Home" class="contentbox">
<div id="theBody" style="text-align: center; margin-top:10px ">
<?php include 'titleInHome.php';?>

<div id="demo-test-gallery" class="demo-gallery kiko-gallery" data-pswp-uid="1">
  <?php
  include 'php/homeImages.php';

  echo getHomeMainImage();

  $imagesCount=getHomeImagesCount();
  for ($i = 0; $i < $imagesCount; $i++) {
  echo givenHomeImageIndexGetImageDiv($i);
  }
  ?>

</div>
</div>



</div>
