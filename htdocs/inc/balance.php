<?php

//print "<pre>";
$process = 0;
$w = $items[2];
if(strlen($w)==42 && substr($w,0,2)=="0x")
{
$process = 1;
}
else
{
$skip_cache = 1;
    $t = $url.$item."/Wallet";
    $o[error][txt] = "Url must be $t";

}

if($process)
{


unset($v);
//-------------------------------------------
$v[jsonrpc] = "2.0";
$v[method] = "eth_getBalance";
//$v[params][0] = $row[wal];
$v[params] = array();
$v[params][0] = $w;
$v[params][1] = "latest";
//$v[params][1] = true;
//$v[id] = $row[id];
$v[id] = "balance_coin_$w";
//$v[id] = "balance_".$name;
$jss[] = $v;


reset($tkns);
foreach($tkns as $tkn=>$contract)
{
$contract = strtolower($contract);
unset($v,$t2,$t);
$b = "0x70a08231";
$t = $w;
$t = substr($w,2);
$t = view_number($t,64,"0");
$b .= $t;

$t = substr();
$t2[from] = "0x0000000000000000000000000000000000000000";
$t2[data] = $b;
$t2[to] = $contract;
//print_r($t);
unset($v);
$v[jsonrpc] = "2.0";
$v[method] = "eth_call";
//$v[params][0] = $row[wal];
$v[params][0] = $t2;
$v[params][1] = "latest";
//$v[id] = $row[id];
$v[id] = "balance_".$tkn."_".$w."_".$contract;
$jss[] = $v;
}

//print_r($jss);
$mas = curl_mas2($jss,$rpc,0);
//print_r($mas);

foreach($mas as $v2)
{
    $id = $v2[id];
    $t = $id;
    $t = explode("_",$t);
    $case = $t[0];
    $coin = $t[1];
    $wal = $t[2];
    $addr = $t[3];
    $val = $v2[result];
    $val = hexdec($val);

    switch($case)
    {
	case "balance":
	$decimal = decimals($addr);
	$t = $val / 10**$decimal;
	    $o2["balance_".$coin] = $t;
	break;
    }
}
$o[result] = $o2;

}