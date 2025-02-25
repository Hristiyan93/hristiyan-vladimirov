<?php

class Zend_View_Helper_YearSelect extends Zend_View_Helper_Abstract{

    function yearSelect($name, $value = null, $attribs = array(), $maxYears = 5){
        $data = array();
        for($i=0;$i<$maxYears;$i++){
            $year = date('Y')+$i;
            $data[$year] = $year;
        }
        return $this->view->formSelect($name, $value, $attribs, $data);
    }
}