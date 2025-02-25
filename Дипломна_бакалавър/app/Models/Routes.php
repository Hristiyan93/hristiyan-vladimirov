<?php

class Models_Routes extends Zend_Db_Table{
    protected $_name = 'routes';
    protected $_rowClass = 'Models_Wrapper_Route';
    
    function createRoute($flight){
        $route = $this->createRow();
        $route->setFlight($flight);
        return $route;
    }
    
    function updateAllRoutes(){
        
        $modelAirports = new Models_Airports();
        $airports = $modelAirports->fetchAll();
        
        $model = new Models_Flights();
        
        $builder = new Routes_Builder($model);
        
        $this->delete('');
        
        foreach($airports as $airport){
            $flights = $model->getFlightsFrom($airport->id, time());
            foreach($flights as $flight){
                $routes = $builder->build($this->createRoute($flight));
                foreach($routes as $route){
                    $route->save();
                }
            }
        }
    }
    
    static function listAllRoutes(){ 
        $select = self::getDefaultAdapter()->select()
            ->from(array('route' => 'routes'), array('id', 'price', 'departure', 'arrival', 'stops', 'route.duration'))
            ->join(array('src' => 'airports'), 'src.id = route.srcPort', array('src' => new Zend_Db_Expr('CONCAT(src.name," @ ",src.city,"/",src.country)'), 'srcCity' => 'city'))
            ->join(array('dst' => 'airports'), 'dst.id = route.dstPort', array('dst' => new Zend_Db_Expr('CONCAT(dst.name," @ ",dst.city,"/",dst.country)'), 'dstCity' => 'city'))
            ->join(array('flight' => 'flights'), 'route.flightId = flight.id', array('flightNo' => 'flight.name'))
            ->join(array('lines' => 'airlines'), 'flight.airlineId = lines.id', array('airline' => 'lines.name', 'airlineId' => 'id'));
        return self::getDefaultAdapter()->fetchAll($select);
    }
    
    protected function buildSearchSelect($search){
        $select = $this->getAdapter()->select()
            ->from(array('r' => 'routes'))
            ->join(array('src' => 'airports'), 'r.srcPort = src.id', array('src' => 'src.city'))
            ->join(array('dst' => 'airports'), 'r.dstPort = dst.id', array('dst' => 'dst.city'))
            ->join(array('fl' => 'flights'), 'r.flightId = fl.id', array('flightType'))
            ->join(array('al' => 'airlines'), 'fl.airlineId = al.id', array('airline' => 'name', 'airlineId' => 'id'));
        if(!empty($search['from'])){
            $select->where('src.name LIKE ? OR src.city LIKE ? OR src.country LIKE ?', $search['from'] . '%');
        }
        if(!empty($search['to'])){
            $select->where('dst.name LIKE ? OR dst.city LIKE ? OR dst.country LIKE ?', $search['to'] . '%');
        }
        if(!empty($search['departure'])){
            $select->where('DATE(r.departure) > ?', date('Y-m-d', $search['departure']));
        }
        if(!empty($search['arrival'])){
            $select->where('DATE(r.arrival) > ?', date('Y-m-d', $search['arrival']));
        }
        return $select;
    }
    
    function initFilters($locale, $search){
        $filters = array();
        $select = $this->buildSearchSelect($search)
            ->distinct(true)
            ->reset(Zend_Db_Select::COLUMNS)
            ->columns(array(
                'price-min' => new Zend_Db_Expr('MIN(price)'), 
                'price-max' => new Zend_Db_Expr('MAX(price)'),
                'time-min' => new Zend_Db_Expr('MIN(flightDuration+waitDuration)'),
                'time-max' => new Zend_Db_Expr('MAX(flightDuration+waitDuration)')
            ));
        $filters = $this->getAdapter()->fetchRow($select);
        
        $select->reset(Zend_Db_Select::COLUMNS)
            ->reset(Zend_Db_Select::ORDER)
            ->columns(array('stops', 'stops'))
            ->order('stops');
        $filters['stops'] = $this->getAdapter()->fetchPairs($select);
        
        $select->reset(Zend_Db_Select::COLUMNS)
            ->reset(Zend_Db_Select::ORDER)
            ->columns(array('al.id', 'al.name'))
            ->order('al.name');
        $filters['airlines'] = $this->getAdapter()->fetchPairs($select);

        $select->reset(Zend_Db_Select::COLUMNS)
            ->reset(Zend_Db_Select::ORDER)
            ->columns(array('fl.flightType', 'fl.flightType'));
        $filters['types'] = $this->getAdapter()->fetchPairs($select);

        $select->reset(Zend_Db_Select::COLUMNS)
            ->reset(Zend_Db_Select::ORDER)
            ->join(array('ff' => 'flight_features'), 'ff.flightId = r.flightId', array())
            ->join(array('f' => 'features'), 'f.id = ff.featureId', 'f.id')
            ->join(array('ft' => 'features_translations'), 'ft.featureId = f.id', 'ft.name')
            ->where('ft.locale = ?', $locale)
            ->order('ft.name');
        $filters['features'] = $this->getAdapter()->fetchPairs($select);
        
        $filters['sort'] = array('price' => 'price', 'duration' => 'duration');
        $filters['view'] = 'list';
        
        return $filters;
    }
    
    function getResults($search, $prefs = array()){
        $select = $this->buildSearchSelect($search);
        
        if(!empty($prefs['price-max'])){
            $select->where('r.price<= ?', $prefs['price-max']);
        }
        
        if(!empty($prefs['price-min'])){
            $select->where('r.price>= ?', $prefs['price-min']);
        }
        
        if(!empty($prefs['time-max'])){
            $select->where('r.duration<= ?', $prefs['time-max']);
        }
        
        if(!empty($prefs['time-min'])){
            $select->where('r.duration>= ?', $prefs['time-min']);
        }
        
        if(!empty($prefs['stops'])){
            $select->where('r.stops IN (?)', $prefs['stops']);
        }
        
        if(!empty($prefs['airlines'])){
            $select->where('al.id IN (?)', array_keys($prefs['airlines']));
        }
        
        if(!empty($prefs['types'])){
            $select->where('flightType IN (?)', $prefs['types']);
        }
        
        if(!empty($prefs['features'])){
            $featureSelect = $this->getAdapter()->select()
                ->from('flight_features', 'flightId')
                ->where('featureId IN (?)', array_keys($prefs['features']));
            
            $select->where('r.flightId IN (?)', new Zend_Db_Expr($featureSelect->__toString()));
        }
        
        if(!empty($prefs['sort'])){
            foreach($prefs['sort'] as $sort){
                $select->order($sort);
            }
        }

        return $this->getAdapter()->fetchAll($select);        
    }
    
}