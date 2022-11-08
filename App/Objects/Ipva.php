<?php

namespace Daypag\Objects;

use Daypag\Enums\CotaIpva;

class Ipva
{
    public function __construct(private readonly float    $valor,
                                private readonly string   $exercicio,
                                private readonly CotaIpva $cotaIpva
    )
    {
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @return mixed
     */
    public function getCotaIpva(): CotaIpva
    {
        return $this->cotaIpva;
    }

    /**
     * @return mixed
     */
    public function getExercicio()
    {
        return $this->exercicio;
    }
}
