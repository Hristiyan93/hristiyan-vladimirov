<?php
require __DIR__ . '/vendor/autoload.php';
include("simple_html_dom.php");
ini_set("memory_limit", "1G");
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
$errno = 0;
$errmsg = "";

$client = new Client([
    'verify' => false,
    'timeout' =>  20,
    'headers' =>['User-Agent'=>'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36']
    ]);

function getWebPage($url){
        $ch = curl_init($url);

        $options = array(
            CURLOPT_RETURNTRANSFER => true,     // return web page
            // CURLOPT_BINARYTRANSFER => true,
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_USERAGENT      => "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36 ", // who am i
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 30,      // timeout on connect
            CURLOPT_TIMEOUT        => 30,      // timeout on response
            CURLOPT_MAXREDIRS      => 30,       // stop after 10 redirects
            CURLOPT_FAILONERROR    => true,
            // CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            // CURLOPT_PROXY           => '108.59.14.203:13010'
            CURLOPT_COOKIE         => "npii=btguid/fc03e0021610ab600201584cffbe2cc05c7fecd1^cguid/fc03e74c1610a993a1036300e76f880a5c7fecd1^; nonsession=CgADLAAFansBaMwDKACBkBLrSZmMwM2UwMDIxNjEwYWI2MDAyMDE1ODRjZmZiZTJjYzDyP9R7; AMCVS_A71B5B5B54F607AB0A4C98A2%40AdobeOrg=1; AMCV_A71B5B5B54F607AB0A4C98A2%40AdobeOrg=-1758798782%7CMCIDTS%7C17597%7CMCMID%7C54020616941805210570237619514598619543%7CMCAAMLH-1520956371%7C6%7CMCAAMB-1520956371%7CRKhpRz8krg2tLO6pguXWp5olkAcUniQYPHaMWWgdJ3xzPWQmdj0y%7CMCCIDH%7C-1464329217%7CMCOPTOUT-1520358771s%7CNONE%7CMCAID%7CNONE; dp1=bu1p/QEBfX0BAX19AQA**5c7fecd2^bl/BG5e612052^pbf/#308000100000000000000100020000005e612054^; ebay=%5Esbf%3D%2340400000000010000000000%5Epsi%3DAA%2BADACA*%5E; ds2=sotr/b7pQ5zQMz5zz^; csegs=segs%3Da12; aam_uuid=54029524289082034840234450335155765290"
        );

        curl_setopt_array( $ch, $options );

        $img = curl_exec($ch);
        $errno = curl_errno( $ch );
        $errmsg  = curl_error( $ch );

        $n = 0; //number requests send
        while( $errno != 0 ){
            if($n >= 2){
                //fwrite($fp, $url."\r\n");
                $n = 0;
                $img = null;
                break;
            }

            echo $errno." - ".$errmsg . "\nSending again request ...\r\n";
            $errmsg = "";
            // sleep(2);
            $n++;

            $img = curl_exec($ch);
            $errno = curl_errno( $ch );
            $errmsg  = curl_error( $ch );
        }

        return $img;
}

function readCSV($filename, $hasHeaders = TRUE){
    $f = fopen($filename, "r");
    if($f == NULL){
        die("Could not open $filename\n");
    }
    $data = array();
    if($hasHeaders){
        $headers = fgetcsv($f);
    }
    while ($line = fgetcsv($f)){
        if($hasHeaders){
            $line = array_combine($headers, $line);
        }
        $data[] = $line;
    }
    fclose($f);
    return $data;
}

$promises = function ($list) use ($client){
    $max = 6;
    if(count($list) < $max){
        $max = count($list);
    }
    for($i = 0; $i < $max; $i++) {
        $id = $list[$i]->listingid;
        $url = $list[$i]->find("a.vip", 0)->href;
        (yield $id => $client->requestAsync('GET', $url)); 
    }
};

function getPieces($input){
    $splited = explode('|', $input);
    if(count($splited) == 1){
        $splited = explode(' ', $input);
        // if (count($splited) == 1) {
        //     $splited = explode(' ', $input);
        // }
    }
    return $splited;
}

//*******************MAIN*********************

echo "\nStart at ".date("d-m-Y H:i:s")."\n";

$client = new Client([
        'verify' => false,
        'timeout'  => '20',
        'headers' =>['User-Agent'=>'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36'],
    ]);
// $files = array_diff(scandir(__DIR__), array('.', '..'));
// foreach ($files as $key => $fileName) {
    $html = new simple_html_dom();

     $input = readCSV('ItemsGT.csv');
     //var_dump($input);
    $fErr = fopen("errors.csv", "w");
    $fp = fopen("scraped_info3.csv", "w");
    // fputcsv($fp, array('Reference', 'RefNumber', 'GTpart', 'EbayId', 'MPN', 'StoreName', 'Price', 'Title', 'Brand', 'Sold'));
    //fputcsv($fp, array('EbayId', 'MPN', 'Price', 'Title', 'Brand', 'Purchases'));
    fputcsv($fp, array('EbayId', 'Price', 'Purchases'));
    $itemSpecifics = array();
    $dom = new simple_html_dom();

    foreach ($input as $n => $oem) {
    
        error_reporting(0);
        $data = getWebPage('https://www.ebay.co.uk/sch/i.html?_from=R40&_nkw='.$oem['Item Id'].'&_sacat=131090&_fcid=3');
        //$data = getWebPage('https://www.ebay.co.uk/sch/i.html?_sacat=131090&_nkw='.$oem['Item Id']);
        //https://www.ebay.com/sch/i.html?_from=R40&_trksid=m570.l1313&_nkw=263630958204&_sacat=0
        
        if ($data == null) {
            echo "Couldn't download page ". $oem['Item Id']."\n";
            continue;
        }
        $dom->load($data);
        $totalItems = $dom->find("span.rcnt", 0);
        if($totalItems == null){
            echo "Can't fetch total pages for ". $oem['Item Id']."\n";
            $data = getWebPage('https://www.ebay.co.uk/sch/i.html?_from=R40&_nkw='.$oem['Item Id'].'&_sacat=131090&_fcid=3');
            $dom->load($data);
            $res = $dom->find("span.rcnt", 0);
            if($res == null){
                fputcsv($fErr, array($oem['Item Id'], 'download failed'));
            }else{
                $totalItems = $res->plaintext;
            }
        }
        $totalItems = $totalItems->plaintext;
        if($totalItems == 0){
            echo "No results for ".$oem['Item Id']."\n";
            continue;
        }

        $list = $dom->find("ul[id=ListViewInner] li.lvresult");
        if($list == null){
            echo "List not found at ".$oem['Item Id']."\n";
            fputcsv($fErr, array($oem['Item Id'], 'list not found'));
            continue;
        }
        $max = 2000;
        if($totalItems < $max){
            $max = $totalItems;
        }

        $requests = array();
        for ($i=0; $i < $max; $i++) {
            $id = $list[$i]->listingid;
            $url = $list[$i]->find("a.vip", 0);
            if($url == null){
                echo "Url not found for " . $oem['Item Id'] . "\n";
                continue;
            }
            $requests[$id] = $client->getAsync($url->href);
        }

        $results = array();
        $start = microtime(true);
        $results = Promise\settle($requests)->wait();

        // echo 'Used a total of ' . (microtime(true) - $start) . ' seconds' . PHP_EOL;
        foreach ($results as $id => $res) {
            if($res['state'] == 'fulfilled'){
                $response = $res['value'];
            }else{
                $failed[$id] = 'rejected';
                $code = 0;
                if($res['reason']->getResponse() != null){
                    $code = $res['reason']->getResponse()->getStatusCode();
                }
                fputcsv($fErr, array($oem['Item Id'], 'REJECTED'));
                echo "Request for ".$id." rejected! Code:".$code."\n";
                continue;
            }

            //$item = array($oem['Item Id']);

            $item['id'] = $id;
            $html->load($response->getBody()->getContents());

            $specs = array();

            foreach($html->find(".attrLabels") as $section){
                $name = trim($section->plaintext, " :\t\n\r\0\x0B\xC2\xA0");
                if($name == 'Condition'){
                    continue;   
                }
                $specs[$name] = html_entity_decode(trim($section->nextSibling()->plaintext));
            }
            if(!empty($specs)){
                 $itemSpecifics[$item['id']] = $specs;
                $found = false;

                if(isset($specs['Manufacturer Part Number']))
                    $mpn = $specs['Manufacturer Part Number'];
                elseif(isset($specs['MPN']))
                    $mpn = $specs['MPN'];
                elseif(isset($specs['Part Manufacturer Number']))
                    $mpn = $specs['Part Manufacturer Number'];
                else
                    $mpn = '';

                //$item['mpn'] = $mpn;
                $price = $html->find("#prcIsum", 0);
                //var_dump($price); 
                if($price == null){
                    $item['price'] = str_replace("£", "", $html->find('#mm-saleDscPrc', 0)->plaintext);
                }else{
                    $item['price'] = $price->content;
                    //var_dump($item['price']);
              	}

                $sold = $html->find('.vi-txt-underline',0);
                //var_dump($sold);            	
                if($sold != null){
                    //$item['sold'] = $sold->find("a", 0)->plaintext;
                     $item['sold'] = $sold->plaintext;  
                }else{
                    $item['sold'] = '';
                }

            }else{
                echo "No item specifics for " . $item['id'] . "\n";
                continue;
         
        	} 
    	}  
                /*if($mpn != $oem['Item Id']){
                    $exploded = explode(" ", $mpn);
                    if(in_array($mpn, $exploded)){

                        if(isset($specs['Reference OE/OEM Numbers']))
                            $itemOems = $specs['Reference OE/OEM Numbers'];
                        elseif(isset($specs['Other Part Number']))
                            $itemOems = $specs['Other Part Number'];
                        elseif(isset($specs['Reference OE/OEM Number']))
                            $itemOems = $specs['Reference OE/OEM Number'];
                        else
                            $itemOems = '';
                        $splited = getPieces($itemOems);
                        if(count($splited) == 1) {
                            if(trim($itemOems, " ,") != $oem['Item Id']){
                               continue; 
                            }    
                        }else{
                            foreach ($splited as $value) {
                                // if(strpos($value, ":") !== false){
                                //     explode(":", $value)[1];
                                // }
                                if(trim($value, " :\t\n\r\0\x0B,") == $oem['Item Id']) {
                                    $found = true;
                                    break;
                                }
                            }
                            if(!$found)
                                continue;
                        }
                    }
                }
*/
                //$item['store'] = trim($html->find("#mbgLink", 0)->plaintext);
                
            
            error_reporting(0);
            fputcsv($fp, $item);
                 //echo $id."\n";
    
        echo $n . "\n";
	}

    // writeCSV($itemSpecifics);
    fclose($fp);
    // fclose($fCompat);
 

echo "Script finish at ".date("d-m-Y H:i:s")."\n";