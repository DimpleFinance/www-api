<?php
function RefShow($data) 
{
$d = __DIR__;
$f = $d."/".__FUNCTION__.".sol";
$a = file_get_contents($f);
$a = trim($a);

$m = explode("\n",$a);
$nn = 0;
foreach($m as $l)
{
    $l = trim($l);
    $l = str_replace(";","",$l);
    $t = explode(" ",$l);
    $keys[$nn] = $t[1];
    $nn++;
}
//print_r($keys);die;
	$t = $data;
        //$t = $v2[result];
        $t = substr($t,2);
        $l = strlen($t)/64;
            for($i=0;$i<$l;$i++)
            {
                $skip = 0;
                $t2 = substr($t,$i*64,64);
//print $i."\t".$t2."\n";

                $t3 = hexdec($t2);
                switch($keys[$i])
                {
                    case "b1":
                        $t4[bb1] = $t3;
                        $t3 /= 10**6;
                        $t3 = round($t3,2);
                    break;
                    case "b2":
                        $t4[bb2] = $t3;
                        $t3 /= 10**18;
                        $t3 = round($t3,8);
                    break;


                    case "delta":
                        //$t4[delta1] = $t3/10**18;
                        //$t4[delta2] = $t3/10**6;
                    break;
                    case "AtoB":
                        if($t3)$n = "SwapT1T2";else $n = "SwapT2T1";

                        //$t4[AtoBname] = $n;
                        $skip = 1;

                    break;
                    case "BtoA":
                        $skip = 1;
                    break;
                    case "addr":
                        $t3 = "0x".substr($t2,24);
                    break;
                    case "utime":
                        $t3 = date("Y-m-d H:i:s",$t3-3600);
                    break;
/*
                    case "liqUsdc":
                        $t3 = $t3/10**6;
                        $t3 = round($t3,2);
                        $t4[usdc] = $t3+$t4[b1];
                    break;
                    case "tick":
                        $tt = 1.0001**$t3;
                        $tt /= 10**12;
                        $tt = 1/$tt;
                        $tt = round($tt,2);
                        $t4[rate] = $tt;
                    break;
*/
		    case "set":
			if($t3)	$t3 = "true";
			else	$t3 = "false";    
		    break;
		    case "hash":
			$t2 = substr($t2,0,8);
			$t3 = $t2;    
		    break;
                }
                if(!$skip)
                $t4[$keys[$i]] = $t3;

            }
//        print_r($t4);
    return $t4;
}
/*
$data = "0x00000000000000000000000000000000000000000000000000000000000000010000000000000000000000008626f6940e2eb28930efb4cef49b2d1f2c9c1199d144963d000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000062b4b4f90000000000000000000000000000000000000000000000000000000000000000";
$data = "0x00000000000000000000000000000000000000000000000000000000000000010000000000000000000000008626f6940e2eb28930efb4cef49b2d1f2c9c11990000000000000000000000000000000000000000000000000000000062b599ba2cbbae52000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";
$data = "0x00000000000000000000000000000000000000000000000000000000000000010000000000000000000000008626f6940e2eb28930efb4cef49b2d1f2c9c11996f6b0d7b0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000062b59abb";

$t = RefShow($data);
print_r($t);
*/