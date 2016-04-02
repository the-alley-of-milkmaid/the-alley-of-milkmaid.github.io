<?php

function getGalleryRowCount1()
{
	//global $images,$maxImagesPerColumn;
  return 5;//count($images)/$maxImagesPerColumn;
}


/////////////////////////// Exhibition Functions ///////////////////////////
function getExhibitionsCount()
{
	global $exhibitions;
	return count($exhibitions);
}

function givenExhibitionIndexGetImageDiv($index)
{
	global $exhibtionsLocation,$exhibitions;
	$j=0;
	$imagePath = $exhibtionsLocation.$exhibitions[$index][$j++];
	$exhibitionName = $exhibitions[$index][$j++];
	$exhibitionType = $exhibitions[$index][$j++];
	$exhibitionDate = $exhibitions[$index][$j++];
  $exhibitionLink = $exhibitions[$index][$j++];
	$exhibitionDescription = $exhibitions[$index][$j++];
  $formatNew ='
	<div class= "ExhibitionContainerDiv col-xs-12 col-sm-12 col-md-6">
		<div class="col-xs-6 col-sm-6 col-md-6">

       <img src="%s" itemprop="thumbnail" alt="Image description" class="exhibitionImage"  />

		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="ExhibitionDescription">
			<h4>%s</h4>
			<span style ="font-style:italic" class="subtitle">%s</span><br>
			<span style ="font-weight:600"  class="date">%s</span><br>
			<span class="description">%s</span><br>
			<a href="%s" style="font-size:12px">Read More</a><br>
			</div>
		</div>
	</div>
		';
		//$formatNew ='<figure class="galleryImageContainer">
    //  <a href="%s" itemprop="contentUrl" data-size="964x1024">
      //    <img src="%s" itemprop="thumbnail" alt="Image description" class="galleryImage"  />
    //  </a>
    //	</figure>';
		$result =  sprintf($formatNew,$imagePath,$exhibitionName,$exhibitionType,$exhibitionDate,$exhibitionLink,$exhibitionDescription);
    return $result;
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
  global $imagesLocationNormal,$images;

	$imagePathSmall = givenImageIndexGetSmallImagePath($index);
	$imagePathBig = givenImageIndexGetBigImagePath($index);
  $imageCaption = givenImageIndexGetImageCaption($index);


  $j=0;
  $imagePath = $imagesLocationNormal.$images[$index][$j++];
  $imageName = $images[$index][$j++];
  $imageMedium = $images[$index][$j++];
  $imageFrame = $images[$index][$j++];
  //$soldOptional= array_key_exists ($j,$images)?$images[$index][$j++]:"";

	if(!isIndexEmpty($index))
	{
  /*  $randomBool = rand(0,1) == 1;
  $classTest="";
    if($randomBool)
    {
      $classTest="pImageName2";
    }*/
    list($width, $height, $type, $attr) = getimagesize($imagePathBig);
    //echo "<p>".$width." </p>";

    $formatNew ='
		<div class="galleryImageContainer col-xs-12 col-md-4">
    <p class="pContentNone pImageName">'.$imageName .'</p>
    <a class="hrefToRemoveInMobile" href="%s" data-size="'.$width.'x'.$height.'">
       <img src="%s" itemprop="thumbnail" alt="Image description" class="galleryImage"  />
       <figure>%s</figure>
       <div class="desktopOnly overlay overlayhuge" >
			             <span class="title">Queen of Hearts<br><br><br>2015</span>
			            	
			            <span class="size">200 x 140 cm<br><br>
			            Media paper oily </span>
			            </div>
    </a>';

  //$formatNew .= '<p>'.$imageName .'</p>';
  $formatNew .= '<p class="pContentNone pMargin">&nbsp&nbsp'.$imageMedium .'</p>';
  $formatNew .= '<p class="pContentNone pMargin">&nbsp&nbsp'.$imageFrame .'</p>';


  //
  if(array_key_exists($j,$images[$index]))
      $formatNew .= '<p class="pContentNone pSpaceToNextImage  pSold">&nbsp&nbsp'.$images[$index][$j] .'</p>';
  else {
    $formatNew .= '<p class="pContentNone pSpaceToNextImage"></p>';
  }
    //$formatNew .= '<img src="public/img/other/SeperatorLine.png" class="pMargin" alt="Seperator Line" width="300px" height="12">';
  //

  //$formatNew = $soldOptional!="":'<p>'.$soldOptional .'</p>':$formatNew;

      $formatNew .='
    </div>';
		//$formatNew ='<figure class="galleryImageContainer">
    //  <a href="%s" itemprop="contentUrl" data-size="964x1024">
      //    <img src="%s" itemprop="thumbnail" alt="Image description" class="galleryImage"  />
    //  </a>
    //	</figure>';
		$result =  sprintf($formatNew,$imagePathBig,$imagePathBig,$imageCaption);
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
