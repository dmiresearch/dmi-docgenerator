<?php
	
	class RFTGenerator{
	 var $rtfTemplate;
	 var $rtfAppendData;
	 var $rftOutputDoc;

	 public function __construct($data, $template){
	 	$this->rtfTemplate 	 = $template;
	 	$this->rtfAppendData = $data;
	 }

	 public function generateRTFDoc(){
	 	$replacements = array ('\\' => "\\\\", '{'  => "\{", '}'  => "\}");
        $document = file_get_contents($this->rtfTemplate);
        if(!$document) {
            return false;
        }
        foreach($this->rtfAppendData as $key=>$value) {
            $search = "%%".strtolower($key)."%%";
            foreach($replacements as $orig => $replace) {
                echo $orig.$value;
                $value = str_replace($orig, $replace, $value);
            }
            $document = str_replace($search, $value, $document);
        }
        $this->rftOutputDoc =  $document;
	 }
	 public function getRTFOutputDoc(){
	 	return $this->rftOutputDoc;
	 }
	}