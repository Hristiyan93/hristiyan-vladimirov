<?php


class Admin_FlightsController extends Zend_Controller_Action{
    /**
     * @var Models_Flights
     */
    protected $model;
    
    function init(){
        $this->model = new Models_Flights();
    }
    
    function indexAction(){
        $this->view->items = $this->model->listItems(Models_Locale::getCurrentLocale());
    }
    
    function addAction(){
        $this->view->row = $this->model->findItem($this->_getParam('id'), array('departure' => date('Y-m-d H:i'), 'arrival' => date('Y-m-d H:i')));
        $featureModel = new Models_Features();
        $this->view->features = $featureModel->listItems(Models_Locale::getCurrentLocale());
    }
    
    function saveAction(){
        if($this->getRequest()->isPost()){
            $flightInfo = $this->_getParam('item', array());
            $departure = strtotime($flightInfo['departure']['date'] . ' ' . $flightInfo['departure']['time']);
            $flightInfo['departure'] = date('Y-m-d H:i', $departure);
            $arrival = strtotime($flightInfo['arrival']['date'] . ' ' . $flightInfo['arrival']['time']);
            $flightInfo['arrival'] = date('Y-m-d H:i', $arrival);
            $flightInfo['duration'] = ($arrival - $departure)/60;
            $flightInfo['availableSeats'] = $flightInfo['seats'];
            $flight = $this->model->saveItem($flightInfo);
            $flight->uploadPicture('photo');

            //Update Translations
            foreach($this->_getParam('translations') as $translation){
                $flight->setTranslation($translation);
            }
            
            //Update Features
            $features = $this->_getParam('features', array());
            $flight->setFeatures(array_filter($features, function($el){
                return !empty($el);
            }));
        }
        $this->_helper->redirector('index');
    }
    
    function deleteTranslationAction(){
        $model = new Models_FlightsTranslations();
        $item = $model->find($this->_getParam('translation'))->current();
        if(!empty($item)){
            $item->delete();
        }
        $this->_helper->json(array('status' => true));
    }
    
    function deleteAction(){
        $itemId = $this->_getParam('itemId');
        $item = $this->model->find($itemId)->current();
        if(!empty($item)){
            $item->delete();
        }
        $this->_helper->redirector('index');
    }
}