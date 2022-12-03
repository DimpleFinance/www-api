<?php
function decimals($addr)
{
    $add = strtolower($addr);
    switch($addr)
    {
	case "0xbfd995f0f67c1a3772146862132c2b716e745452":
	$o = 6;
	break;
	default:
	$o = 18;
    }
    return $o;
}