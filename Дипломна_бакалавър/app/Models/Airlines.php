<?php

class Models_Airlines extends Models_Base{
    
    protected $_name = 'airlines';
    protected $_rowClass = 'Models_Wrapper_Airline';
    
    static function listCountries(){
        $select = self::getDefaultAdapter()->select()
            ->distinct(true)
            ->from('airlines', 'country')
            ->order('country ASC');
        return self::getDefaultAdapter()->fetchCol($select);
    }
    
    static function listItemsByCountry(){
        $result = array();
        $countries = self::listCountries();
        $adapter = self::getDefaultAdapter();
        
        foreach($countries as $country){
            $select = $adapter->select()
                ->from('airlines', array('id', new Zend_Db_Expr('CONCAT(name," (",icao,")")')))
                ->order('name ASC')
                ->where('country = ?', $country);
            $result[$country] = $adapter->fetchPairs($select);
        }
        
        return $result;
    }
    
}