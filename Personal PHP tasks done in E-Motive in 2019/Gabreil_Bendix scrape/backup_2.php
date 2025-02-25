<?php

$in_file = 'gabriel-images-urls.csv';
$out_file = 'results.csv';
$dir = "images-folder/"; 
//Prints the correct result
$fd = fopen($in_file, "r");

$new_array= array();

$csvdata=file_get_contents( $in_file );
$moddata=str_replace('media-pics','media-photos',$csvdata);

file_put_contents($in_file, $moddata );

$col = 2;//define start column
$start_row = 2;
$i = 2;//define row count flag
$j = 2; //define column count flag


while (($row = fgetcsv($fd)) !== FALSE) {
      
        $filename = $row[$col];
             $file_name = basename($filename);
             $new_array[] = [$row[0], $row[1], $file_name];
              if($i >= $start_row){
       // print_r($row[$col]);
         $filename = $row[$col];
    //echo $filename. "\n";
           $img=file_get_contents($filename);
   //print_r($img);
                $files = array($file_name);

           foreach($files as $file){
           
               
                 if (!file_exists($dir.$file)) {   
                   // set_time_limit(160);
                   file_put_contents($dir.$file, $img);
                }
             }

  
    }
 $i++;
}

 //Open the file for writing
 $fd = fopen($out_file, "w");
//$row = ['SKU', 'GUID', 'IMAGES'];
 foreach ($new_array as $row) {
//Put the result in the file
fputcsv($fd, $row);

 fclose($fd);

} 

?>




<?php

$in_file = 'gabriel-images-urls.csv';
$out_file = 'results.csv';
$dir = "images-folder/"; 
//Prints the correct result
$fd = fopen($in_file, "r");

$new_array= array();

$csvdata=file_get_contents( $in_file );
$moddata=str_replace('media-pics','media-photos',$csvdata);

file_put_contents($in_file, $moddata );

$col = 2;//define start column
$start_row = 2;
$start_col = 1; //define start row
$i = 1;//define row count flag
$j = 1; //define column count flag


while (($row = fgetcsv($fd)) !== FALSE) {
    if($i >= $start_row){
       // print_r($row[$col]);
         $filename = $row[$col];
    //echo $filename. "\n";
                    $files = array($filename);
                $img=file_get_contents($filename);   
           foreach($files as $file){
           
               
                 if (!file_exists($dir.$file)) {   
                    //set_time_limit(-1);
                   file_put_contents($dir.$file, $img);
                }
             }
         
   //print_r($img);
             $file_name = basename($filename);
             $new_array[] = [$row[0], $row[1], $file_name];
     

  
    }
 $i++;
}

 //Open the file for writing
 $fd = fopen($out_file, "w");
//$row = ['SKU', 'GUID', 'IMAGES'];
 foreach ($new_array as $row) {
//Put the result in the file
fputcsv($fd, $row);

 fclose($fd);

} 

?>

