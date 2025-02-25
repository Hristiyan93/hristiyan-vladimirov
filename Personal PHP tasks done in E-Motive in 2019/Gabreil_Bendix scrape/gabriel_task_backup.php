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

//while($url = $response->fetch()) {

$col = 2;
$start_row = 2; //define start row
$i = 1; //define row count flag
while (($row = fgetcsv($fd)) !== FALSE) {
    if($i >= $start_row) {
       // print_r($row[$col]);
         $filename = $row[$col];
    //echo $filename. "\n";
           $img=file_get_contents($filename);
   //print_r($img);
             $file_name = basename($filename, ".php");
      $files = array($file_name);
           foreach($files as $file){
    file_put_contents($dir.$file, $img);
}
   //file_put_contents($dir.'image.jpg', $img);
    }
    $i++;
}


/*while ($data = fgetcsv($fd)) {
if(!empty($data)){
$num = count($data);
       // echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            //echo $data[$c] . "<br />\n";
   // $filename = $data[c];
   // echo $filename. "\n";
  }
   $img=file_get_contents($data[c]);
  // print_r($img);
   file_put_contents($dir, $img);*/
   //copy($filename, $dir . DIRECTORY_SEPARATOR);
 /*if (!is_dir($destdir)) {
  // dir doesn't exist, create it
  mkdir($destdir);

}*/
//$img=saveFile($filename,$data);
//print_r($img);
//}
//}

/*function saveFile($filename,$filecontent){
    if (strlen($filename)>0){
        $destdir = 'images-folder/';
        if (!file_exists($destdir)) {
            mkdir($destdir);
        }
        $file = fopen($destdir . DIRECTORY_SEPARATOR . $filename,"w");
        if ($file != false){
            fwrite($file,$filecontent);
            fclose($file);
           // return 1;
        }
        //return -2;
    }
    return -1;
}

*/
function file_get_contents_curl($url) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
curl_setopt($ch, CURLOPT_URL, $url);
//set_time_limit(60);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}

while ($data = fgetcsv($fd)) {
	echo '<pre>';
	/*if (strpos($data[2],'media-pics') !== false) {
 
 	 $data[2]=str_replace('media-pics','media-photos',$data[2]);
     fputcsv($fd, $data);
   // echo $output;*/
     /*
  $file_name = basename($data[2], ".php");
     //print_r($file_name;"\n";  
 	 array_push($new_array, $data, $file_name);
    
 //  print_r($new_array);

 }
  
   
 fclose($fd);
 //Open the file for writing
 $fd = fopen($out_file, "w");
//$out_file = ['SKU', 'GUID', 'IMAGES'];
 foreach ($new_array as $row) {
//Put the result in the file
 fputcsv($fd, $row);

 fclose($fd);
 */
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
           $img=file_get_contents($filename);
   //print_r($img);
             $file_name = basename($filename, ".php");

      $files = array($file_name);

           foreach($files as $file){
           
              set_time_limit(160);
               if (!file_exists($dir.$file)) {   
              file_put_contents($dir.$file, $img);          
}

}
  //  $j++;

$new_array[] = [$row[0], $row[1],$file_name];
  
}
}



  while (($row = fgetcsv($fd)) !== FALSE) {
     if($i >= $start_row){
    for ($col=0; $col<=12; $col++) {
    echo '<pre>';
      $csv_data = $row[$col];
       //  print_r($csv_data);
    }
    if(!empty($csv_data)){
      $content=file_get_contents($csv_data);
    }
         $new_array[] = [$row[0], $row[1],$file_name];
   //print_r($content);
  $new_data = basename($content, ".php");
    // print_r($file_name);"\n";  
   array_push($new_array,  $new_data);
    
   print_r($new_array);

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

