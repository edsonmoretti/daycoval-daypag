<?php

namespace Daypag\Objects;

use Daypag\Enums\CodServico;
use Daypag\Enums\CotaDpvat;
use Daypag\Enums\CotaIpva;
use Daypag\Enums\TipoConsulta;
use Daypag\Enums\TipoCorreio;
use Daypag\Enums\TipoRetorno;
use Daypag\Enums\TipoVeiculo;

class DebitoResult
{
    public ?string $Renavan;
    public ?string $Placa;
    public ?string $Documento;
    public ?string $Exercicio;
    public ?string $Nome;
    public ?Municipio $Municipio;
    public CodServico $CodServico;
    public ?string $CodSubServico;
    public TipoConsulta $TipoConsulta;
    public ?Ocorrencia $Ocorrencia;
    public Retorno $Retorno;
    public string $DataMovimento;
    public ?\DateTime $DataHoraConsulta;
    public ?float $ValorTotal;
    public ?Correio $Correio;
    public ?float $ValorTaxas;
    public ?float $ValorIpvas;
    public ?float $ValorDpvats;
    public ?float $ValorMultas;
    public ?float $ValorMultasRenainf;
    /**
     * @var $Taxas Taxa[]
     */
    public array $Taxas;
    public IpvaAtual $IpvaAtual;
    /**
     * @var $Ipvas Ipva[]
     */
    public array $Ipvas;
    public DpvatAtual $DpvatAtual;
    /**
     * @var $Dpvats Dpvat[]
     */
    public array $Dpvats;
    /**
     * @var $Multas Multa[]
     */
    public array $Multas;
    /**
     * @var $MultasRenainf Multa[]
     */
    public array $MultasRenainf;

    public function __construct(\stdClass|array $data)
    {
        // if data instance of stdClass convert to array
        if ($data instanceof \stdClass) {
            $data = json_decode(json_encode($data), true);
        }

        $this->Renavan = $data['Renavan'] ?? null;
        $this->Placa = $data['Placa'] ?? null;
        $this->Documento = $data['Documento'] ?? null;
        $this->Exercicio = $data['Exercicio'] ?? null;
        $this->Nome = $data['Nome'] ?? null;
        $this->Municipio = isset($data['Municipio']) ? new Municipio($data['Municipio']['CodFederal'], $data['Municipio']['CodEstadual'], $data['Municipio']['Nome']) : null;
        $this->CodServico = CodServico::valueOf($data['CodServico']);
        $this->CodSubServico = $data['CodSubServico'] ?? null;
        $this->TipoConsulta = TipoConsulta::valueOf($data['TipoConsulta']);
        $this->Ocorrencia = isset($data['Ocorrencia']) ? new Ocorrencia($data['Ocorrencia']['CodOcorrencia'], $data['Ocorrencia']['Descricao']) : null;
        $this->Retorno = new Retorno(TipoRetorno::valueOf($data['Retorno']['TipoRetorno']), $data['Retorno']['Mensagem']);
        $this->DataMovimento = $data['DataMovimento'];
        $this->DataHoraConsulta = isset($data['DataHoraConsulta']) ? new \DateTime($data['DataHoraConsulta']) : null;
        $this->ValorTotal = $data['ValorTotal'] ?? null;
        $this->Correio = isset($data['Correio']) ? new Correio($data['Correio']['Valor'], TipoCorreio::valueOf($data['Correio']['TipoCorreio'])) : null;
        $this->ValorTaxas = $data['ValorTaxas'] ?? null;
        $this->ValorIpvas = $data['ValorIpvas'] ?? null;
        $this->ValorDpvats = $data['ValorDpvats'] ?? null;
        $this->ValorMultas = $data['ValorMultas'] ?? null;
        $this->ValorMultasRenainf = $data['ValorMultasRenainf'] ?? null;
        $this->Taxas = [];
        foreach ($data['Taxas'] ?? [] as $taxa) {
            $this->Taxas[] = new Taxa($taxa['Valor'], $taxa['Descricao'], $taxa['Ano']);
        }

        /* IVPA */
        if (isset($data['IpvaAtual'])) {
            $this->IpvaAtual = new IpvaAtual();
            $this->IpvaAtual->setExercicio($data['IpvaAtual']['Exercicio']);
            $this->IpvaAtual->setDataVencimentoComDesconto($data['IpvaAtual']['DataVencimentoComDesconto']);
            $this->IpvaAtual->setValorComDesconto($data['IpvaAtual']['ValorComDesconto']);
            $this->IpvaAtual->setDataVencimentoSemDesconto($data['IpvaAtual']['DataVencimentoSemDesconto']);
            $this->IpvaAtual->setValorSemDesconto($data['IpvaAtual']['ValorSemDesconto']);
            $this->IpvaAtual->setDataVencimentoParcela1($data['IpvaAtual']['DataVencimentoParcela1']);
            $this->IpvaAtual->setValorParcela1($data['IpvaAtual']['ValorParcela1']);
            $this->IpvaAtual->setDataVencimentoParcela2($data['IpvaAtual']['DataVencimentoParcela2']);
            $this->IpvaAtual->setValorParcela2($data['IpvaAtual']['ValorParcela2']);
            $this->IpvaAtual->setDataVencimentoParcela3($data['IpvaAtual']['DataVencimentoParcela3']);
            $this->IpvaAtual->setValorParcela3($data['IpvaAtual']['ValorParcela3']);
            $this->IpvaAtual->setDataVencimentoParcela4($data['IpvaAtual']['DataVencimentoParcela4']);
            $this->IpvaAtual->setValorParcela4($data['IpvaAtual']['ValorParcela4']);
            $this->IpvaAtual->setDataVencimentoParcela5($data['IpvaAtual']['DataVencimentoParcela5']);
            $this->IpvaAtual->setValorParcela5($data['IpvaAtual']['ValorParcela5']);
            $this->IpvaAtual->setDataVencimentoParcela6($data['IpvaAtual']['DataVencimentoParcela6']);
            $this->IpvaAtual->setValorParcela6($data['IpvaAtual']['ValorParcela6']);
        }
        $this->Ipvas = [];
        foreach ($data['Ipvas'] ?? [] as $ipva) {
            $this->Ipvas[] = new Ipva($ipva['Valor'], $ipva['Exercicio'], CotaIpva::valueOf($ipva['CotaIpva']));
        }

        /* DPVAT */
        if (isset($data['DpvatAtual'])) {
            $this->DpvatAtual = new DpvatAtual();
            $this->DpvatAtual->setValor($data['DpvatAtual']['Valor']);
            $this->DpvatAtual->setExercicio($data['DpvatAtual']['Exercicio']);
            $this->DpvatAtual->setCategoriaDpvat($data['DpvatAtual']['CategoriaDpvat']);
            $this->DpvatAtual->setTipoVeiculo(TipoVeiculo::valueOf($data['DpvatAtual']['TipoVeiculo']));
            $this->DpvatAtual->setDataVencimento($data['DpvatAtual']['DataVencimento']);
            $this->DpvatAtual->setDataVencimentoParcela1($data['DpvatAtual']['DataVencimentoParcela1']);
            $this->DpvatAtual->setValorParcela1($data['DpvatAtual']['ValorParcela1']);
            $this->DpvatAtual->setDataVencimentoParcela2($data['DpvatAtual']['DataVencimentoParcela2']);
            $this->DpvatAtual->setValorParcela2($data['DpvatAtual']['ValorParcela2']);
            $this->DpvatAtual->setDataVencimentoParcela3($data['DpvatAtual']['DataVencimentoParcela3']);
            $this->DpvatAtual->setValorParcela3($data['DpvatAtual']['ValorParcela3']);
            $this->DpvatAtual->setDataVencimentoParcela4($data['DpvatAtual']['DataVencimentoParcela4']);
            $this->DpvatAtual->setValorParcela4($data['DpvatAtual']['ValorParcela4']);
            $this->DpvatAtual->setDataVencimentoParcela5($data['DpvatAtual']['DataVencimentoParcela5']);
            $this->DpvatAtual->setValorParcela5($data['DpvatAtual']['ValorParcela5']);
            $this->DpvatAtual->setDataVencimentoParcela6($data['DpvatAtual']['DataVencimentoParcela6']);
            $this->DpvatAtual->setValorParcela6($data['DpvatAtual']['ValorParcela6']);
        }
        $this->Dpvats = [];
        foreach ($data['Dpvats'] ?? [] as $dpvat) {
            $this->Dpvats[] = new Dpvat(
                $dpvat['Valor'],
                $dpvat['Exercicio'],
                CotaDpvat::valueOf($dpvat['CotaDpvat']),
                $dpvat['CategoriaDpvat'],
                TipoVeiculo::valueOf($dpvat['TipoVeiculo'])
            );
        }

        /* MULTAS */
        $this->Multas = [];
        foreach ($data['Multas'] ?? [] as $multaDados) {
            $this->Multas[] = Multa::fromArray($multaDados);
        }
        $this->MultasRenainf = [];
        foreach ($data['MultasRenainf'] ?? [] as $multaRenainfDados) {
            $this->MultasRenainf[] = Multa::fromArray($multaRenainfDados);
        }
    }

    /**
     * @return string|null
     */
    public function getRenavan(): ?string
    {
        return $this->Renavan;
    }

    /**
     * @return string|null
     */
    public function getPlaca(): ?string
    {
        return $this->Placa;
    }

    /**
     * @return string|null
     */
    public function getDocumento(): ?string
    {
        return $this->Documento;
    }

    /**
     * @return string|null
     */
    public function getExercicio(): ?string
    {
        return $this->Exercicio;
    }

    /**
     * @return string|null
     */
    public function getNome(): ?string
    {
        return $this->Nome;
    }

    /**
     * @return Municipio|null
     */
    public function getMunicipio(): ?Municipio
    {
        return $this->Municipio;
    }

    /**
     * @return CodServico
     */
    public function getCodServico(): CodServico
    {
        return $this->CodServico;
    }

    /**
     * @return string|null
     */
    public function getCodSubServico(): ?string
    {
        return $this->CodSubServico;
    }

    /**
     * @return TipoConsulta
     */
    public function getTipoConsulta(): TipoConsulta
    {
        return $this->TipoConsulta;
    }

    /**
     * @return Ocorrencia|null
     */
    public function getOcorrencia(): ?Ocorrencia
    {
        return $this->Ocorrencia;
    }

    /**
     * @return Retorno
     */
    public function getRetorno(): Retorno
    {
        return $this->Retorno;
    }

    /**
     * @return string
     */
    public function getDataMovimento(): string
    {
        return $this->DataMovimento;
    }

    /**
     * @return \DateTime|null
     */
    public function getDataHoraConsulta(): ?\DateTime
    {
        return $this->DataHoraConsulta;
    }

    /**
     * @return float|null
     */
    public function getValorTotal(): ?float
    {
        return $this->ValorTotal;
    }

    /**
     * @return Correio|null
     */
    public function getCorreio(): ?Correio
    {
        return $this->Correio;
    }

    /**
     * @return float|null
     */
    public function getValorTaxas(): ?float
    {
        return $this->ValorTaxas;
    }

    /**
     * @return float|null
     */
    public function getValorIpvas(): ?float
    {
        return $this->ValorIpvas;
    }

    /**
     * @return float|null
     */
    public function getValorDpvats(): ?float
    {
        return $this->ValorDpvats;
    }

    /**
     * @return float|null
     */
    public function getValorMultas(): ?float
    {
        return $this->ValorMultas;
    }

    /**
     * @return float|null
     */
    public function getValorMultasRenainf(): ?float
    {
        return $this->ValorMultasRenainf;
    }

    /**
     * @return array
     */
    public function getTaxas(): array
    {
        return $this->Taxas;
    }

    /**
     * @return IpvaAtual
     */
    public function getIpvaAtual(): IpvaAtual
    {
        return $this->IpvaAtual;
    }

    /**
     * @return array
     */
    public function getIpvas(): array
    {
        return $this->Ipvas;
    }

    /**
     * @return DpvatAtual
     */
    public function getDpvatAtual(): DpvatAtual
    {
        return $this->DpvatAtual;
    }

    /**
     * @return array
     */
    public function getDpvats(): array
    {
        return $this->Dpvats;
    }

    /**
     * @return array
     */
    public function getMultas(): array
    {
        return $this->Multas;
    }

    /**
     * @return array
     */
    public function getMultasRenainf(): array
    {
        return $this->MultasRenainf;
    }

    /**
     * @return string contendo getOcorrencia()->getCodOcorrencia()
     */
    public function getCodOcorrencia():string
    {
        return $this->getOcorrencia()->getCodOcorrencia();
    }

}
