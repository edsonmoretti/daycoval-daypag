<?php

namespace App\Enums;

enum TipoRetorno: int
{
    case ERRO = 9;
    case SUCESSO = 0;

    public static function valueOf(int|string $value): TipoRetorno|string
    {
        return self::from($value) ?? '';
    }

    public function toString(): string
    {
        return (string)$this->value;
    }

}
