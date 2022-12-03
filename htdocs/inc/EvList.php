<?php

print "<pre>";

//$d = __DIR__;
//$d = dirname($d);
//$d = dirname($d);


$sol = "txs";
$f = $contract_dir."y_contract.".$net.".".$sol.".txt";
//print $f."\n";
if(file_exists($f))
{
$contractAddress3[$sol] = file_get_contents($f);
}

$swap_name = "swap5";
$sol = $swap_name;
$f = $contract_dir."y_contract.".$net.".".$sol.".txt";
if(file_exists($f))
{
$contractAddress3[$sol] = file_get_contents($f);
}


//print_r($contractAddress3);
unset($m);
$m[Borrow] = "swap5";

$limit = 10000;
$t = $item2*1;
if($t)$limit = $t;

if($limit > 1000)$limit = 10000;
//if($limit == 0)$limit = 1000;

$num = 9;

foreach($m as $k=>$name)
{
//$need_cache = 1;
unset($v,$t,$t2);
//$b .= view_number($i,64,0);
//$b = "0x01111de4";
//$b = "0xbcac8955";
//$t = substr($w,2);
//$i2 = dechex($i);
//$b .= view_number($i2,64,0);
// EvList: 0x85bbc41e
$b = "0x85bbc41e";  

$t = $contractAddress3[$name];
$t = substr($t,2);              
$b .= view_number($t,64,0);                                                                                                                                                               

$t = dechex($limit);                                                                                                                                                                          
$b .= view_number($t,64,0);     

$t2[from] = "0x0000000000000000000000000000000000000000";
$t2[data] = $b;
$t2[to] = $contractAddress3[txs];
//print_r($t);
unset($v);
$v[jsonrpc] = "2.0";
$v[method] = "eth_call";
//$v[params][0] = $row[wal];
$v[params][0] = $t2;
$v[params][1] = "latest";
//$v[id] = $row[id];
$v[id] = "EvList_".$name;
$jss[] = $v;
}


//print_r($jss);die;
unset($out,$o);
//print "Send ".count($jss)." requests to blockchain\n";
$t = $time;
//print "Get data from blockchain in ".count($jss)." requests\n";
if(count($jss))
{
$mas = curl_mas2($jss,$rpc,0);
}
$t = time()-$t;
//print "Get data from blockchain in ".count($jss)." requests [$t sec]\n";
//print "<pre>";
//print_r($jss);
//print_r($mas);die;

$names[1] = "i";
$names[2] = "ev_id";
$names[3] = "tx_id";
$names[4] = "unit";
$names[5] = "level";
$names[6] = "amount";
$names[7] = "addr";
$names[8] = "name";
$names[9] = "utime";

foreach($mas as $v2)
{
    
    $t = $v2[id];
    $id = $t;
    $t = explode("_",$t);
    $case = $t[0];
    $whats = $t[1];
//    print "================================ ".$id."\n<br>";
//    print_r($v2);
    $v = $v2[result];

    switch($case)
    {
	case "EvList":
//	    print 
	    $t = substr($v,2);
	    $l = strlen($t)/64;
	    for($i=0;$i<$l;$i++)
	    {
		$t2 = substr($t,$i*64,64);
		$t3 = gmp_hexdec($t2);
		$t3 = gmp_strval($t3);
$tt = ($i-2)/$num;
if((floor($tt)==$tt) && $i>2)$t3 = "0x".substr($t2,24);
//$t3 = floor($tt)." ".$tt;
		if($i<2)continue;
	    $i2 = $i-2;
	    $n2 = floor($i2/$num);
	    $n3 = $i2-$n2*$num+1;
//		$t4[$i2] = $t2;
//		$t4[$n2][$n3] = $t2;

	    switch($names[$n3])
	    {
		case "addr":
		    $t2 = "0x".substr($t2,24);
		break;
		case "name":

		    $l2 = strlen($t2);
		    $s = "";
		    for($i2 = 0; $i2 < $l2;$i2 += 2)
		    {
			$tt = substr($t2,$i2,2);
//print "TT: $tt\n";
			if($tt == "00")break;
			$tt = hexdec($tt);
//print "TT: $tt ".chr($tt)."\n";
			$s .= chr($tt);
		    }
		    $t2 = $s;

		break;
		case "amount":
		    $t2 = hexdec($t2);
		    //$t2 /= 10**18;
		break;
		default:
		$t2 = hexdec($t2);
	    }
		$t4[$whats][$n2][$names[$n3]] = $t2;
//		$t4[$n2][$names[$n3]."_".$n3] = $t2;
//		$t4[$i] = $t2;
	    }
//	    $t4[$whats][$n2][amount2] = $t4[$whats][$n2][amount2] / 10 ** decimals($t4[$whats][$n2][addr]);
	    //$id = $t;
	break;
	case "deployer":
	    $v = "0x".substr($v,24);
	break;
	default:
	    $v = hexdec($v);
	    $v /= 10**18;
    }
}
//print_r($t4);

$d2 = $d."/bin/cache/tx/";

foreach($t4 as $k=>$v3)
{
    foreach($v3 as $n=>$v2)

//foreach($t4 as $k3=>$v3)
//{
//    foreach($v3 as $k=>$v)
    {
//print "$k $n ".print_r($v2,1)."\n";
    $t4[$k][$n][amount2] = $t4[$k][$n][amount] / 10 ** decimals($t4[$k][$n][addr]);
//	$tx = $d."tx_".
    $t = $contractAddress3[$k];
    $t = strtolower($t);
    $f = $d2."tx_".$t."_".$v2[tx_id];
//    $t4[$k][$n][file] = $f;
    if(file_exists($f))
    {
    $a = file_get_contents($f);
    $a = json_decode($a,1);
    $t4[$k][$n][tx] = $a[tx];
    }

    $t = $t4[$k][$n][utime];
    $t = date("Y-m-d H:i:s",$t);
    $t4[$k][$n][utc] = $t;

    }
}


//print_r($t4);
$o[result] = $t4;
//print_r($o);
