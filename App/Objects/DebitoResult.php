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
    private ?string $renavan;
    private ?string $placa;
    private ?string $documento;
    private ?string $exercicio;
    private ?string $nome;
    private ?Municipio $municipio;
    private CodServico $codServico;
    private ?string $codSubServico;
    private TipoConsulta $tipoConsulta;
    private ?Ocorrencia $ocorrencia;
    private Retorno $retorno;
    private string $dataMovimento;
    private ?\DateTime $dataHoraConsulta;
    private ?float $valorTotal;
    private ?Correio $correio;
    private ?float $valorTaxas;
    private ?float $valorIpvas;
    private ?float $valorDpvats;
    private ?float $valorMultas;
    private ?float $valorMultasRenainf;
    /**
     * @var $taxas Taxa[]
     */
    private array $taxas;
    private IpvaAtual $ipvaAtual;
    /**
     * @var $ipvas Ipva[]
     */
    private array $ipvas;
    private DpvatAtual $dpvatAtual;
    /**
     * @var $dpvats Dpvat[]
     */
    private array $dpvats;
    /**
     * @var $multas Multa[]
     */
    private array $multas;
    /**
     * @var $multasRenainf Multa[]
     */
    private array $multasRenainf;

    public function __construct(\stdClass|array $data)
    {
        // if data instance of stdClass convert to array
        if ($data instanceof \stdClass) {
            $data = json_decode(json_encode($data), true);
        }

        $this->renavan = $data['Renavan'] ?? null;
        $this->placa = $data['Placa'] ?? null;
        $this->documento = $data['Documento'] ?? null;
        $this->exercicio = $data['Exercicio'] ?? null;
        $this->nome = $data['Nome'] ?? null;
        $this->municipio = isset($data['Municipio']) ? new Municipio($data['Municipio']['CodFederal'], $data['Municipio']['CodEstadual'], $data['Municipio']['Nome']) : null;
        $this->codServico = CodServico::valueOf($data['CodServico']);
        $this->codSubServico = $data['CodSubServico'] ?? null;
        $this->tipoConsulta = TipoConsulta::valueOf($data['TipoConsulta']);
        $this->ocorrencia = isset($data['Ocorrencia']) ? new Ocorrencia($data['Ocorrencia']['CodOcorrencia'], $data['Ocorrencia']['Descricao']) : null;
        $this->retorno = new Retorno(TipoRetorno::valueOf($data['Retorno']['TipoRetorno']), $data['Retorno']['Mensagem']);
        $this->dataMovimento = $data['DataMovimento'];
        $this->dataHoraConsulta = isset($data['DataHoraConsulta']) ? new \DateTime($data['DataHoraConsulta']) : null;
        $this->valorTotal = $data['ValorTotal'] ?? null;
        $this->correio = isset($data['Correio']) ? new Correio($data['Correio']['Valor'], TipoCorreio::valueOf($data['Correio']['TipoCorreio'])) : null;
        $this->valorTaxas = $data['ValorTaxas'] ?? null;
        $this->valorIpvas = $data['ValorIpvas'] ?? null;
        $this->valorDpvats = $data['ValorDpvats'] ?? null;
        $this->valorMultas = $data['ValorMultas'] ?? null;
        $this->valorMultasRenainf = $data['ValorMultasRenainf'] ?? null;
        $this->taxas = [];
        foreach ($data['Taxas'] ?? [] as $taxa) {
            $this->taxas[] = new Taxa($taxa['Valor'], $taxa['Descricao'], $taxa['Ano']);
        }

        /* IVPA */
        if (isset($data['IpvaAtual'])) {
            $this->ipvaAtual = new IpvaAtual();
            $this->ipvaAtual->setExercicio($data['IpvaAtual']['Exercicio']);
            $this->ipvaAtual->setDataVencimentoComDesconto($data['IpvaAtual']['DataVencimentoComDesconto']);
            $this->ipvaAtual->setValorComDesconto($data['IpvaAtual']['ValorComDesconto']);
            $this->ipvaAtual->setDataVencimentoSemDesconto($data['IpvaAtual']['DataVencimentoSemDesconto']);
            $this->ipvaAtual->setValorSemDesconto($data['IpvaAtual']['ValorSemDesconto']);
            $this->ipvaAtual->setDataVencimentoParcela1($data['IpvaAtual']['DataVencimentoParcela1']);
            $this->ipvaAtual->setValorParcela1($data['IpvaAtual']['ValorParcela1']);
            $this->ipvaAtual->setDataVencimentoParcela2($data['IpvaAtual']['DataVencimentoParcela2']);
            $this->ipvaAtual->setValorParcela2($data['IpvaAtual']['ValorParcela2']);
            $this->ipvaAtual->setDataVencimentoParcela3($data['IpvaAtual']['DataVencimentoParcela3']);
            $this->ipvaAtual->setValorParcela3($data['IpvaAtual']['ValorParcela3']);
            $this->ipvaAtual->setDataVencimentoParcela4($data['IpvaAtual']['DataVencimentoParcela4']);
            $this->ipvaAtual->setValorParcela4($data['IpvaAtual']['ValorParcela4']);
            $this->ipvaAtual->setDataVencimentoParcela5($data['IpvaAtual']['DataVencimentoParcela5']);
            $this->ipvaAtual->setValorParcela5($data['IpvaAtual']['ValorParcela5']);
            $this->ipvaAtual->setDataVencimentoParcela6($data['IpvaAtual']['DataVencimentoParcela6']);
            $this->ipvaAtual->setValorParcela6($data['IpvaAtual']['ValorParcela6']);
        }
        $this->ipvas = [];
        foreach ($data['Ipvas'] ?? [] as $ipva) {
            $this->ipvas[] = new Ipva($ipva['Valor'], $ipva['Exercicio'], CotaIpva::valueOf($ipva['CotaIpva']));
        }

        /* DPVAT */
        if (isset($data['DpvatAtual'])) {
            $this->dpvatAtual = new DpvatAtual();
            $this->dpvatAtual->setValor($data['DpvatAtual']['Valor']);
            $this->dpvatAtual->setExercicio($data['DpvatAtual']['Exercicio']);
            $this->dpvatAtual->setCategoriaDpvat($data['DpvatAtual']['CategoriaDpvat']);
            $this->dpvatAtual->setTipoVeiculo(TipoVeiculo::valueOf($data['DpvatAtual']['TipoVeiculo']));
            $this->dpvatAtual->setDataVencimento($data['DpvatAtual']['DataVencimento']);
            $this->dpvatAtual->setDataVencimentoParcela1($data['DpvatAtual']['DataVencimentoParcela1']);
            $this->dpvatAtual->setValorParcela1($data['DpvatAtual']['ValorParcela1']);
            $this->dpvatAtual->setDataVencimentoParcela2($data['DpvatAtual']['DataVencimentoParcela2']);
            $this->dpvatAtual->setValorParcela2($data['DpvatAtual']['ValorParcela2']);
            $this->dpvatAtual->setDataVencimentoParcela3($data['DpvatAtual']['DataVencimentoParcela3']);
            $this->dpvatAtual->setValorParcela3($data['DpvatAtual']['ValorParcela3']);
            $this->dpvatAtual->setDataVencimentoParcela4($data['DpvatAtual']['DataVencimentoParcela4']);
            $this->dpvatAtual->setValorParcela4($data['DpvatAtual']['ValorParcela4']);
            $this->dpvatAtual->setDataVencimentoParcela5($data['DpvatAtual']['DataVencimentoParcela5']);
            $this->dpvatAtual->setValorParcela5($data['DpvatAtual']['ValorParcela5']);
            $this->dpvatAtual->setDataVencimentoParcela6($data['DpvatAtual']['DataVencimentoParcela6']);
            $this->dpvatAtual->setValorParcela6($data['DpvatAtual']['ValorParcela6']);
        }
        $this->dpvats = [];
        foreach ($data['Dpvats'] ?? [] as $dpvat) {
            $this->dpvats[] = new Dpvat(
                $dpvat['Valor'],
                $dpvat['Exercicio'],
                CotaDpvat::valueOf($dpvat['CotaDpvat']),
                $dpvat['CategoriaDpvat'],
                TipoVeiculo::valueOf($dpvat['TipoVeiculo'])
            );
        }

        /* MULTAS */
        $this->multas = [];
        foreach ($data['Multas'] ?? [] as $multaDados) {
            $this->multas[] = Multa::fromArray($multaDados);
        }
        $this->multasRenainf = [];
        foreach ($data['MultasRenainf'] ?? [] as $multaRenainfDados) {
            $this->multasRenainf[] = Multa::fromArray($multaRenainfDados);
        }
    }

    /**
     * @return string|null
     */
    public function getRenavan(): ?string
    {
        return $this->renavan;
    }

    /**
     * @return string|null
     */
    public function getPlaca(): ?string
    {
        return $this->placa;
    }

    /**
     * @return string|null
     */
    public function getDocumento(): ?string
    {
        return $this->documento;
    }

    /**
     * @return string|null
     */
    public function getExercicio(): ?string
    {
        return $this->exercicio;
    }

    /**
     * @return string|null
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * @return Municipio|null
     */
    public function getMunicipio(): ?Municipio
    {
        return $this->municipio;
    }

    /**
     * @return CodServico
     */
    public function getCodServico(): CodServico
    {
        return $this->codServico;
    }

    /**
     * @return string|null
     */
    public function getCodSubServico(): ?string
    {
        return $this->codSubServico;
    }

    /**
     * @return TipoConsulta
     */
    public function getTipoConsulta(): TipoConsulta
    {
        return $this->tipoConsulta;
    }

    /**
     * @return Ocorrencia|null
     */
    public function getOcorrencia(): ?Ocorrencia
    {
        return $this->ocorrencia;
    }

    /**
     * @return Retorno
     */
    public function getRetorno(): Retorno
    {
        return $this->retorno;
    }

    /**
     * @return string
     */
    public function getDataMovimento(): string
    {
        return $this->dataMovimento;
    }

    /**
     * @return \DateTime|null
     */
    public function getDataHoraConsulta(): ?\DateTime
    {
        return $this->dataHoraConsulta;
    }

    /**
     * @return float|null
     */
    public function getValorTotal(): ?float
    {
        return $this->valorTotal;
    }

    /**
     * @return Correio|null
     */
    public function getCorreio(): ?Correio
    {
        return $this->correio;
    }

    /**
     * @return float|null
     */
    public function getValorTaxas(): ?float
    {
        return $this->valorTaxas;
    }

    /**
     * @return float|null
     */
    public function getValorIpvas(): ?float
    {
        return $this->valorIpvas;
    }

    /**
     * @return float|null
     */
    public function getValorDpvats(): ?float
    {
        return $this->valorDpvats;
    }

    /**
     * @return float|null
     */
    public function getValorMultas(): ?float
    {
        return $this->valorMultas;
    }

    /**
     * @return float|null
     */
    public function getValorMultasRenainf(): ?float
    {
        return $this->valorMultasRenainf;
    }

    /**
     * @return array
     */
    public function getTaxas(): array
    {
        return $this->taxas;
    }

    /**
     * @return IpvaAtual
     */
    public function getIpvaAtual(): IpvaAtual
    {
        return $this->ipvaAtual;
    }

    /**
     * @return array
     */
    public function getIpvas(): array
    {
        return $this->ipvas;
    }

    /**
     * @return DpvatAtual
     */
    public function getDpvatAtual(): DpvatAtual
    {
        return $this->dpvatAtual;
    }

    /**
     * @return array
     */
    public function getDpvats(): array
    {
        return $this->dpvats;
    }

    /**
     * @return array
     */
    public function getMultas(): array
    {
        return $this->multas;
    }

    /**
     * @return array
     */
    public function getMultasRenainf(): array
    {
        return $this->multasRenainf;
    }

    /**
     * @return string contendo getOcorrencia()->getCodOcorrencia()
     */
    public function getCodOcorrencia():string
    {
        return $this->getOcorrencia()->getCodOcorrencia();
    }

}
