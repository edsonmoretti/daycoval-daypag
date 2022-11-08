<?php

namespace App\Objects;

use App\Enums\CotaDpvat;
use App\Enums\TipoVeiculo;

class Dpvat
{
    public function __construct(
        private readonly float       $valor,
        private readonly string      $exercicio,
        private readonly CotaDpvat   $cotaIpva,
        private readonly string      $categoriaDpvat,
        private readonly TipoVeiculo $tipoVeiculo
    )
    {
    }

    /**
     * @return string
     */
    public function getExercicio(): string
    {
        return $this->exercicio;
    }

    /**
     * @return CotaDpvat
     */
    public function getCotaIpva(): CotaDpvat
    {
        return $this->cotaIpva;
    }

    /**
     * @return float
     */
    public function getValor(): float
    {
        return $this->valor;
    }

    /**
     * @return string
     */
    public function getCategoriaDpvat(): string
    {
        return $this->categoriaDpvat;
    }

    /**
     * @return TipoVeiculo
     */
    public function getTipoVeiculo(): TipoVeiculo
    {
        return $this->tipoVeiculo;
    }
}
