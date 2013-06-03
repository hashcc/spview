<?php

if (preg_match('#[^0-9a-zA-Z./_-]#', $_GET["img"])){
  exit("デザイン画像名は半角英数字 / _ - のいずれかだけにしてください");
} else{
$filepath = $_GET["img"];
}

if (preg_match('#[^0-9]#', $_GET["size"])){
  exit("大きさは数字だけで指定してください");
} else{
$indicated_width = $_GET["size"];
}

 // pixel of width
$image_type = exif_imagetype($filepath);

switch($image_type) {
  case IMAGETYPE_JPEG:
    $image = ImageCreateFromJPEG($filepath); break;
  case IMAGETYPE_PNG:
    $image = ImageCreateFromPNG($filepath); break;
  case IMAGETYPE_GIF:
    $image = ImageCreateFromGIF($filepath); break;
  default:
    die("判別できません"); break;
}

$width = ImageSX($image);
$height = ImageSY($image);

$new_width = $indicated_width;
$new_height = $height * ($new_width / $width);

$new_image = ImageCreateTrueColor($new_width, $new_height);
ImageCopyResampled($new_image,$image,0,0,0,0,$new_width,$new_height,$width,$height);

header("Content-Type: image/png");
ImagePNG($new_image);
imagedestroy ($image);
imagedestroy ($new_image);