

<?php

include 'data.php';

function getGalleryRowCount()
{
	global $images,$maxImagesPerColumn;
    return count($images)/$maxImagesPerColumn;
}
function getImagesCount()
{
	global $images;
	return count($images);
}
function getGalleryColumnCount()
{
	global $maxImagesPerColumn;
	return $maxImagesPerColumn;
}

function givenImageIndexGetNextIndex($index)
{
	$count = getImagesCount();
	$result=($index+1)%$count;
	if(isIndexEmpty($result))
	{
		return givenImageIndexGetNextIndex($result);
	}
	else
	{
		return $result;
	}
}

function givenImageIndexGetPreviousIndex($index)
{
	$count = getImagesCount();
	if($index==0)
	{
		return $count-1;
	}
	else
	{
		$result=$index-1;
		if(isIndexEmpty($result))
		{
			return givenImageIndexGetPreviousIndex($result);
		}
		else
		{
			return $result;
		}
	}
}

function isIndexEmpty($index)
{
	global $imagesLocationSmall;
	$imagePath = givenImageIndexGetSmallImagePath($index);
	if($imagePath == $imagesLocationSmall)
	{
		return true;
	}
	else
	{
		return false;
	}
}


function givenImageIndexGetSmallImagePath($index)
{
	global $images,$imagesLocationSmall;
	return $imagesLocationSmall.$images[$index][0];
}

function givenImageIndexGetBigImagePath($index)
{
	global $images,$imagesLocationNormal;
	return $imagesLocationNormal.$images[$index][0];
}


function givenImageIndexGetImageCaption($index)
{
	global $images;
	return $images[$index][1];
}

function givenGalleryImageIndexGetImageDiv($index)
{
	$imagePathSmall = givenImageIndexGetSmallImagePath($index);
	$imagePathBig = givenImageIndexGetBigImagePath($index);
  $imageCaption = givenImageIndexGetImageCaption($index);
	if(!isIndexEmpty($index))
	{
    $formatNew ='

    <a href="%s" data-size="1020x1024">
       <img src="%s" itemprop="thumbnail" alt="Image description" class="galleryImage"  />
       <figure>%s</figure>
    </a>';
		//$formatNew ='<figure class="galleryImageContainer">
    //  <a href="%s" itemprop="contentUrl" data-size="964x1024">
      //    <img src="%s" itemprop="thumbnail" alt="Image description" class="galleryImage"  />
    //  </a>
    //	</figure>';
		$result =  sprintf($formatNew,$imagePathBig,$imagePathSmall,$imageCaption);
       return $result;
	}
	else
	{
		//echo '<div class=" galleryImageContainer emptyDiv"> </div>'; TODO put back
		echo '';
	}
}


//var_dump($images[0]["caption"]);
//var_dump($images[1]["path"]);
//var_dump($images["multi"]["dimensional"]["array"]);
?>
