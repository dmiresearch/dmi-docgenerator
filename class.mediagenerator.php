<?php
/**
 * Created by PhpStorm.
 * User: RESEARCH2
 * Date: 4/15/2015
 * Time: 2:01 PM
 */
include 'config/config.php';
class MediaGenerator{
    var $fileType;
    var $fileName;
    var $blobFile;

    public function __construct($fileName, $blobFile){
        date_default_timezone_set('Africa/Nairobi');
        $this->fileName = $fileName;
        $this->blobFile = $blobFile;
    }
    public function extractExtension($file){
       return strtolower(pathinfo($file, PATHINFO_EXTENSION));
    }
    public function saveFile(){
        $this->fileType = $this->extractExtension($this->fileName);
        $dir = '';
        switch($this->fileType){
            case 'doc':
            case 'docx':
            case 'wps':
            case 'rtf':
                $dir = DOC_DIR.MSWORD_DIR;
                break;
            case 'pps':
            case 'ppt':
            case 'pptx':
                $dir = DOC_DIR.MSPOWERPOINT_DIR;
                break;
            case 'accdb':
            case 'mdb':
            case 'db':
            case 'pdb':
                $dir = DOC_DIR.MSACCESS_DIR;
                break;
            case 'pdf':
                $dir = DOC_DIR.PDF_DIR;
                break;
            case '3gp':
            case '3g2':
            case 'asf':
            case 'asx':
            case 'avi':
            case 'flv':
            case 'mov':
            case 'bmp':
            case 'mp4':
            case 'mpg':
            case 'rm':
            case 'swf':
            case 'wmv':
                $dir = DOC_DIR.VIDEO_DIR;
                break;
            case 'aif':
            case 'iff':
            case 'm3u':
            case 'm4a':
            case 'mid':
            case 'mp3':
            case 'mpa':
            case 'ra':
            case 'wav':
            case 'wma':
                $dir = DOC_DIR.AUDIO_DIR;
                break;
            case 'bmp':
            case 'psd':
            case 'gif':
            case 'jpg':
            case 'png':
            case 'tif':
            case 'jpeg':
                $dir = DOC_DIR.IMAGE_DIR;
                break;
            case '7z':
            case 'deb':
            case 'gz':
            case 'pkg':
            case 'rar':
            case 'zip':
            case 'zipx':
            case 'tar.gz':
                $dir = DOC_DIR.COMPRESSED_DIR;
                break;
            case 'message':
                $dir = DOC_DIR.MESSAGE_DIR;
                break;
            case 'others':
                $dir = DOC_DIR.OTHERFILES_DIR;
                break;
            break;
            default:
                $dir = DOC_DIR.OTHERFILES_DIR;
                break;
        }
        echo $dir;
        //echo $file_name;
        file_put_contents($dir.$this->fileName, $this->blobFile);
        echo 'file saved';
    }
}
//$file_name = 'Doc1.docx';
//$file = file_get_contents($file_name);
//$demo = new MediaGenerator($file_name, $file);
//$demo->saveFile();




