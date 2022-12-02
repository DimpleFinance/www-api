<?php
if(!function_exists("mas2sqlmas"))
{

function mas2sqlmas()
{
//        $debuger = check_debugger(__FUNCTION__);

$args = func_get_args();

$mas = $args[0];


//print_mas($mas);
if(is_array($mas))
{
reset($mas);
while($temp = each($mas))
{
        $val = $temp[1];
$devider = "'";

//if($val)
if(!(strpos($val,"INET_")===false))
$devider = "";

if($val == "NULL")
$devider = "";
$temp[1] = str_replace("'","\'",$temp[1]);
        $out[] = "`".$temp[0]."` = $devider".$temp[1]."$devider";
}
}
return $out;
}
}
?>