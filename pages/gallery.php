<div id="Gallery" class="contentbox">





<div id="my-gallery" class="demo-gallery"  data-pswp-uid="2">




	<?php
	include 'php/galleryImages.php';
	$imagesCount=getImagesCount();

	for ($i = 0; $i < $imagesCount; $i++) {
		if($i%3==0)
		{
			echo '<div class="combiningGalleryDivs">';
		}
		echo givenGalleryImageIndexGetImageDiv($i);
		if($i%3==2)
		{
			echo '</div>';
		}
	}
	if($i%3!=0)
	{
		echo '</div>';
	}
	?>
	</div>


</div>
