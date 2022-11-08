<?php

namespace Daypag\Objects;

class Enquadramento
{
    public function __construct(
        public readonly string $CodEnquadramento,
        public readonly string $Descricao
    )
    {
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->Descricao;
    }

    /**
     * @return mixed
     */
    public function getCodEnquadramento()
    {
        return $this->CodEnquadramento;
    }
}
