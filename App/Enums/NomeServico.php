<?php

namespace App\Enums;

enum NomeServico: string
{
    case TRANSFERENCIA = 'TRANSFERÊNCIA';
    case LICENCIAMENTO = 'LICENCIAMENTO';
    case LICENCIAMENTO_TRANSFERENCIA = 'LICENCIAMENTO + TRANSFERÊNCIA';
    case VIA_TRANSFERENCIA = '2º VIA DE TRANSFERÊNCIA';
    case REGISTRO = '1º REGISTRO';
    case PAGAMENTO_DEBITOS = 'PAGAMENTO DE DÉBITOS';
    case IPVA = 'IPVA';
    case DPVAT = 'DPVAT';
    case MULTAS_TRANSITO = 'MULTAS DE TRÂNSITO';
    case MULTAS_RENAINF = 'MULTAS RENAINF';
    case TAXAS_DETRAN = 'TAXAS DETRAN';
    case NAO_INFORMADO = 'NAO INFORMADO';

    /**
     * @return string
     */
    public static function valueOf(string|int|CodServico $cod): NomeServico
    {
        if ($cod instanceof CodServico) {
            $cod = $cod->value;
        }
        if (is_int($cod)) {
            $cod = (string)$cod;
        }
        return match ($cod) {
            '1' => self::TRANSFERENCIA,
            '2' => self::LICENCIAMENTO,
            '3' => self::LICENCIAMENTO_TRANSFERENCIA,
            '4' => self::VIA_TRANSFERENCIA,
            '5' => self::REGISTRO,
            '6' => self::PAGAMENTO_DEBITOS,
            '7' => self::IPVA,
            '8' => self::DPVAT,
            '9' => self::MULTAS_TRANSITO,
            '10' => self::MULTAS_RENAINF,
            '11' => self::TAXAS_DETRAN,
            default => self::NAO_INFORMADO,
        };
    }
}


