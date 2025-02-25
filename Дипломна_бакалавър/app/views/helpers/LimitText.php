<?php

class Zend_View_Helper_LimitText extends Zend_View_Helper_Abstract 
{
    function limitText($what, $limit)
    {
        $what = strip_tags($what);
        if(strlen($what)>$limit){
            $what = substr($what, 0, $limit) . '...';
        }
        return $what;
    }
}