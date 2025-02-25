<?php

class Zend_View_Helper_JoinList extends Zend_View_Helper_Abstract 
{

    function joinList($list, $field, $separator = ', ')
    {
        $result = array();
        foreach($list as $item){
            if(isset($item[$field])){
                $result[] = $item[$field];
            }
        }
        return join($separator, $result);
    }
}