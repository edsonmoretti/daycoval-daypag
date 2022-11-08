<?php

namespace Daypag\Objects;

use Daypag\Enums\TipoVeiculo;

class DpvatAtual
{
    public float $Valor;
    public string $exercicio;
    public string $categoriaDpvat;
    public TipoVeiculo $TipoVeiculo;
    public string $DataVencimento;
    public string $DataVencimentoParcela1;
    public float $ValorParcela1;
    public string $DataVencimentoParcela2;
    public float $ValorParcela2;
    public string $DataVencimentoParcela3;
    public float $ValorParcela3;
    public string $DataVencimentoParcela4;
    public float $ValorParcela4;
    public string $DataVencimentoParcela5;
    public float $ValorParcela5;
    public string $DataVencimentoParcela6;
    public float $ValorParcela6;

    /**
     * @return float
     */
    public function getValor(): float
    {
        return $this->Valor;
    }

    /**
     * @param float $Valor
     */
    public function setValor(float $Valor): void
    {
        $this->Valor = $Valor;
    }

    /**
     * @return string
     */
    public function getExercicio(): string
    {
        return $this->exercicio;
    }

    /**
     * @param string $exercicio
     */
    public function setExercicio(string $exercicio): void
    {
        $this->exercicio = $exercicio;
    }

    /**
     * @return string
     */
    public function getCategoriaDpvat(): string
    {
        return $this->categoriaDpvat;
    }

    /**
     * @param string $categoriaDpvat
     */
    public function setCategoriaDpvat(string $categoriaDpvat): void
    {
        $this->categoriaDpvat = $categoriaDpvat;
    }

    /**
     * @return TipoVeiculo
     */
    public function getTipoVeiculo(): TipoVeiculo
    {
        return $this->TipoVeiculo;
    }

    /**
     * @param TipoVeiculo $TipoVeiculo
     */
    public function setTipoVeiculo(TipoVeiculo $TipoVeiculo): void
    {
        $this->TipoVeiculo = $TipoVeiculo;
    }

    /**
     * @return string
     */
    public function getDataVencimento(): string
    {
        return $this->DataVencimento;
    }

    /**
     * @param string $DataVencimento
     */
    public function setDataVencimento(string $DataVencimento): void
    {
        $this->DataVencimento = $DataVencimento;
    }

    /**
     * @return string
     */
    public function getDataVencimentoParcela1(): string
    {
        return $this->DataVencimentoParcela1;
    }

    /**
     * @param string $DataVencimentoParcela1
     */
    public function setDataVencimentoParcela1(string $DataVencimentoParcela1): void
    {
        $this->DataVencimentoParcela1 = $DataVencimentoParcela1;
    }

    /**
     * @return float
     */
    public function getValorParcela1(): float
    {
        return $this->ValorParcela1;
    }

    /**
     * @param float $ValorParcela1
     */
    public function setValorParcela1(float $ValorParcela1): void
    {
        $this->ValorParcela1 = $ValorParcela1;
    }

    /**
     * @return string
     */
    public function getDataVencimentoParcela2(): string
    {
        return $this->DataVencimentoParcela2;
    }

    /**
     * @param string $DataVencimentoParcela2
     */
    public function setDataVencimentoParcela2(string $DataVencimentoParcela2): void
    {
        $this->DataVencimentoParcela2 = $DataVencimentoParcela2;
    }

    /**
     * @return float
     */
    public function getValorParcela2(): float
    {
        return $this->ValorParcela2;
    }

    /**
     * @param float $ValorParcela2
     */
    public function setValorParcela2(float $ValorParcela2): void
    {
        $this->ValorParcela2 = $ValorParcela2;
    }

    /**
     * @return string
     */
    public function getDataVencimentoParcela3(): string
    {
        return $this->DataVencimentoParcela3;
    }

    /**
     * @param string $DataVencimentoParcela3
     */
    public function setDataVencimentoParcela3(string $DataVencimentoParcela3): void
    {
        $this->DataVencimentoParcela3 = $DataVencimentoParcela3;
    }

    /**
     * @return float
     */
    public function getValorParcela3(): float
    {
        return $this->ValorParcela3;
    }

    /**
     * @param float $ValorParcela3
     */
    public function setValorParcela3(float $ValorParcela3): void
    {
        $this->ValorParcela3 = $ValorParcela3;
    }

    /**
     * @return string
     */
    public function getDataVencimentoParcela4(): string
    {
        return $this->DataVencimentoParcela4;
    }

    /**
     * @param string $DataVencimentoParcela4
     */
    public function setDataVencimentoParcela4(string $DataVencimentoParcela4): void
    {
        $this->DataVencimentoParcela4 = $DataVencimentoParcela4;
    }

    /**
     * @return float
     */
    public function getValorParcela4(): float
    {
        return $this->ValorParcela4;
    }

    /**
     * @param float $ValorParcela4
     */
    public function setValorParcela4(float $ValorParcela4): void
    {
        $this->ValorParcela4 = $ValorParcela4;
    }

    /**
     * @return string
     */
    public function getDataVencimentoParcela5(): string
    {
        return $this->DataVencimentoParcela5;
    }

    /**
     * @param string $DataVencimentoParcela5
     */
    public function setDataVencimentoParcela5(string $DataVencimentoParcela5): void
    {
        $this->DataVencimentoParcela5 = $DataVencimentoParcela5;
    }

    /**
     * @return float
     */
    public function getValorParcela5(): float
    {
        return $this->ValorParcela5;
    }

    /**
     * @param float $ValorParcela5
     */
    public function setValorParcela5(float $ValorParcela5): void
    {
        $this->ValorParcela5 = $ValorParcela5;
    }

    /**
     * @return float
     */
    public function getValorParcela6(): float
    {
        return $this->ValorParcela6;
    }

    /**
     * @param float $ValorParcela6
     */
    public function setValorParcela6(float $ValorParcela6): void
    {
        $this->ValorParcela6 = $ValorParcela6;
    }

    /**
     * @return string
     */
    public function getDataVencimentoParcela6(): string
    {
        return $this->DataVencimentoParcela6;
    }

    /**
     * @param string $DataVencimentoParcela6
     */
    public function setDataVencimentoParcela6(string $DataVencimentoParcela6): void
    {
        $this->DataVencimentoParcela6 = $DataVencimentoParcela6;
    }


}
