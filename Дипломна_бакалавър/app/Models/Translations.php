<?php

class Models_Translations extends Zend_Db_Table{
    protected $_name = 'translations_errors';
    
    function addMissingKey($key){
        if(!$this->find($key)->current()){
            $this->insert(array(
                'translationKey' => $key 
            ));
        }
    }
}