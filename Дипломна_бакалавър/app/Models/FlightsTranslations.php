<?php

class Models_FlightsTranslations extends Models_Base{
    protected $_name = "flight_translations";
    
    protected $_referenceMap = array(
        'Flights' => array(
            'columns' => array('flightId'),
            'refTableClass' => 'Models_Flights',
            'refColumns' => array('id'),
            'onDelete' => self::CASCADE
        )
    );
    
    function getTranslation($flightId, $locale){
        $translation = $this->fetchRow($this->select()->where('flightId = ?', $flightId)->where('locale = ?', $locale));
        if(!$translation){
            $translation = $this->createRow();
        }
        return $translation;
    }
}