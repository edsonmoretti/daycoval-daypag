<?php

namespace App\Enums;
/**
 * Tipo da Consulta = “S” – Simples ou “D” –
 * Detalhada (Na consulta do Tipo S-Simples o
 * Json de retorno conterá somente os valores
 * totais dos débitos e na consulta do tipo DDetalhada o retorno conterá os detalhes dos
 * débitos.
 */
enum TipoConsulta: string
{
    case SIMPLES = 'S';
    case DETALHADA = 'D';

    public static function valueOf(string $TipoConsulta): ?TipoConsulta
    {
        return match ($TipoConsulta) {
            'S' => self::SIMPLES,
            'D' => self::DETALHADA,
            default => null,
        };
    }

    public function toString(): string
    {
        return $this->value;
    }
}
