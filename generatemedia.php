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
    $fileFrom = $_POST['from'];
    $fileDate = $_POST['date'];
    $fileType = $_POST['filetype'];
    $fileName = $_POST['filename'];
    echo 'file mimetype: '.$fileType;
    $fileDate = date('m/d/Y H:i:s', $fileDate);
    $fileFrom = strtolower(str_replace(' ', '-', $fileFrom));
    echo 'From: '.strtolower($fileFrom).' Date: '.$fileDate;
    $size = getimagesize($_FILES['blob']['tmp_name']);
    //assign our variables
    $type = $size['mime'];
    $blob = fopen($_FILES['blob']['tmp_name'], 'rb');
//    if(exif_imagetype($blob) <= 3){
//        echo 'IMAGE FILE';
//    }else{
//        echo 'OTHER FILES';
//    }
    $size = $size[3];
    $name = $_FILES['blob']['name'];
    echo 'Type: '.$type.' Size: '.$size.' Name: '.$name;
    $date = date('Y-m-d H.i.s');
    //$fileName = './docs/telegram-images/targeting/telegram-'.$photoFrom.$date.'.png';
    $fileName = 'telegram-'.$fileFrom.$date.'-'.$fileName;

    $demo = new MediaGenerator($fileName, $blob);
    $demo->saveFile();

    //file_put_contents($fileName, $imgfp);
    echo 'File saved';
}else{
    echo 'Okay. No data posted!';
}