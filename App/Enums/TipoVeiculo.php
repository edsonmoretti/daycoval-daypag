<?php

namespace Daypag\Enums;
/**
 * Identificação do DPVAT: 1-Oficial; 2-
 * Particular/Outros
 */
enum TipoVeiculo: int
{
    /**
     * Veículo Oficial
     */
    case OFICIAL = 1;
    /**
     * Particular/Outros
     */
    case PARTICULAR_OUTROS = 2;

    public static function valueOf(mixed $TipoVeiculo): TipoVeiculo|string
    {
        return self::from($TipoVeiculo) ?? '';
    }
}
