<?php

namespace Daypag\Enums;
/**
 * Forma de Pagamento = “D” - Débito em Conta ou “C”
 * - Troca de Cheque (Caso não seja preenchida, a
 * forma de pagamento “D” - Débito em Conta será
 * assumida como padrão)
 */
enum FormaPagamento: string
{
    case DEBITO_EM_CONTA = 'D';
    case TROCA_DE_CHEQUE = 'C';

    public static function valueOf($value): FormaPagamento|string
    {
        return self::from($value) ?? '';
    }

    public function toStrin()
    {
        return $this->value;
    }
}
