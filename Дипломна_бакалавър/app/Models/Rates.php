<?php

class Models_Rates extends Zend_Db_Table{
    protected $_name = 'rates';
    
    static $currency = false;
    static $rate = false;
    
    static function listCurrencies(){
        $select = self::getDefaultAdapter()->select()
            ->from('rates', 'currency')
            ->order('currency');
        return self::getDefaultAdapter()->fetchCol($select);
    }
    
    static function getDbDefault(){
        $select = self::getDefaultAdapter()->select()
            ->from('rates')
            ->limit(1)
            ->order('isDefault DESC');
        return self::getDefaultAdapter()->fetchRow($select);
    }
    
    static function getRate($currency){
        $select = self::getDefaultAdapter()->select()
            ->from('rates')
            ->where('currency = ?', $currency);
        return self::getDefaultAdapter()->fetchRow($select);
    }
    
    static function getCurrentCurrency(){
        if(empty(self::$currency)){
            self::$currency = Zend_Registry::get('session')->currency;
            if(empty(self::$currency)){
                self::$currency = self::getDbDefault();
                Zend_Registry::get('session')->currency = self::$currency;
            }
        }
        return self::$currency;
    }
    
    static function setCurrency($currency){
        Zend_Registry::get('session')->currency = $currency;
    }
}