<?php    

    

    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    

    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    

    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';

        QRcode::png("salom", $filename);    
  
        
    //display generated file
    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';  
  
    