<?php

$in_file = 'gabriel-images-urls.csv';
$out_file = 'results.csv';
$dir = "images-folder/"; 
//Prints the correct result
$fd = fopen($in_file, "r");
$start_row = 2;
$i = 2;
$new_array[]= array();

$csvdata=file_get_contents( $in_file );
$moddata=str_replace('media-pics','media-photos',$csvdata);

file_put_contents($in_file, $moddata );

while (($row = fgetcsv($fd)) !== FALSE) {

    for ($col=3; $col<=12; $col++) {         
      $row[] = $row[$col];
    }

      //  print_r($row);
       // var_dump($row);
        if($i >= $start_row){
   $filename=$row[$col];
    //echo $filename. "\n";
         set_time_limit(12000);
          $img=file_get_contents($filename);
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
}
$i++;
}

$new_array[] = [$row[0], $row[1],$file_name];
 //array_push($new_array, $row[0], $row[1],$file_name, $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);

//print_r($new_array);


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