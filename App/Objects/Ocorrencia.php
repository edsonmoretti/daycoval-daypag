<?php

namespace Daypag\Objects;
class Ocorrencia
{
    public function __construct(private readonly string $codOcorrencia,
                                private readonly string $descricao)
    {
    }

    /**
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * @return string
     */
    public function getCodOcorrencia(): string
    {
        return $this->codOcorrencia;
    }
}
