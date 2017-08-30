<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29/029
 * Time: 11:18
 */

/*$width=160;
$height=40;
$img=imagecreatetruecolor($width,$height);
$color=imagecolorallocate($img,mt_rand(150,255),mt_rand(150,255),mt_rand(150,255));
imagefill($img,0,0,$color);
$str="23456789abcdefghjklmnprstuvwxyz";
$words="";
for($i=0;$i<4;$i++){
    $num=mt_rand(0,strlen($str)-1);
    $word=substr($str,$num,1);
    $color1=imagecolorallocate($img,mt_rand(0,150),mt_rand(0,150),mt_rand(0,150));
    imagefill($img,0,0,$color);
    imagettftext($img,mt_rand(20,30),mt_rand(-45,45),mt_rand(10,20)+$i*40,30,$color1,"font.ttf",$word);
    $words.=$word;
}
session_start();
$_SESSION["code"]=$words;
header("Content-type:image/png");
imagepng($img);
imagedestroy($img);*/

$width=120;
$height=40;
$img=imagecreatetruecolor($width,$height);
function getcolor($img,$type="l"){
    if($type=="l"){
        return imagecolorallocate($img,mt_rand(120,255),mt_rand(120,255),mt_rand(120,255));
    }else if($type=="d"){
        return imagecolorallocate($img,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120));
    }
}
imagefill($img,0,0,getcolor($img));//创建图片填充颜色
//创建点图案
for($i=0;$i<100;$i++){
    imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),getcolor($img));//创建一些点
}
//添加线条
for($i=0;$i<50;$i++){
    imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),getcolor($img));
}

$str="23456789abcdefghjklmnpqrstuvwxyz";
$words="";
for($i=0;$i<4;$i++){
    $pos=mt_rand(0,strlen($str)-1);
    $word=substr($str,$pos,1);
    $word=strtoupper($word);
    $words.=$word;
    imagettftext($img,mt_rand(20,30),mt_rand(-45,45),$i*30+mt_rand(0,10),mt_rand(30,40),getcolor($img,"d"),"font.ttf",$word);
}
session_start();
$_SESSION["code"]=$words;
header("Content-type:image/png");
imagepng($img);
imagedestroy($img);