<?php

namespace Daypag\Enums;

enum CodServico: int
{
    case TRANSFERENCIA = 1;
    case LICENCIAMENTO = 2;
    case LICENCIAMENTO_TRANSFERENCIA = 3;
    case SEGUNDA_VIA_TRANSFERENCIA = 5;
    case PRIMEIRO_REGISTRO = 6;
    case PAGAMENTO_DE_DEBITOS = 7;
    case IPVA = 8;
    case DPVAT = 9;
    case MULTAS_TRANSITO = 10;
    case MULTAS_RENAINF = 11;
    case TAXAS_DETRAN = 12;

    public function toString(): string
    {
        return (string)$this->value;
    }

    public function toInt(): int
    {
        return $this->value;
    }

    public static function valueOf(int $value): ?CodServico
    {
        return self::from($value) ?? null;
    }
}


