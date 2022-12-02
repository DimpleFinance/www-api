<?php

include "../conf.php"; 

$domen = $_SERVER['HTTP_HOST'];
$domen = $_SERVER['SERVER_NAME'];
$url = "https://".$domen."/";
$t = $_SERVER['REQUEST_URI'];                                                                                                                                                               
$t = explode("/",$t);
unset($t[0]);
$items = $t;                                                                                                                                                                       
$item = $t[1];                                                                                                                                                                              
$item2 = $t[2];                                                                                                                                                                             
$item3 = $t[3];   
//print_r($t);                                                                                                                                                                          

$sol = "dimple";

//print "ITEM:".$item."\n";

switch($item)
{
//    case "UserList":
    case "LevelsInfo":
    case "TxsList":
    case "UsersByAddr":
    case "UserMatrix":
    case "VaultList":
    case "Users":
	$need_cache = 1;
    break;
    case "main":
    case "":
	//print "dddd";die;
	$item = "main";
    break;
    
}

include "conf.php";

$real_data = 1;

if($need_cache)
{
$cache_file = __DIR__."/cache/".$sol."_".$item."_".$item2."_".$item3.".cache";
$t = filemtime($cache_file);
if(time()<($t+10))
{
$txt = file_get_contents($cache_file);
//$o = json_decode($a,1);

$real_data = 0;

}
}

if($real_data)
{
$d = __DIR__;
$f = $d."/inc/".$item.".php";
if(file_exists($f))
{
    include $f;
}
$txt = json_encode($o,192);
if($need_cache && !$skip_cache)
file_put_contents($cache_file,$txt);

}


print $txt;
//$o[time] = date("y-m-d H:i:s")
?>