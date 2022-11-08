<?php

namespace Daypag\Objects;

class Multa
{
    public string $Aiip;
    public string $Guia;
    public string $CodSegmento;
    public string $CodEmpresaOrgao;
    public string $DataInfracao;
    public Municipio $Municipio;
    public Enquadramento $Enquadramento;
    public string $DataVencimento;
    public float $Valor;
    public OrgaoAutuador $OrgaoAutuador;

    public static function fromArray(array $multaRenainfDados): Multa
    {
        $multa = new Multa();
        $multa->setAiip($multaRenainfDados['Aiip']);
        $multa->setGuia($multaRenainfDados['Guia']);
        $multa->setCodSegmento($multaRenainfDados['CodSegmento']);
        $multa->setCodEmpresaOrgao($multaRenainfDados['CodEmpresaOrgao']);
        $multa->setDataInfracao($multaRenainfDados['DataInfracao']);
        $multa->setMunicipio(new Municipio($multaRenainfDados['Municipio']['CodFederal'], $multaRenainfDados['Municipio']['CodEstadual'], $multaRenainfDados['Municipio']['Nome']));
        $multa->setEnquadramento(new Enquadramento($multaRenainfDados['Enquadramento']['CodEnquadramento'], $multaRenainfDados['Enquadramento']['Descricao']));
        $multa->setDataVencimento($multaRenainfDados['DataVencimento']);
        $multa->setValor($multaRenainfDados['Valor']);
        $multa->setOrgaoAutuador(new OrgaoAutuador($multaRenainfDados['OrgaoAutuador']['CodOrgaoAutuador'], $multaRenainfDados['OrgaoAutuador']['Nome']));
        return $multa;
    }

    /**
     * @return string
     */
    public function getAiip(): string
    {
        return $this->Aiip;
    }

    /**
     * @param string $Aiip
     */
    public function setAiip(string $Aiip): void
    {
        $this->Aiip = $Aiip;
    }

    /**
     * @return string
     */
    public function getGuia(): string
    {
        return $this->Guia;
    }

    /**
     * @param string $Guia
     */
    public function setGuia(string $Guia): void
    {
        $this->Guia = $Guia;
    }

    /**
     * @return string
     */
    public function getCodSegmento(): string
    {
        return $this->CodSegmento;
    }

    /**
     * @param string $CodSegmento
     */
    public function setCodSegmento(string $CodSegmento): void
    {
        $this->CodSegmento = $CodSegmento;
    }

    /**
     * @return string
     */
    public function getCodEmpresaOrgao(): string
    {
        return $this->CodEmpresaOrgao;
    }

    /**
     * @param string $CodEmpresaOrgao
     */
    public function setCodEmpresaOrgao(string $CodEmpresaOrgao): void
    {
        $this->CodEmpresaOrgao = $CodEmpresaOrgao;
    }

    /**
     * @return string
     */
    public function getDataInfracao(): string
    {
        return $this->DataInfracao;
    }

    /**
     * @param string $DataInfracao
     */
    public function setDataInfracao(string $DataInfracao): void
    {
        $this->DataInfracao = $DataInfracao;
    }

    /**
     * @return Municipio
     */
    public function getMunicipio(): Municipio
    {
        return $this->Municipio;
    }

    /**
     * @param Municipio $Municipio
     */
    public function setMunicipio(Municipio $Municipio): void
    {
        $this->Municipio = $Municipio;
    }

    /**
     * @return Enquadramento
     */
    public function getEnquadramento(): Enquadramento
    {
        return $this->Enquadramento;
    }

    /**
     * @param Enquadramento $Enquadramento
     */
    public function setEnquadramento(Enquadramento $Enquadramento): void
    {
        $this->Enquadramento = $Enquadramento;
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
     * @return OrgaoAutuador
     */
    public function getOrgaoAutuador(): OrgaoAutuador
    {
        return $this->OrgaoAutuador;
    }

    /**
     * @param OrgaoAutuador $OrgaoAutuador
     */
    public function setOrgaoAutuador(OrgaoAutuador $OrgaoAutuador): void
    {
        $this->OrgaoAutuador = $OrgaoAutuador;
    }
}
