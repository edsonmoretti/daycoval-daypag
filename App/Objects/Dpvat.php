<?php

namespace Daypag\Objects;

use Daypag\Enums\CotaDpvat;
use Daypag\Enums\TipoVeiculo;

class Dpvat
{
    public function __construct(
        public readonly float       $Valor,
        public readonly string      $Exercicio,
        public readonly CotaDpvat   $CotaIpva,
        public readonly string      $CategoriaDpvat,
        public readonly TipoVeiculo $TipoVeiculo
    )
    {
    }

    /**
     * @return string
     */
    public function getExercicio(): string
    {
        return $this->Exercicio;
    }

    /**
     * @return CotaDpvat
     */
    public function getCotaIpva(): CotaDpvat
    {
        return $this->CotaIpva;
    }

    /**
     * @return float
     */
    public function getValor(): float
    {
        return $this->Valor;
    }

    /**
     * @return string
     */
    public function getCategoriaDpvat(): string
    {
        return $this->CategoriaDpvat;
    }

    /**
     * @return TipoVeiculo
     */
    public function getTipoVeiculo(): TipoVeiculo
    {
        return $this->TipoVeiculo;
    }
}
