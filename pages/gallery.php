<div id="Gallery" class="contentbox">





<div id="my-gallery" class="demo-gallery"  data-pswp-uid="2">




	<?php
	include 'php/galleryImages.php';
	$imagesCount=getImagesCount();
	for ($i = 0; $i < $imagesCount; $i++) {
	echo givenGalleryImageIndexGetImageDiv($i);
	}
	?>
	</div>


</div>
