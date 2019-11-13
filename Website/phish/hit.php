<?php

if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    }
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
else
    {
      $ipaddress = $_SERVER['REMOTE_ADDR'];
    }
$useragent = " User-Agent: ";
$browser = $_SERVER['HTTP_USER_AGENT'] . "\r\n";


$file = 'logs/hits.txt';
$created_at = "Date: " . date("Y/m/d") . "(" . date("h:i:sa") . " | ";
$victim = "IP: ";
$fp = fopen($file, 'a');

fwrite($fp, $created_at);
fwrite($fp, $victim);
fwrite($fp, $ipaddress);
fwrite($fp, $useragent);
fwrite($fp, $browser);


fclose($fp);
