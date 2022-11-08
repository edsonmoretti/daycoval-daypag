<?php

namespace Daypag\Objects;

use Daypag\Enums\TipoRetorno;

class Retorno
{
    public function __construct(
        public readonly TipoRetorno $TipoRetorno,
        public readonly string $Mensagem
    )
    {
    }

    /**
     * @return string
     */
    public function getMensagem(): string
    {
        return $this->Mensagem;
    }

    /**
     * @return TipoRetorno
     */
    public function getTipoRetorno(): TipoRetorno
    {
        return $this->TipoRetorno;
    }
}
