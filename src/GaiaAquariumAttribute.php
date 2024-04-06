<?php

namespace Glowgaia\Gappy;

use GlowGaia\Grabbit\Grabbit;

class GaiaAquariumAttribute{
    public static function get($which = 0){
        $attributes = Grabbit::make(6500, [1])->grab()->first()->except('attributes');
        if($which){
            return $attributes->slice($which, 1);
        }

        return $attributes;
    }
}