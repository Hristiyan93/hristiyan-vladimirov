<?php
$in_file = 'gabriel-images-urls.csv';
$out_file = 'results.csv';
$dir = "images-folder/media1"; 
//Prints the correct result
$fd = fopen($in_file, "r");

$new_array= array();

$csvdata=file_get_contents( $in_file );
$moddata=str_replace('media-pics','media-photos',$csvdata);

file_put_contents($in_file, $moddata );

//while($url = $response->fetch()) {
while ($data = fgetcsv($fd)) {
if(!empty($data)){

    $filename = $data[2];
    echo $filename. "\n";
   $img=file_get_contents($filename);
  // print_r($img);
   file_put_contents($dir, $img);
   //copy($filename, $dir . DIRECTORY_SEPARATOR);
 /*if (!is_dir($destdir)) {
  // dir doesn't exist, create it
  mkdir($destdir);

}*/
//$img=saveFile($filename,$data);
//print_r($img);
}
}

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
 	 array_push($new_array, $data);
    
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
