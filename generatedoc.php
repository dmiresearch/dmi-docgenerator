<?php  
    include 'class.rtfdocgenerator.php';
    include 'config/config.php';
    if(isset($_GET['msg'])){
    $deadline = mktime(0,0,0,date('m'),date('d')+14, date('Y'));
    date_default_timezone_set('Africa/Nairobi');
    $msgBody = $_GET['msg'];
    $msgFrom = $_GET['from'];
    $time = date('m/d/Y H:i:s', $_GET['date']);
    $msgFrom = strtolower(str_replace(' ', '-', $msgFrom));
    $date = date('Y-m-d H.i.s');
    $targetFile = "./template/template.rtf";
    $fileName = 'telegram-'.$msgFrom.$date;
    $targetCopy = DOC_DIR.MESSAGE_DIR.$fileName.'.rtf';
    $vars = array('from' => strtoupper($sender),
                  'time'  => $time,
                  'message' => $msgBody);
    $RTF = new RFTGenerator($vars, $targetFile);
    $RTF->generateRTFDoc();
    $new_rtf = $RTF->getRTFOutputDoc();
    $fr = fopen($targetCopy, 'w') ;
    fwrite($fr, $new_rtf);
    fclose($fr);
}