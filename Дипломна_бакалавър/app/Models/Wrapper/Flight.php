<?php

class Models_Wrapper_Flight extends Zend_Db_Table_Row{
    
    protected $airline;
    
    function setTranslation($translation){
        $translation['flightId'] = $this->id;
        $model = new Models_FlightsTranslations();
        $model->saveItem($translation);
    }
    
    function setFeatures($features){
        $model = new Models_FlightsFeatures();
        $model->setFeatures($this->id, $features);
    }
    
    function hasImage(){
        return file_exists($this->getImagePath());
    }
    
    function getImagePath(){
        return ROOT_PATH.'/www/images/flights/' . $this->id . '.png';
    }
    
    function getImageUrl(){
        return '/images/flights/' . $this->id . '.png';
    }
    
    function uploadPicture($file){
    
        $images = new Models_Images();
    
        $image = $images->receiveFile($file);
        if(!empty($image)){
            $image->save($this->getImagePath(), 870, 530);
            $image->delete();
        }
    }
    
    function _delete(){
        if($this->hasImage()){
            unlink($this->getImagePath());
        }
    }
    
    function _postInsert(){
        $this->updateRoutes();
    }
    
    function _postUpdate(){
        $this->updateRoutes();
    }
    
    function _postDelete(){
        $this->updateRoutes();
    }
    
    private function updateRoutes(){
        $model = new Models_Routes();
        $model->updateAllRoutes();
    }
    
    public function getAirline(){
        if(empty($this->airline)){
            $model = new Models_Airlines();
            $this->airline = $model->find($this->airlineId)->current();
        }
        return !empty($this->airline)?$this->airline->name:'[no name]';
    }
    
    public function getTranslation($locale){
        $model = new Models_FlightsTranslations();
        return $model->getTranslation($this->id, $locale);
    }
}