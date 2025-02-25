<?php

class Models_SearchPrefs{
    
    protected $search = false;
    protected $searchKey = false;
    
    protected $filters = false;
    protected $prefs = false;
    
    protected $hasBeenChanged = false;
    protected $session = false;
    
    protected function getSession(){
        if(empty($this->session)){
            $this->session = new Zend_Session_Namespace();
        }
        return $this->session;
    }
    
    protected function calculateSearchKey($data){
        $result = array();
        foreach($data as $key => $value){
            $result[] = "{$key}:{$value}";
        }
        $plain = implode(";", $result);
        return md5($plain);
    }
    
    protected function loadSearch(){
        $session = $this->getSession();
        $this->search = $session->search;
        $this->searchKey = $session->searchKey;
        $this->hasBeenChanged = false;
        return !empty($this->searchKey);
    }
    
    public function getSearch(){
        if(empty($this->search)){
            if(!$this->loadSearch()){
                $this->saveSearch($this->initSearch());
            }
        }
        return $this->search;
    }
    
    public function saveSearch($data){
        $newSearchKey = $this->calculateSearchKey($data);
        if($this->searchKey!=$newSearchKey){
            $this->search = $data;
            $this->searchKey = $newSearchKey;
            $this->hasBeenChanged = true;
    
            $session = $this->getSession();
            $session->unsetAll();
            $session->search = $this->search;
            $session->searchKey = $this->searchKey;
        }
    }
    
    protected function loadFilters(){
        $session = $this->getSession();
        $this->filters = $session->filters;
        return !empty($this->filters);
    }
    
    public function saveFilters($data = array()){
        $this->filters = $data;
        $this->savePrefs($data);
        
        $session = $this->getSession();
        $session->filters = $this->filters;
    }
    
    public function getFilters(){
        if(empty($this->filters)){
            if(!$this->loadFilters()){
                $this->filters = $this->initFilters();
            }
        }
        return $this->filters;
    }
    
    protected function loadPrefs(){
        $session = $this->getSession();
        $this->prefs = $session->prefs;
        return !empty($this->prefs);
    }
    
    public function savePrefs($data = array()){
        $this->prefs = $data;
    
        $session = $this->getSession();
        $session->prefs = $this->prefs;
    }
    
    public function setPrefs($prefId, $value){
        $prefs = $this->getPrefs();
        $prefs[$prefId] = $value;
        $this->savePrefs($prefs);
    }
    
    public function togglePrefs($prefId, $value){
        $prefs = $this->getPrefs();
        if(isset($prefs[$prefId][$value])){
            unset($prefs[$prefId][$value]);
        }else{
            $filters = $this->getFilters();
            if(isset($filters[$prefId][$value])){
                $prefs[$prefId][$value] = $filters[$prefId][$value];
            }
        }
        $this->savePrefs($prefs);
    }
    
    public function getPrefs(){
        if(empty($this->prefs)){
            if(!$this->loadPrefs()){
                $this->prefs = $this->initPrefs();
            }
        }
        return $this->prefs;
    }
    
    private function initFilters(){
        return array(
            'price-min' => 0,
            'price-max' => 0,
            'time-min' => 0,
            'time-max' => 0,
            'stops' => array(),
            'airlines' => array(),
            'types' => array(),
            'features' => array()
        );
    }
    
    private function initPrefs(){
        return array(
            'price-min' => 0,
            'price-max' => 0,
            'time-min' => 0,
            'time-max' => 0,
            'stops' => array(),
            'airlines' => array(),
            'types' => array(),
            'features' => array(),
            'sort' => array()
        );
    }
    
    private function initSearch(){
        return array(
            'departure' => false,
            'arrival' => false,
            //'departure-time' => 0,
            //'arrival-time' => 0,
            'from' => false,
            'to' => false,
            //'adults' => 1,
            //'kids' => 0,
            //'infants' => 0
        );
    }
    
    public function hasBeenChanged(){
        return $this->hasBeenChanged;
    }
    
}