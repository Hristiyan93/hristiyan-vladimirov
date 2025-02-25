<?php

class Zend_View_Helper_JsonAutocompleteList extends Zend_View_Helper_Abstract 
{

    function jsonAutocompleteList($list)
    {
        $result = array();
        foreach($list as $item){
            $result[] = "{label:'{$item}'}";
        }
        return join(",\n", $result);
    }
}