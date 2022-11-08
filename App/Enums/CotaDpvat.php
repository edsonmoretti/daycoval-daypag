<?php

namespace App\Enums;

enum CotaDpvat: int
{
    case PARCELA_UNICA = 9;

    public static function valueOf(mixed $CotaDpvat): CotaDpvat|string
    {
        return self::from($CotaDpvat) ?? '';
    }
}
