<?php

namespace App\Objects;

class Taxa
{
    public function __construct(private $valor,
                                private $descricao,
                                private $ano)
    {
    }

    /**
     * @return mixed
     */
    public function getAno()
    {
        return $this->ano;
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
    public function getValor()
    {
        return $this->valor;
    }
}
