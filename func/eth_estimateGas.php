<?php
function eth_estimateGas($send,$rpc,$debug=1)
{
global $curl1,$curl2;

//$debug = 1;
/*
if($debug)print_r($mas);
if($debug)print "-------------\n";

if($debug)print_r($js);
if($debug)print "-------------\n";
//===================================
//$js = '{"jsonrpc":"2.0","id":'.($nn++).',"method":"eth_estimateGas"}';
//$js = '{"jsonrpc":"2.0","id":'.($nn++).',"method":"eth_estimateGas"}';
$proxy = proxy_get();
*/
$mas[jsonrpc] = "2.0";
$mas[id] = time();
$mas[method] = "eth_estimateGas";
$mas[params][] = $send;
$js = json_encode($mas);

$curl = $curl1."'".$js."' $proxy ".$rpc." 2>/dev/null";
if($debug)print $curl."\n";
unset($reg);
exec($curl,$reg);
if($debug)print_r($reg);
$a = implode("\n",$reg);
$o[raw] = $a;
$a = json_decode($a,1);

$gas = $a[result];
$o[result] = $gas;
$gas = hexdec($gas);

$err = $a[error][message];

$o[gas] = $gas;
if($err) $o[err] = $err;

//print "GAS: ".$gas."\n";

return $o;
}

?>