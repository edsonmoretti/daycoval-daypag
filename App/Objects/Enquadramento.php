<?php

namespace App\Objects;

class Enquadramento
{
    public function __construct(
        private readonly string $codEnquadramento,
        private readonly string $descricao
    )
    {
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @return mixed
     */
    public function getCodEnquadramento()
    {
        return $this->codEnquadramento;
    }
}
