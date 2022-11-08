<?php

namespace Daypag\Objects;

use Daypag\Enums\TipoRetorno;

class Retorno
{
    public function __construct(
        private readonly TipoRetorno $tipoRetorno,
        private readonly string      $mensagem
    )
    {
    }

    /**
     * @return string
     */
    public function getMensagem(): string
    {
        return $this->mensagem;
    }

    /**
     * @return TipoRetorno
     */
    public function getTipoRetorno(): TipoRetorno
    {
        return $this->tipoRetorno;
    }
}
