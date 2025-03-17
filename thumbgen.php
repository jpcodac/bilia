<?

$image = ImageCreateFromJPEG($fichier);

$width  = imagesx($image) ;
$height = imagesy($image) ;

$new_width  = 100; // largeur a definir
$new_height = ($new_width * $height) / $width ; // hauteur proportionnelle

/*$thumb = imagecreate($new_width,$new_height);*/
$thumb = ImageCreateTrueColor($new_width,$new_height);
imagecopyresized($thumb,$image,0,0,0,0,$new_width,$new_height,$width,$height);

header("Content-type:image/jpeg");
imagejpeg($thumb);
imagedestroy($image);
imagedestroy($thumb);
?>
