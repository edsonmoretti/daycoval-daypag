<?php

namespace Daypag\Enums;
/**
 * TipoCorreio Sendo: 1 – Obrigatório; 2- Não
 * pode receber em casa; 3 - Opcional
 */
enum TipoCorreio: int
{
    case OBRIGATORIO = 1;
    case NAO_PODE_RECEBER_EM_CASA = 2;
    case OPCIONAL = 3;

    public static function valueOf(mixed $TipoCorreio): TipoCorreio|string
    {
        return self::from($TipoCorreio) ?? '';
    }
}
