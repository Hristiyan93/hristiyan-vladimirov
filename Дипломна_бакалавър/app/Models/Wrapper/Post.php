<?php

class Models_Wrapper_Post extends Zend_Db_Table_Row{
    
    const IMAGE_TYPE_NORMAL = 'big';
    const IMAGE_TYPE_THUMB = 'thumb';
    
    function getAuthor(){
        $model = new Models_Users();
        return $model->findItem($this->authorId);
    }
    
    function hasImage($type = self::IMAGE_TYPE_NORMAL){
        return file_exists($this->getImagePath($type));
    }
    
    function getImagePath($type = self::IMAGE_TYPE_NORMAL){
        return ROOT_PATH.'/www/images/posts/' . $this->id . '-' . $type . '.png';
    }
    
    function getImageUrl($type = self::IMAGE_TYPE_NORMAL){
        return '/images/posts/' . $this->id . '-' . $type . '.png';
    }
    
    function uploadPicture($file){
        $images = new Models_Images();
        $image = $images->receiveFile($file);
        if(!empty($image)){
            $image->save($this->getImagePath(self::IMAGE_TYPE_NORMAL), 870, 342);
            $image->save($this->getImagePath(self::IMAGE_TYPE_THUMB), 63, 63);
            $image->delete();
        }
    }
    
    function _delete(){
        if($this->hasImage()){
            unlink($this->getImagePath());
        }
    }
}