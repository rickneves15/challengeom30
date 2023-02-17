<?php

namespace App\Fake;

use Faker\Provider\Base;

class CNSProvider extends Base
{
    public function cns(): string
    {
        return $this->getCNS();
    }

    function getCns()
    {
        $cns = "";
        while (strlen($cns) !== 15) {
            $n1 = rand(1, 3);
            if ($n1 === 3) {
                $n1 = rand(7, 9);
            }
            $n2 = str_pad(rand(1, 99999), 5, "0", STR_PAD_LEFT);
            $n3 = str_pad(rand(1, 99999), 5, "0", STR_PAD_LEFT);
            $cns = $n1 . substr($n2, -5) . substr($n3, -5);
            $soma =
                (int)$cns[0] * 15 +
                (int)$cns[1] * 14 +
                (int)$cns[2] * 13 +
                (int)$cns[3] * 12 +
                (int)$cns[4] * 11 +
                (int)$cns[5] * 10 +
                (int)$cns[6] * 9 +
                (int)$cns[7] * 8 +
                (int)$cns[8] * 7 +
                (int)$cns[9] * 6 +
                (int)$cns[10] * 5;
            $resto = $soma % 11;
            $dv = 11 - $resto;
            $dv = $dv === 11 ? 0 : $dv;
            if ($dv === 10) {
                $soma =
                    (int)$cns[0] * 15 +
                    (int)$cns[1] * 14 +
                    (int)$cns[2] * 13 +
                    (int)$cns[3] * 12 +
                    (int)$cns[4] * 11 +
                    (int)$cns[5] * 10 +
                    (int)$cns[6] * 9 +
                    (int)$cns[7] * 8 +
                    (int)$cns[8] * 7 +
                    (int)$cns[9] * 6 +
                    (int)$cns[10] * 5 +
                    2;
                $resto = $soma % 11;
                $dv = 11 - $resto;
                $cns .= "001" . (string)$dv;
            } else {
                $cns .= "000" . (string)$dv;
            }
            if (strlen($cns) === 15) {
                return $cns;
            }
        }
    }
}
