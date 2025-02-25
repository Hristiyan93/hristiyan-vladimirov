<?php

class Html_Tags{
    
    static function cyrillicToLatin($text){
        $cyr  = array('а','б','в','г','д','е','ж','з','и','й','к','л','м','н','о','п','р','с','т','у',
            'ф','х','ц','ч','ш','щ','ъ','ь', 'ю','я','А','Б','В','Г','Д','Е','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У',
            'Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ь', 'Ю','Я' );
        $lat = array( 'a','b','v','g','d','e','zh','z','i','y','k','l','m','n','o','p','r','s','t','u',
            'f' ,'h' ,'ts' ,'ch','sh' ,'sht' ,'a' ,'y' ,'yu' ,'ya','A','B','V','G','D','E','Zh',
            'Z','I','Y','K','L','M','N','O','P','R','S','T','U',
            'F' ,'H' ,'Ts' ,'Ch','Sh' ,'Sht' ,'A' ,'Y' ,'Yu' ,'Ya' );
        return str_replace($cyr, $lat, $text);
    }
    
    static function textToTag($text){
        $latin = self::cyrillicToLatin($text);
        $tag = preg_replace('/[^a-z]+/', '-', strtolower($latin));
        return trim($tag, '-');
    }
    
    static function tagFromTitle($table, $title, $id = 0){
        $tag = self::textToTag($title);
        $result = $tag;
        $tries = 1;
        $adapter = Zend_Db_Table::getDefaultAdapter();
        do{
            $select = $adapter->select()
                ->from($table)
                ->where('tag = ?', $result);
            if($id>0){
                $select->where('id <> ?', $id);
            }
        
            $rows = $adapter->fetchAll($select); 
            if(count($rows)){
                $tries++;
                $result = $tag . '-' . $tries;
            }else{
                break;
            }
        }while(true);
        return  $result;
    }
}