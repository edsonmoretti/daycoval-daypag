<?php

namespace Daypag\Enums;

enum Ambiente: string
{
    case PRODUCAO = 'producao';
    case HOMOLOGACAO = 'homologacao';

    public function toString()
    {
        return $this->value;
    }

    public static function valueOf($value)
    {
        $value = strtolower($value . '');
        return match ($value) {
            'producao', 'p', 'prod', '1' => self::PRODUCAO,
            'homologacao', 'h', 'homolog', '2' => self::HOMOLOGACAO,
            default => throw new \InvalidArgumentException("Invalid value '$value'"),
        };
    }
}
