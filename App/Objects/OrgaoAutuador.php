<?php

namespace App\Objects;

class OrgaoAutuador
{
    public function __construct(
        private readonly string $codOrgaoAutuador,
        private readonly string $nome,
    )
    {
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getCodOrgaoAutuador(): string
    {
        return $this->codOrgaoAutuador;
    }
}
