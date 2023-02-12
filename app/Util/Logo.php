<?php

namespace App\Util;

class Logo
{

    public static function getLogo(): array
    {
        $logo = [];
        foreach ([1000, 500, 256, 107, 50] as $d) {
            $logo[$d] = url("/assets_padrao/images/logo/full/$d\tpx/base.png");
        }

        return $logo;
    }


}
