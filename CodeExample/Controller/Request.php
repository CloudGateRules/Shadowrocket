<?php

/*
 * License: MIT
 *    Time: 2017-02-01 01:38:44
 *    Name: Request.php
 *    Note: CloudGate Request Controller
 *  Author: Eval,BurpSuite
 */

# REQUEST QUERY URI
function GET(){
    global $REQUEST_QUERY_URI;
    $QUERY_URI = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    $REQUEST_QUERY_URI = substr($QUERY_URI,(strpos($QUERY_URI,'?')+1));
}

# File RegExp&Size Verify
function Cloud($Data,$DefaultModule,$Cache){
    global $ConfigFile;
    !empty($Data)?$Cloud_IS_NULL="{$Data}{$Cache}":$Cloud_IS_NULL="{$DefaultModule}{$Cache}";
    preg_match('/^((http|https):\/\/)(.*)(.cfg)(.*)/',$Cloud_IS_NULL)?$Cloud_Preg_Match=$Cloud_IS_NULL:$Config_Preg_Match=$DefaultModule;
    $ConfigFile=$Cloud_Preg_Match;
}

# CURL Request
 function CURL($File=false){
     global $CURLContent;
     $CURLSize = get_headers($File,true);
     $CURLSize['Content-Length']<'524288'&&$CURLSize['Accept-Ranges']==='bytes'?$CURLFile=$File:$CURLFile=false;
     $CURL = curl_init();
     curl_setopt($CURL, CURLOPT_URL, $CURLFile);
     curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($CURL, CURLOPT_TIMEOUT, 30);
     $CURLContent = curl_exec($CURL);
     curl_close($CURL);
}

?>
