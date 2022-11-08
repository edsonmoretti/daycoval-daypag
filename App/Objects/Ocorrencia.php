<?php

namespace Daypag\Objects;

class Ocorrencia
{
    public function __construct(public readonly string $CodOcorrencia,
                                public readonly string $Descricao)
    {
    }

    /**
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->Descricao;
    }

    /**
     * @return string
     */
    public function getCodOcorrencia(): string
    {
        return $this->CodOcorrencia;
    }
}
