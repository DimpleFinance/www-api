<?php
//use kornrunner\Keccak;

function eth_getCanonicalAddress($address)
{
            if (!preg_match('/^0x[a-fA-F0-9]{40}$/', $address)) {
                return NULL;
            }

            $address = substr($address, 2);
            $addressHash =  kornrunner\Keccak::hash(strtolower($address), 256);
            $addressArray = str_split($address);
            $addressHashArray = str_split($addressHash);

            $ret = '';

            for ($i = 0; $i < 40; $i++) {
                // the nth letter should be uppercase if the nth digit of casemap is 1
                if (intval($addressHashArray[$i], 16) > 7) {
                    $ret .= strtoupper($addressArray[$i]);
                } else /*if (intval($addressHashArray[$i], 16) <= 7)*/ {
                    $ret .= strtolower($addressArray[$i]);
                }
            }

            return '0x' . $ret;
        
}


?>