<?php

class Zend_View_Helper_Duration extends Zend_View_Helper_Abstract{

    function duration($minutes, $extended = false){
        $h = intval($minutes / 60);
        $m = intval($minutes % 60);
        if(!$extended){
            $result = sprintf('%u:%02u', $h, $m);
        }else{
            $result = sprintf('%u %s', $h, $h>1?$ht = $this->view->translate('hours'):$ht = $this->view->translate('hour'));
            if($m>0){
                $result .= sprintf(', %02u %s', $m, $this->view->translate('minutes'));
            }
        }
        return $result; 
    }
}