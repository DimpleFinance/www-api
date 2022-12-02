<?php
function PosByNum($num)
{
        for($i=1;$i<256;$i++)
        {
            $t = 2**$i;
            if($t>$num)
            {
                $t = 2**($i-1);
                $o2[level] = $i;
                $o2[num] = $num - $t + 1;
                $i = 256;
            }
        }
return $o2;
}

?>