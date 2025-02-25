<?php

class Models_FlightsFeatures extends Models_Base{
    protected $_name = 'flight_features';
    
    protected $_referenceMap = array(
        'Flights' => array(
            'columns' => array('flightId'),
            'refTableClass' => 'Models_Flights',
            'refColumns' => array('id'),
            'onDelete' => self::CASCADE
        )
    );
    
    function setFeatures($flightId, $features){
        $this->delete($this->select()->where('flightId = ?', $flightId)->getPart(Zend_Db_Table_Select::WHERE));
        foreach($features as $featureId){
            $this->insert(array(
                    'flightId' => $flightId,
                    'featureId' => $featureId
            ));
        }
    }
    
    static function getFlightFeatures($flightId, $maxFeatures = false){
        $select = self::getDefaultAdapter()->select()
            ->from(array('a' => 'features'), 'symbol')
            ->join(array('b' => 'flight_features'), 'b.featureId = a.id', array())
            ->where('b.flightId = ?', $flightId);
        if($maxFeatures){
            $select->limit($maxFeatures);
        }
        return self::getDefaultAdapter()->fetchCol($select);
    }
}