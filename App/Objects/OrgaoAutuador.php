<?php

namespace Daypag\Objects;

class OrgaoAutuador
{
    public function __construct(
        public readonly string $CodOrgaoAutuador,
        public readonly string $Nome,
    )
    {
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->Nome;
    }

    /**
     * @return string
     */
    public function getCodOrgaoAutuador(): string
    {
        return $this->CodOrgaoAutuador;
    }
}
