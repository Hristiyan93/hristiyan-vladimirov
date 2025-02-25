<?php

$in_file = 'gabriel-images-urls.csv';
$out_file = 'results.csv';
$dir = "images-folder/"; 
//Prints the correct result
$fd = fopen($in_file, "r");

$new_array[]= array();

$csvdata=file_get_contents( $in_file );
$moddata=str_replace('media-pics','media-photos',$csvdata);

file_put_contents($in_file, $moddata );

$col = 2;//define start column
$start_row = 2;
$start_col = 1; //define start row
$i = 1;//define row count flag
$j = 1; //define column count flag

while (($row = fgetcsv($fd)) !== FALSE) {

    /*for ($col=1; $col<=12; $col++) {         
      $row[] = $row[$col];
    }*/
    if($i >= $start_row){
       // print_r($row[$col]);
         $filename = $row[3];
    //echo $filename. "\n";
       //  set_time_limit(12000);
          // $img=file_get_contents($filename);
   //print_r($img);
             $file_name = basename($filename);

      $files = array($file_name);

           foreach($files as $file){
           
               if (!file_exists($dir.$file)) {   
                  file_put_contents($dir.$file, $img);          
               }
               else{
                continue;
               }

}
$new_array[] = [$row[0], $row[1],$file_name, $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]];
 //array_push($new_array, $row[0], $row[1],$file_name, $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);
}
//print_r($new_array);

  $i++;
}
//print_r($new_array);
//$new_array[] = [$row[0], $row[1],$file_name];
  


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