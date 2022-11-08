<?php

namespace App\Objects;

class Municipio
{
    public function __construct(private string $codFederal, private string $codEstadual, private string $nome)
    {
    }

    /**
     * @return string
     */
    public function getCodEstadual(): string
    {
        return $this->codEstadual;
    }

    /**
     * @return string
     */
    public function getCodFederal(): string
    {
        return $this->codFederal;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }
}
