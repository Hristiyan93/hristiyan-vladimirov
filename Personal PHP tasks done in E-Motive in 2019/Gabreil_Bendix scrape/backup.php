<?php
$in_file = 'gabriel-images-urls.csv';
$out_file = 'results.csv';


//Prints the correct result
$fd = fopen($in_file, "r");
$destination = 'downloaded_images/';
$new_array= array();
//$uri=$data;
    //while ($data = fgetcsv($fd)) {
    	//if(preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$uri)){
    $path = 'https://assets.suredone.com/683987/media-pics/6164307j-gabriel-61643-proguard-steel-shock-absorber-for-select-chevrolet-gmc-models.jpg';
    $file_name = basename($path, ".php"); 
    echo $file_name."\n"; 

while ($data = fgetcsv($fd)) {
	echo '<pre>';
	if (strpos($data[2],'media-pics') !== false) 
 {
 	 $data[2]=str_replace('media-pics','media-photos',$data[2]);
   // echo $output;
 	
 }

     //$file_name = basename($data[2], ".php"); 
	     // print_r($file_name);"\n"; 
         // array_push($new_array, $data);
    
    }

/*print_r($new_array);

//Open the file for writing

$fd = fopen($out_file, "w");
//$out_file = ['SKU', 'GUID', 'IMAGES'];
foreach ($new_array as $row) {
	//Put the result in the file
    fputcsv($fd, $row);
}

print_r($new_array);

//Open the file for writing

$fd = fopen($out_file, "w");
//$out_file = ['SKU', 'GUID', 'IMAGES'];
foreach ($new_array as $row) {
	//Put the result in the file
    fputcsv($fd, $row);
}

fclose($fd);*/
?>