<?php
//phpinfo();
$d = __DIR__."/";
$exec = "ls $d";
exec($exec,$reg);
//print_r($reg);
foreach($reg as $f)
{
    $tf = $d.$f;
    $t = pathinfo($tf);
    if($t[extension] != "php")continue;

    $n = $t[filename];
//    print_r($t);
//    print $n."<br>\n";
    $names[$n] = $f;
}
ksort($names);
//print_r($names);
foreach($names as $k=>$v)
{
    $t = $url.$k;
    $o[result][$k] = $t;
}

?>