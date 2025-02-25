<?php

$in_file = 'gabriel-images-urls.csv';
$out_file = 'results.csv';
$dir = "images-folder2/"; 

$fd = fopen($in_file, "r");

$new_array= array();
$csvdata=file_get_contents( $in_file );
$moddata=str_replace('media-pics','media-photos',$csvdata);

file_put_contents($in_file, $moddata );

$fd = fopen($in_file, "r");
$new_array= array();
$i=0;
while (($row = fgetcsv($fd)) !== FALSE)
{
    if($i!=0)
    {
        $url_array = array();
        for ($col=2; $col<=11; $col++) 
        {
            if(isset($row[$col]) && trim($row[$col])!=null)
            {
                $url = $row[$col];

                $url_array[]= basename($url);
            }

        }

        $new_array[] = array($row[0],$row[1],implode($url_array,', '));
    }
    else if($i==0)
    {
        $i++;
    }
}
//echo '<pre>';
//print_r($new_array);
//echo '</pre>';
    if(!empty($url) && (isset($url))){

      $url_img=file_get_contents($url);
    
      $url_name = basename($url);
    }
    

      $files=array($url_name);

           foreach($files as $file){
               if (!file_exists($dir.$file)) {   
                  file_put_contents($dir.$file, $url_img);
                                                   
               }
               else{
                continue;
               }
             }
             

                    
 //Open the file for writing
$fd = fopen($out_file, "w");
$headers = ["SKU", "GUID", "IMAGES"];
fputcsv($fd, $headers);
 foreach ($new_array as $row) {
//Put the result in the file
fputcsv($fd, $row);

}
fclose($fd);
  
      
?>