<?php

namespace Daypag\Objects;

class Multa
{
    private string $aiip;
    private string $guia;
    private string $codSegmento;
    private string $codEmpresaOrgao;
    private string $dataInfracao;
    private Municipio $municipio;
    private Enquadramento $enquadramento;
    private string $dataVencimento;
    private float $valor;
    private OrgaoAutuador $orgaoAutuador;

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
        return $this->aiip;
    }

    /**
     * @param string $aiip
     */
    public function setAiip(string $aiip): void
    {
        $this->aiip = $aiip;
    }

    /**
     * @return string
     */
    public function getGuia(): string
    {
        return $this->guia;
    }

    /**
     * @param string $guia
     */
    public function setGuia(string $guia): void
    {
        $this->guia = $guia;
    }

    /**
     * @return string
     */
    public function getCodSegmento(): string
    {
        return $this->codSegmento;
    }

    /**
     * @param string $codSegmento
     */
    public function setCodSegmento(string $codSegmento): void
    {
        $this->codSegmento = $codSegmento;
    }

    /**
     * @return string
     */
    public function getCodEmpresaOrgao(): string
    {
        return $this->codEmpresaOrgao;
    }

    /**
     * @param string $codEmpresaOrgao
     */
    public function setCodEmpresaOrgao(string $codEmpresaOrgao): void
    {
        $this->codEmpresaOrgao = $codEmpresaOrgao;
    }

    /**
     * @return string
     */
    public function getDataInfracao(): string
    {
        return $this->dataInfracao;
    }

    /**
     * @param string $dataInfracao
     */
    public function setDataInfracao(string $dataInfracao): void
    {
        $this->dataInfracao = $dataInfracao;
    }

    /**
     * @return Municipio
     */
    public function getMunicipio(): Municipio
    {
        return $this->municipio;
    }

    /**
     * @param Municipio $municipio
     */
    public function setMunicipio(Municipio $municipio): void
    {
        $this->municipio = $municipio;
    }

    /**
     * @return Enquadramento
     */
    public function getEnquadramento(): Enquadramento
    {
        return $this->enquadramento;
    }

    /**
     * @param Enquadramento $enquadramento
     */
    public function setEnquadramento(Enquadramento $enquadramento): void
    {
        $this->enquadramento = $enquadramento;
    }

    /**
     * @return string
     */
    public function getDataVencimento(): string
    {
        return $this->dataVencimento;
    }

    /**
     * @param string $dataVencimento
     */
    public function setDataVencimento(string $dataVencimento): void
    {
        $this->dataVencimento = $dataVencimento;
    }

    /**
     * @return float
     */
    public function getValor(): float
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     */
    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }

    /**
     * @return OrgaoAutuador
     */
    public function getOrgaoAutuador(): OrgaoAutuador
    {
        return $this->orgaoAutuador;
    }

    /**
     * @param OrgaoAutuador $orgaoAutuador
     */
    public function setOrgaoAutuador(OrgaoAutuador $orgaoAutuador): void
    {
        $this->orgaoAutuador = $orgaoAutuador;
    }
}
