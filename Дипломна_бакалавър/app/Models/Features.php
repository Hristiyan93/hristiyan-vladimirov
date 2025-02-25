<?php

class Models_Features extends Models_Base{
    protected $_name = 'features';
    
    protected $_dependentTables = array('Models_FeaturesTranslations');
    
    function listItems($locale){
        $select = $this->select()
            ->setIntegrityCheck(false)
            ->from(array('a' => $this->_name), array('id', 'symbol'))
            ->join(array('b' => 'features_translations'), 'a.id = b.featureId', 'name')
            ->where('b.locale = ?', $locale);
        return $this->fetchAll($select);
    }
}