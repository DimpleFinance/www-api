<?php


$d = __DIR__;                                                                                                                                                                               
$d = dirname($d);                                                                                                                                                                           
//$d = dirname($d);                                                                                                                                                                           
//print $d;                                                                                                                                                                                 
$net = "mumbai";
$d = __DIR__;
$d = dirname($d);
$d .= "/contracts/";
$contract_dir = $d;
/*
if(!$sol)                                                                                                                                                                         
$sol = $item2;                                                                                                                                                                              
$f = $d."/y_contract.".$net.".".$sol.".txt";                                                                                                                                                
//print $f;                                                                                                                                                                                 
if(file_exists($f))                                                                                                                                                                         
{                                                                                                                                                                                           
$contractAddress = file_get_contents($f);                   
}
*/

$time_otstup = 3600*3;
$time_otstup = 0;

$tkns[usdc]      = "0xBfd995F0F67C1A3772146862132C2B716E745452";
$tkns[weth]      = "0x0D7f09134c8D4852aEF160C1c2FF3b4515cE13ee";
$tkns[wmatic]    = "0x09733af32D52949CC2c9cBad55E36b4DCd217334";

?>