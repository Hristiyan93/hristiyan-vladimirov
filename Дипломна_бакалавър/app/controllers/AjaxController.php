<?php

class AjaxController extends Zend_Controller_Action
{
    function getCityAction(){
        $term = $this->_getParam('term', '');
        $this->_helper->json(Models_Airports::findAirport($term));
    }
}
