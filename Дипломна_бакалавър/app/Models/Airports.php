<?php

class Models_Airports extends Models_Base{
    protected $_name = 'airports';
    
    static function listCountries(){
        $select = self::getDefaultAdapter()->select()
            ->distinct(true)
            ->from('airports', 'country')
            ->order('country ASC');
        return self::getDefaultAdapter()->fetchCol($select);
    }
    
    static function listItemsByCountry(){
        $result = array();
        $countries = self::listCountries();
        $adapter = self::getDefaultAdapter();
    
        foreach($countries as $country){
            $select = $adapter->select()
                ->from('airports', array('id', new Zend_Db_Expr('CONCAT(name," (",icao,")")')))
                ->order('name ASC')
                ->where('country = ?', $country);
            $result[$country] = $adapter->fetchPairs($select);
        }
    
        return $result;
    }
    
    static function findAirport($term){
        $select = self::getDefaultAdapter()->select()
            ->from('airports', array('id', 'value' => 'city', 'label' => new Zend_Db_Expr('CONCAT(city," / ",country," (",name," ",icao,")")')))
            ->where('name LIKE ?', $term . '%')
            ->orWhere('city like ?', $term . '%')
            ->orWhere('country like ?', $term . '%');
        return self::getDefaultAdapter()->fetchAll($select);
    }
    
    static function getCityName($id){
        $select = self::getDefaultAdapter()->select()
            ->from('airports', 'city')
            ->where('id = ?', $id);
        return self::getDefaultAdapter()->fetchOne($select);
    }
}