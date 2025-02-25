<?php

class Models_Flights extends Models_Base implements Routes_NodesResolverInterface{ 
    protected $_name = 'flights';
    
    protected $_dependentTables = array('Models_FlightsTranslations', 'Models_FlightsFeatures');
    protected $_rowClass = 'Models_Wrapper_Flight';
    
    const FLIGHT_TYPE_BUSINESS = 'business';
    const FLIGHT_TYPE_FIRST = 'first class';
    const FLIGHT_TYPE_ECONOMY = 'economy';
    const FLIGHT_TYPE_PREMIUM = 'premium';
    
    public static $flightTypes = array(
            self::FLIGHT_TYPE_BUSINESS => 'Business',
            self::FLIGHT_TYPE_FIRST => 'First Class',
            self::FLIGHT_TYPE_ECONOMY => 'Economy',
            self::FLIGHT_TYPE_PREMIUM => 'Premium'
    );
    
    function listItems(){
        $select = $this->select()
            ->setIntegrityCheck(false)
            ->from(array('a' => $this->_name), array('id', 'flightNo' => 'name', 'departure', 'duration', 'arrival'))
            ->join(array('b' => 'airlines'), 'a.airlineId = b.id', array('airline' => 'name'))
            ->join(array('c' => 'airports'), 'a.srcPort = c.id', array('source' => new Zend_Db_Expr('CONCAT(c.name,"(",c.icao,") ",c.city,"/",c.country)')))
            ->join(array('d' => 'airports'), 'a.dstPort = d.id', array('dest' => new Zend_Db_Expr('CONCAT(d.name,"(",d.icao,") ",d.city,"/",d.country)')));
        return $this->fetchAll($select);
    }
    
    function getFlightsFrom($port, $date){
        $select = $this->select()
            ->where('srcPort = ?', $port)
            ->where('departure > ?', $date);
        return $this->fetchAll($select);
    }
    
    /**
     * {@inheritDoc}
     * @see \Routes\NodesResolverInterface::getNeighbor()
     */
    public function getNeighbor(Routes_NodeInterface $node)
    {
        return $this->getFlightsFrom($node->dstPort, $node->arrival);        
    }
    
}