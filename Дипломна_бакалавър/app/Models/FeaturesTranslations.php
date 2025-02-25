<?php

class Models_FeaturesTranslations extends Models_Base{
    protected $_name = "features_translations";
    
    protected $_referenceMap = array(
        'Features' => array(
            'columns' => array('featureId'),
            'refTableClass' => 'Models_Features',
            'refColumns' => array('id'),
            'onDelete' => self::CASCADE
        )
    );
    
}