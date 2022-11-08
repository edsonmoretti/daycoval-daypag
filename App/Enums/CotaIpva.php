<?php

namespace App\Enums;

enum CotaIpva: int
{
    case PRIMEIRA_PARCELA = 1;
    case SEGUNDA_PARCELA = 2;
    case TERCEIRA_PARCELA = 3;
    case QUARTA_PARCELA = 4;
    case QUINTA_PARCELA = 5;
    case SEXTA_PARCELA = 6;
    case VALOR_COM_DESCONTO = 7;
    case VALOR_SEM_DESCONTO = 8;

    public static function valueOf(mixed $CotaIpva): CotaIpva|string
    {
        return self::from($CotaIpva) ?? '';
    }
}
