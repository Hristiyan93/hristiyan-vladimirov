<?php

class Models_Wrapper_File{
    
    protected $filename;
    
    function __construct($filename){
        $this->filename = $filename;
    }
    
    function save($dstFile, $width=0, $height=0){
        
        $resizer = new Image_Tools($this->filename);
        
        if(!empty($width)&&!empty($height)){
            $resizer->resize($width, $height, true);
        }
        $resizer->save($dstFile);
    }
    
    function delete(){
        unlink($this->filename);
    }
}