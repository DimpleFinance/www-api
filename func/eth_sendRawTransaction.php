<?php
function eth_sendRawTransaction($signedTransaction,$rpc,$debug)
{

global $curl1,$curl2;

//$debug = 1;

unset($mas);
$mas[jsonrpc] = "2.0";
$mas[id] = time();
$mas[method] = "eth_sendRawTransaction";
$mas[params][] = "0x".$signedTransaction;
if($debug)print_r($mas);
if($debug)print "-------------\n";
$js = json_encode($mas);
if($debug)print_r($js);
if($debug)print "-------------\n";
//$proxy = proxy_get();

$curl = $curl1."'".$js."' $proxy ".$rpc." 2>/dev/null";
//$log[] = $curl;
unset($reg);
$reg["curl"] = $curl;
if($debug)print $curl."\n";
else
exec($curl,$reg);
if($debug)print_r($reg);



return $reg;
}
?>