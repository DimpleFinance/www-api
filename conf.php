<?php

error_reporting(0);

include "func.php";

$net = "localhost";
$time_otstup = -3600;
$time_otstup = 0;

//$db["name"] = "rostok";
//if($need_db)
//include "/conf.sql.php";

$curl1 = "curl --connect-timeout 4 -H 'content-type: application/json' -X POST --data ";


$rpc = "https://matic-mumbai.chainstacklabs.com";
$rpc = "http://10.5.0.14:8543";
//$rpc = "https://rpc1-mumbai.infocoin.pro";
$time = time();
$chain_id = 80001;

$f = "y_contract.$net.$sol.txt";
$a = file_get_contents($f);
$contractAddress = $a;


$glob[chain_id] = 80001;

?>