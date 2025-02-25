<?php

class Models_Locale{
    /**
     * @var Zend_Translate_Adapter
     */
    protected $adapter;
    
    static $locale = false;
    
    function __construct(Zend_Translate $translate = NULL){
        $this->setTranslate($translate);    
    }
    
    function setTranslate($translate){
        if($translate==NULL){
            $translate = Zend_Registry::get('Zend_Translate');
        }
        $this->adapter = $translate->getAdapter();
    }
    
    function listLocales(){
        $result = array();
        foreach($this->adapter->getList() as $key => $value){
            $list = Zend_Locale::getTranslationList('language', $key);
            $result[$key] = $list[$key];
        }
        return $result;
    }
    
    static function getCurrentLocale(){
        if(empty(self::$locale)){
            self::$locale = Zend_Registry::get('Zend_Translate')->getLocale(); 
        }
        return self::$locale;
    }
    
    static function setCurrentLocale($locale){
        $translate = Zend_Registry::get('Zend_Translate');
        if(!$translate->isAvailable($locale)){
            $locale = $translate->getLocale();
        }
        $translate->getAdapter()->setLocale($locale);
        Zend_Registry::get('session')->locale = $locale;
    }
    
   static function getSupportedLanguagesList($removeLocale = false, $locale = false){
       
       if(!$locale)$locale = Models_Locale::getCurrentLocale();
       
       $translate = Zend_Registry::get('Zend_Translate');
       $languages = $translate->getList();
       $list = Zend_Locale::getTranslationList('language', $locale);
       $result = array();
       foreach($languages as $locale){
           if($locale===$removeLocale)continue;
           $result[$locale] = $list[$locale];
       }
       return $result;
   }
   
   static function getLocaleName($locale){
       $translate = Zend_Registry::get('Zend_Translate');
       $languages = $translate->getList();
       $list = Zend_Locale::getTranslationList('language', Models_Locale::getCurrentLocale());
       return isset($list[$locale])?$list[$locale]:'[unknown]';
   }
}