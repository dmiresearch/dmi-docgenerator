<?php
/**
 * Created by PhpStorm.
 * User: RESEARCH2
 * Date: 4/15/2015
 * Time: 9:33 AM
 */
include 'class.mediagenerator.php';
if(isset($_FILES['blob'])){
	date_default_timezone_set('Africa/Nairobi');
	$blob = $_FILES['blob'];
    $photoFrom = $_POST['from'];
    $photoDate = $_POST['date'];
    $photoDate  = date('m/d/Y H:i:s', $photoDate);
    $photoFrom = strtolower(str_replace(' ', '-', $photoFrom));
    echo 'From: '.strtolower($photoFrom).' Date: '.$photoDate;
    $blob = fopen($_FILES['blob']['tmp_name'], 'rb');
    $date = date('Y-m-d H.i.s');

    $fileName = 'telegram-'.$photoFrom.$date.'-photo.png';

    $demo = new MediaGenerator($fileName, $blob);
    $demo->saveFile();
    echo 'File saved';
}else{
	echo 'Okay. No data posted!';
}
