<?php

namespace Daypag\Enums;

enum VersaoApi: string
{
    case V1 = '';
    case V2 = 'v2';

    public static function valueOf($value): VersaoApi
    {
        $value = strtolower($value . '');
        return match ($value) {
            'v2', '2' => self::V2,
            default => self::V1,
        };
    }

    public function toString(): string
    {
        return $this->value;
    }
}
