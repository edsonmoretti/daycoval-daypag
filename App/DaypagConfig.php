<?php

namespace App;

use App\Enums\Ambiente;
use App\Enums\FormaPagamento;
use App\Enums\VersaoApi;

class DaypagConfig
{
    public function __construct(
        public readonly string  $token,
        public ?array           $urls = [
            'homologacao' => 'http://187.9.76.122:8901',
            'producao' => 'http://172.23.64.82:8090',
        ],
        private ?Ambiente       $ambiente = Ambiente::HOMOLOGACAO,
        private ?FormaPagamento $formaPagamento = FormaPagamento::DEBITO_EM_CONTA)
    {
        if ($this->urls == null) {
            $this->urls = [
                'homologacao' => 'http://187.9.76.122:8901',
                'producao' => 'http://172.23.64.82:8090',
            ];
        }
        if ($this->ambiente == null) {
            $this->ambiente = Ambiente::HOMOLOGACAO;
        }
        if ($this->formaPagamento == null) {
            $this->formaPagamento = FormaPagamento::DEBITO_EM_CONTA;
        }
    }

    /**
     * @return string
     */
    public
    function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param FormaPagamento $formaPagamento
     */
    public
    function setFormaPagamento(FormaPagamento $formaPagamento): void
    {
        $this->formaPagamento = $formaPagamento;
    }

    /**
     * @return FormaPagamento
     */
    public
    function getFormaPagamento(): FormaPagamento
    {
        return $this->formaPagamento;
    }

    /**
     * @param Ambiente $ambiente
     */
    public
    function setAmbiente(Ambiente $ambiente): void
    {
        $this->ambiente = $ambiente;
    }

    /**
     * @return Ambiente
     */
    public
    function getAmbiente(): Ambiente
    {
        return $this->ambiente;
    }

    /**
     * @param array $urls
     */
    public
    function setUrls(array $urls): void
    {
        $this->urls = $urls;
    }

    /**
     * @return array
     */
    public
    function getUrls(): array
    {
        return $this->urls;
    }

    /**
     * @param VersaoApi $versaoApi
     */
    public
    function setVersaoApi(VersaoApi $versaoApi): void
    {
        $this->versaoApi = $versaoApi;
    }

    /**
     * @return VersaoApi
     */
    public
    function getVersaoApi(): VersaoApi
    {
        return $this->versaoApi;
    }
}
