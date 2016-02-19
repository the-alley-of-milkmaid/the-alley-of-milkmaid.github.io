<?php

include 'data.php';
//could not include galleryimages.php and let it work
// so had to use same method but with differnet name..
function givenImageIndexGetImageCaption1($index)
{
	global $images;
	return $images[$index][1];
}

function givenImageIndexGetBigImagePath1($index)
{
	global $images,$imagesLocationNormal;
	return $imagesLocationNormal.$images[$index][0];
}

function getHomeImagesCount()
{
	global $homeImages;
	return count($homeImages);
}

function givenHomeImageIndexGetBigImagePath($index)
{
	global $homeImages,$imagesLocationNormal;
	return $imagesLocationNormal.$homeImages[$index][0];
}

function givenHomeImageIndexGetImageCaption($index)
{
	global $homeImages;
	return $homeImages[$index][1];
}



function getHomeMainImage()
{
  global $mainImageNumber;
  $imagePathBig = givenImageIndexGetBigImagePath1($mainImageNumber);
  $imageCaption = givenImageIndexGetImageCaption1($mainImageNumber);

    $formatNew ='


    <a id="theHomeMain" href="%s" data-size="1055x1460" class="demo-gallery__img--main">
       <img src="%s" class="homePageImages1"/>
       <figure>%s</figure>
    </a>';

    $result =  sprintf($formatNew,$imagePathBig,$imagePathBig,$imageCaption);
       return $result;

}


function givenHomeImageIndexGetImageDiv($index)
{
	$imagePathBig = givenHomeImageIndexGetBigImagePath($index);
  $imageCaption = givenHomeImageIndexGetImageCaption($index);

    $formatNew ='

    <a href="%s" data-size="1198x1024">
       <img src="%s" class="homePageImages"/>
       <figure>%s</figure>
    </a>';

		$result =  sprintf($formatNew,$imagePathBig,$imagePathBig,$imageCaption);
       return $result;
}

?>
