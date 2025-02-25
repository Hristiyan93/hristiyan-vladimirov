<?php

class Zend_View_Helper_ShowImage extends Zend_View_Helper_Abstract{

    function showImage($type, $id, $width, $height){
        $path = ROOT_PATH."/www/images/{$type}/{$id}.png";
        if(file_exists($path)){
            return "/images/{$type}/{$id}.png";
        }
        return "http://placehold.it/{$width}x{$height}"; 
    }
}