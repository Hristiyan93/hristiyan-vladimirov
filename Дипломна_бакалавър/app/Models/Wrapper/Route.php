<?php

class Models_Wrapper_Route extends Zend_Db_Table_Row implements Routes_NodeInterface{
    
    protected $_flights = array();
    protected $visited = array();
    
    protected $fromAirportName;
    protected $toAirportName;
    
    function setFlight($flight){
        $this->srcPort = $flight->srcPort;
        $this->departure = $flight->departure;
        $this->arrival = $flight->arrival;
        $this->flightId = $flight->id;
        
        $this->price = 0;
        $this->flightDuration = 0;
        $this->waitDuration = 0;
        $this->stops = 0;
        $this->_flights = array();
        $this->visited = array($flight->srcPort);

        $this->addFlight($flight);
    }
    
    protected function calculateWaitDuration($flight){
        $start = strtotime($this->arrival);
        $end = strtotime($flight->departure);
        return intval(abs($end-$start)/60);
    }
    
    public function addFlight($flight)
    {
        $this->visited[] = $this->dstPort = $flight->dstPort;
    
        $this->price += ($flight->adultPrice+$flight->infantPrice)/2;
        $this->flightDuration += $flight->duration;
        $this->waitDuration += $this->calculateWaitDuration($flight);
        $this->duration = $this->flightDuration+$this->waitDuration;
        $this->arrival = $flight->arrival;
    
        $this->stops++;
        $this->_flights[] = $flight->id;
        $this->flights = join(',', $this->_flights);
    }

    /**
     * {@inheritDoc}
     * @see \Routes\NodeInterface::shouldStop()
     */
    public function canAddChild($child)
    {
        return !in_array($child->dstPort, $this->visited);// && $this->stops<3 && $this->flightDuration+$child->duration <= 120;
    }
    
    /**
     * {@inheritDoc}
     * @see \Routes\NodeInterface::createPath()
     */
    public function createPath($child){
        $route = clone $this;
        $route->addFlight($child);
        return $route;
    }
    
    public function getSrcCity(){
        if(empty($this->fromAirportName)){
            $this->fromAirportName = Models_Airports::getCityName($this->srcPort);
        }
        return $this->fromAirportName;
    }
    
    public function getDstCity(){
        if(empty($this->toAirportName)){
            $this->toAirportName = Models_Airports::getCityName($this->dstPort);
        }
        return $this->toAirportName;
    }
}