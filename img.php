<?php

$im = new Imagick('https://pbs.twimg.com/profile_images/3242057551/10a438c949d03791774d28835c7ff468.jpeg');

$im->thumbnailImage(171, 171);
header('Content-type: image/png');
echo $im;

/*

$image = imagecreate(540, 815);

$color_33AA33 = imagecolorallocate($image, 0x33, 0xAA, 0x33); //Verde unocero
$color_F3F3F3 = imagecolorallocate($image, 0xF3, 0xF3, 0xF3); //Fondo General
$color_C3C3C3 = imagecolorallocate($image, 0xC3, 0xC3, 0xC3); //Borde General
$color_D4E7D4 = imagecolorallocate($image, 0xD4, 0xE7, 0xD4); //Fondo Datos de Usuario

$color_text = imagecolorallocate($image, 255, 255, 0);
$color_line = imagecolorallocate($image, 128, 255, 0);

//Fondo General
imagefilledrectangle($image, 0, 0, 539, 814, $color_F3F3F3);

//Borde General
imagerectangle($image, 0, 0, 539, 814, $color_C3C3C3);

//Fondo de los datos del usuario
imagefilledrectangle($image, 17, 17, 523, 188, $color_D4E7D4);

//Avatar
/
$avatar_original = @imagecreatefromjpeg('https://pbs.twimg.com/profile_images/3242057551/10a438c949d03791774d28835c7ff468.jpeg');
$avatar = imagecreatetruecolor(171, 171);
imagecopyresampled($avatar, $avatar_original, 0, 0, 0, 0, 171, 171, imagesx($avatar_original), imagesy($avatar_original));
imagedestroy($avatar_original);
imagecopy($image, $avatar, 17, 17, 0, 0, 171, 171);
imagedestroy($avatar);
/
$avatar = @imagecreatefromjpeg('https://pbs.twimg.com/profile_images/3242057551/10a438c949d03791774d28835c7ff468.jpeg');
imagecopyresampled($image, $avatar, 17, 17, 0, 0, 171, 171, imagesx($avatar), imagesy($avatar));
imagedestroy($avatar);

//imagestring($image, 4, 30, 25, 'unocero', $color_text);

//imagesetthickness($image, 5);
//imageline($image, 30, 45, 165, 45, $color_line);

header('Content-type: image/png');
imagejpeg($image);

imagecolordeallocate($color_line);
imagecolordeallocate($color_text);
imagecolordeallocate($color_C3C3C3);
imagecolordeallocate($color_F3F3F3);
imagedestroy($image);

*/