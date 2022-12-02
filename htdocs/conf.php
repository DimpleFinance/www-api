<?php


$d = __DIR__;                                                                                                                                                                               
$d = dirname($d);                                                                                                                                                                           
//$d = dirname($d);                                                                                                                                                                           
//print $d;                                                                                                                                                                                 
$net = "localhost";
if(!$sol)                                                                                                                                                                         
$sol = $item2;                                                                                                                                                                              
$f = $d."/y_contract.".$net.".".$sol.".txt";                                                                                                                                                
//print $f;                                                                                                                                                                                 
if(file_exists($f))                                                                                                                                                                         
{                                                                                                                                                                                           
$contractAddress = file_get_contents($f);                   
}

$time_otstup = 3600*3;
$time_otstup = 0;
?>