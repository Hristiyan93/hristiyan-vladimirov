<?php

class Models_Images{
    
    function receiveFile($file){
        $upload = new Zend_File_Transfer();
        
        $filename = ROOT_PATH.'/etc/tmp/' . basename($upload->getFileName($file));
        if(file_exists($filename)){
            unlink($filename);
        }
        $upload->addFilter('Rename', $filename, $file);
        if($upload->receive($file)){
            $file = new Models_Wrapper_File($filename);
        }else{
            $file = null;
        }
        return $file;
    }
    
    function deleteFiles($path){
        $files = glob($path);
        foreach($files as $file){
            unlink($file);
        }
    }
    
    function renameFiles($path, $from, $to){
        $files = glob($path);
        foreach($files as $file){
            $newName = str_replace($from, $to, $file);
            rename($file, $newName);
        }
    }
    
}