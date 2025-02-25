<?php

class Zend_View_Helper_ShowRate extends Zend_View_Helper_Abstract{
    
    function showRate($rating){
        $html = '';
        
        if($rating>0)
        for($i=0;$i<5;$i++):
            $html .= '<div class="star';
            if($rating>$i)$html .= " active";
            $html .= '"></div>';
        endfor;
        
        return $html;
    }
}