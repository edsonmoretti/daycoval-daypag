<?php

namespace Daypag\Objects;

class Municipio
{
    public function __construct(public string $CodFederal, public string $CodEstadual, public string $Nome)
    {
    }

    /**
     * @return string
     */
    public function getCodEstadual(): string
    {
        return $this->CodEstadual;
    }

    /**
     * @return string
     */
    public function getCodFederal(): string
    {
        return $this->CodFederal;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->Nome;
    }
}
