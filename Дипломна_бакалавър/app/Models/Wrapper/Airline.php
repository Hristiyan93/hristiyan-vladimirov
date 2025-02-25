<?php

class Models_Wrapper_Airline extends Zend_Db_Table_Row{
    
    function hasImage(){
        return file_exists($this->getImagePath());
    }
    
    function getImagePath(){
        return ROOT_PATH.'/www/images/airlines/' . $this->id . '.png';
    }
    
    function getImageUrl(){
        return '/images/airlines/' . $this->id . '.png';
    }
    
    function uploadPicture($file){
    
        $images = new Models_Images();
    
        $image = $images->receiveFile($file);
        if(!empty($image)){
            $image->save($this->getImagePath(), 270, 160);
            $image->delete();
        }
    }
    
    function delete(){
        if($this->hasImage()){
            unlink($this->getImagePath());
        }
        parent::delete();
    }
}