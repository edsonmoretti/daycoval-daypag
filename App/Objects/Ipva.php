<?php

namespace Daypag\Objects;

use Daypag\Enums\CotaIpva;

class Ipva
{
    public function __construct(public readonly float    $Valor,
                                public readonly string   $Exercicio,
                                public readonly CotaIpva $CotaIpva
    )
    {
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->Valor;
    }

    /**
     * @return mixed
     */
    public function getCotaIpva(): CotaIpva
    {
        return $this->CotaIpva;
    }

    /**
     * @return mixed
     */
    public function getExercicio()
    {
        return $this->Exercicio;
    }
}
