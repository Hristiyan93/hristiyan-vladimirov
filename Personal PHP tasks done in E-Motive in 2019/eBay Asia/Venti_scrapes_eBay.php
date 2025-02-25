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
    'headers' =>['User-Agent'=>'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36']
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

/*function getPieces($input){
    $splited = explode('|', $input);
    if(count($splited) == 1){
        $splited = explode(' ', $input);
        // if (count($splited) == 1) {
        //     $splited = explode(' ', $input);
        // }
    }
    return $splited;
}*/
 
//*******************MAIN*********************

echo "\nStart at ".date("d-m-Y H:i:s")."\n";

$client = new Client([
        'verify' => false,
        'timeout'  => '20',
        'headers' =>['User-Agent'=>'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36'],
    ]);

    $html = new simple_html_dom();
 
    $input = readCSV('Vanli - for scrape.csv');
     //var_dump($input);
    $fErr = fopen("errors.csv", "w");
    $fp = fopen("scraped_info.csv", "w");
    // fputcsv($fp, array('Reference', 'RefNumber', 'GTpart', 'EbayId', 'MPN', 'StoreName', 'Price', 'Title', 'Brand', 'Sold'));
    fputcsv($fp, array('Input info', 'MPN', 'Interchange Part Number', 'Brand', 'Condition', 'Warranty', 'UPC', 'Country/Region of Manufacture', 'Placement on Vehicle', 'Item Name', 'Part Brand', 'OEM Numbers', 'Length [mm]', 'Width [mm]', 'Thickness [mm]', 'Weight [kg]', 'Filter Type', 'Required quantity', 'Height 1 [mm]', 'Width 2 [mm]', 'Material', 'Width 1 [mm]', 'Thickness [mm]', 'Height 2 [mm]', 'WVA Number', 'Supplementary Article/Info 2', 'Inspection Tag', 'Wear Warning Contact', 'Supersedes', 'Brake System', 'Cable Length [mm]', 'Thickness 1 [mm]', 'Fitting Position', 'Brand and Model', 'Type', 'Years', 'CCM', 'KW', 'HP', 'Engine', 'Body', 'Restrictions'));
    $itemSpecifics = array();
    $dom = new simple_html_dom();

foreach ($input as $n => $oem) {

            //error_reporting(0);
            //$data = getWebPage('https://www.ebay.com/sch/i.html?_from=R40&_trksid=m570.l1313&_nkw='. $oem['MPN']);
            //$data = getWebPage('https://www.ebay.ca/sch/i.html?_from=R40&_trksid=p2380057.m570.l1313.TR0.TRC0.A0.H0.X729199073885.TRS5&_nkw='. $oem['MPN']);
            //https://www.ebay.ca/sch/i.html?_from=R40&_trksid=p2380057.m570.l1313.TR0.TRC0.A0.H0.X729199073885.TRS5&_nkw=729199073885&_sacat=0
        $data = getWebPage('https://www.ebay.com/sch/i.html?_fsrp=1&_nkw='. $oem['MPN'].'&_sacat=0&_from=R40&rt=nc&LH_TitleDesc=0&_fss=1&_saslop=1&LH_SpecificSeller=1&_sasl=start245');           
        $dom->load($data);
        //var_dump($data);
        $res=$dom->find(".BOLD", 0);
            //var_dump($res);

            if($res == null){
                fputcsv($fErr, array($oem['MPN'], 'download failed'));
            }else{
                $totalItems = $res->plaintext;
                //var_dump($totalItems);
            }

        if($totalItems > 0){
            //var_dump($list);
            $firstEntry = $dom->find('.s-item__link')[0];
            if(isset($firstEntry)){
            //var_dump($firstEntry);
                $firstEntryLink = $firstEntry->href;

                if(isset($firstEntryLink)){
                    //var_dump($firstEntryLink);
                         
                    //$firstEntryTitle = $dom->find('.s-item__link .s-item__title')[0];
                    //echo '<a href="'.$firstEntryLink.'">'.$firstEntryTitle.'</a>';

                    $res=getWebPage($firstEntryLink);
                }
                error_reporting(0);
            }
            //var_dump($res);
            $html->load($res);
            $specs = array();
            error_reporting(0);
            $item['Input info'] = $oem['MPN'];
            //$html->find('td.attrLabels_div.itemAttr')
            foreach($html->find(".attrLabels") as $section){
            //foreach($html->find('td.attrLabels_div.itemAttr') as $section
                $name = trim($section->plaintext, " :\t\n\r\0\x0B\xC2\xA0");
                //if($name == 'Condition'){
                   // continue;   
                //}
                $specs[$name] = html_entity_decode(trim($section->nextSibling()->plaintext));
                //var_dump($specs);
            }

            //if(!$specs){
                // $itemSpecifics[$item['id']] = $specs;
                //$found = false;
                if(isset($specs['Manufacturer Part Number']))
                    $mpn = $specs['Manufacturer Part Number'];
                elseif(isset($specs['MPN']))
                    $mpn = $specs['MPN'];
                elseif(isset($specs['Part Manufacturer Number']))
                    $mpn = $specs['Part Manufacturer Number'];
                elseif(isset($specs['SKU #']))
                    $mpn = $specs['SKU #'];
                else
                    $mpn = 'MPN missing';
              
                    $item['mpn']=$mpn;
                    //var_dump($item['mpn']);                        
 
                if(isset($specs['Interchange Part Number']))
                    $item['Interchange Part Number'] = $specs['Interchange Part Number'];
                else
                    $item['Interchange Part Number'] = '';
                
                
                if(isset($specs['Part Manufacturer']))
                    $item['brand'] = $specs['Part Manufacturer'];
                elseif(isset($specs['Brand']))
                    $item['brand'] = $specs['Brand'];
                else
                    $item['brand'] = '';

                if(isset($specs['Condition']))
                    $item['Condition'] = $specs['Condition'];
                else
                    $item['Condition'] = '';

                error_reporting(0);
                if(isset($specs['Warranty'])){
                    $item['Warranty'] = $specs['Warranty'];
                    //$item['Warranty'] = htmlspecialchars_decode(trim(str_replace("&#039;", "`", $itemWarranty)));
                    //var_dump($item['Warranty']);
                }else{
                    $item['Warranty'] = '';
                }

                error_reporting(0);
                if(isset($specs['UPC'])){
                	//$item['UPC'] = str_pad($item['UPC'], 2, '0', STR_PAD_LEFT);
                    $item['UPC'] = number_format($specs['UPC']);
                	//var_dump($item['UPC']);
                }else{
                    $item['UPC'] = '';
                }

                error_reporting(0);
                if(isset($specs['Country/Region of Manufacture']))
                    $item['Country/Region of Manufacture'] = $specs['Country/Region of Manufacture'];
                else
                    $item['Country/Region of Manufacture'] = '';

                error_reporting(0);
                if(isset($specs['Placement on Vehicle']))
                    $item['Placement on Vehicle'] = $specs['Placement on Vehicle'];
                else
                    $item['Placement on Vehicle'] = '';           

                $description = $html->find("iframe[id=desc_ifr]", 0);
                //var_dump($description);
                if($description != null){
                    $source = $description->src;
                    //$item['description']=$dom->saveHTML($source);
                    //$lines_string=file_get_contents($source)
                    if(isset($source)){
                        $descrHtml = getWebPage($source);
                        unset($source);
                    }
                        $descrDom = new simple_html_dom();
                        $descrDom->load($descrHtml);
                        $content=$descrDom->find("tbody", 0);
                        $descr1=$content->plaintext;                         
                        $descr = str_replace("Item DescriptionMake sure it fits!
// Check our compatibility table of suitable vehicles. " ,"", $descr1);
                        //var_dump($descr);
                        list($a, $b)=explode('Part', $descr);
                        list($c, $d)=explode('Name', $a);
                        $item['Item Name']=$d;

                        list($e, $f)=explode('OEM', $descr);
                        list($g, $h)=explode('Brand', $e);
                        //var_dump($h);
                        $item['Part Brand']=$h;

                        list($i, $j)=explode('Length', $descr);
                        list($k, $l)=explode('Numbers', $i);
                        $item['OEM Numbers']=$l;

                        list($m, $n)=explode('Width', $descr);
                        list($o, $p)=explode('Length [mm]', $m);
                        $item['Length [mm]']=$p; 

                        list($q, $r)=explode('Thickness', $descr);
                        list($s, $t)=explode('Width [mm]', $q);
                        $item['Width [mm]']=$t; 

                        list($u, $v)=explode('Weight', $descr);
                        list($w, $x)=explode('Thickness [mm]', $u);
                        $item['Thickness1 [mm]']=$x; 

                        list($y, $z)=explode('Filter', $descr);
                        list($aa, $ab)=explode('Weight [kg]', $y);
                        $item['Weight [kg]']=$ab;
                      
                        list($ac, $ad)=explode('Required', $descr);
                        list($ae, $af)=explode('Filter Type', $ac);
                        $item['Filter Type']=$af; 

                        list($ag, $ah)=explode('""', $descr);
                        list($ai, $aj)=explode('quantity', $ag);
                        $item['Required quantity']=$aj;

                        list($ak, $al)=explode('Width 2', $descr);
                        list($am, $an)=explode('Height 1 [mm]', $ak);
                        $item['Height 1 [mm]']=$an;

                        list($ao, $ap)=explode('Material', $descr);
                        list($aq, $ar)=explode('Width 2 [mm]', $ao);
                        $item['Width 2 [mm]']=$ar;

                        list($as, $at)=explode('Width 1', $descr);
                        list($au, $av)=explode('Material', $as);
                        $item['Material']=$av;

                        list($aw, $ax)=explode('Thickness', $descr);
                        list($ay, $az)=explode('Width 1 [mm]', $aw);
                        $item['Width 1 [mm]']=$az;

                        //list($aaa, $aaab)=explode('Height 2', $descr);
                        //list($aac, $aaad)=explode('Thickness [mm]', $aaaa);
                        //$item['Thickness2 [mm]']=$aaad;

                        list($aaae, $aaaf)=explode('WVA', $descr);
                        list($aaag, $aaah)=explode('Height 2 [mm]', $aаае);
                        $item['Height 2 [mm]']=$aaah;

                        list($aaai, $aaag)=explode('Supplementary', $descr);
                        list($aaak, $aaak)=explode('WVA Number', $aaai);
                        $item['WVA Number']=$aaak;

                        list($aaal, $aaam)=explode('Inspection', $descr);
                        list($aaan, $aaao)=explode('Supplementary Article/Info 2', $aaal);
                        $item['Supplementary Article/Info 2']=$aaao;

                        list($aaap, $aaaq)=explode('Wear', $descr);
                        list($aaar, $aaas)=explode('Inspection Tag', $aaap);
                        $item['Inspection Tag']=$aaas;

                        list($aaaq, $aaat)=explode('Supersedes', $descr);
                        list($aaau, $aaav)=explode('Wear Warning Contact', $aaaq);
                        $item['Wear Warning Contact']=$aaav;

                        list($aaaw, $aaax)=explode('""', $descr);
                        list($aaay, $aaaz)=explode('Supersedes', $aaaw);
                        $item['Supersedes']=$aaaz;

                        list($aaaaa, $aaaab)=explode('Position', $descr);
                        list($aaaac, $aaaad)=explode('Brake System', $aaaaa);
                        $item['Brake System']=$aaaad; 

                        list($aaaae, $aaaaf)=explode('Wear', $descr);
                        list($aaaag, $aaaah)=explode('Cable Length [mm]', $aaaae);
                        $item['Cable Length [mm]']=$aaaah;

                        list($aaaai, $aaaag)=explode('System', $descr);
                        list($aaaak, $aaaal)=explode('Thickness 1 [mm]', $aaaai);
                        $item['Thickness 1 [mm]']=$aaaal;

                        list($aaaam, $aaaan)=explode('Brake', $descr);
                        list($aaaao, $aaaap)=explode('Fitting Position', $aaaam);
                        $item['Fitting Position']=$aaaap;

                        //$tables = $descrDom->find(".tbl-fit");
                        //var_dump($tables);
                        // Find the correct <table> element you want, and store it in $table
                        // ...

                        // Assume you want the first table
                        $table=$descrDom->find(".tbl-fit");
                        $tdata = $table->find("td");

                            echo $td."<br>";
                        

                        //foreach ($descrDom->find(".tbl-fit") as $key => $td) {
                           // $rows = $table->getElementsByTagName("td");
                            //var_dump($rows);
                                //foreach ($rows as $row) //there i only two rows. 
                               // {
                               // echo "<tr>";
                                //  $cells = $row -> getElementsByTagName('td');
                        //$content2=$descrDom->find(".tbl-fit", 0);                         
                       // $descr2 = str_replace("Item DescriptionMake sure it fits!
// Check our compatibility table of suitable vehicles. " , "", $content->plaintext);
                        //var_dump($key);
                        //$descr2=$content2->plaintext .'<br />';
                        //($descr2);   
                        //}


                       /* $tables = $descrDom->find(".tbl-fit", 0);
                        //var_dump($tables);
   
                           /*** get all rows from the table ***/ 
                          // $rows = $tables->getElementsByTagName('tr');
                           //var_dump($rows);
                           /*** loop over the table rows ***/ 
                          // foreach ($rows as $row) {
                              /*** get each column by tag name ***/ 
                            //  $cols = $row->getElementsByTagName('th'); 
                              //var_dump($cols);
                              /*** echo the values ***/ 
                            //  echo 'Designation: '.$cols->item(0).'<br />'; 
                            //  echo 'Manager: '.$cols->item(1)->nodeValue.'<br />'; 
                            //  echo 'Team: '.$cols->item(2)->nodeValue; 
                            //  echo '<hr />'; 
                           //}
                    
                }        
               // }

                     /*$content=$descrDom->getElementsByTagName('table');
                        //var_dump($content);
                        //$table = $content->item(0);

                        foreach ($content->childNodes as $td) {
                          if ($td->nodeName == 'td') {
                            $value=$td->nodeValue. "\n";
                        var_dump($value);
                          }
                        }   */  

        }else{
            echo "No result for " . $oem['MPN'] . "\n";
            fputcsv($fp, array($oem['MPN'], 'N/A'));
            continue;
        }
                fputcsv($fp, $item);   
                                    
                echo $n . "\n";
}

    fclose($fp);

echo "Script finish at ".date("d-m-Y H:i:s")."\n";