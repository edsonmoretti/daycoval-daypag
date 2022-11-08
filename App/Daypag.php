<?php

namespace App;

use App\Enums\Ambiente;
use App\Enums\VersaoApi;
use App\Exceptions\DaypagException;
use App\HttpClient\Http;
use App\Objects\DebitoResult;
use App\Objects\Parametros\ParametrosConsultaDaypag;
use App\Objects\Parametros\ParametrosDpvat;
use App\Objects\Parametros\ParametrosIpva;
use App\Objects\Parametros\ParametrosLicenciamento;
use App\Objects\Parametros\ParametrosLicenciamentoETransferencia;
use App\Objects\Parametros\ParametrosMultasDeTransito;
use App\Objects\Parametros\ParametrosMultasRenainf;
use App\Objects\Parametros\ParametrosPagamentoDeDebitos;
use App\Objects\Parametros\ParametrosPrimeiroRegistro;
use App\Objects\Parametros\ParametrosSegundaViaDeTransferencia;
use App\Objects\Parametros\ParametrosTaxasDetran;
use App\Objects\Parametros\ParametrosTransferencia;

class Daypag
{
    private string $pathConsultarDebitos = '/Debito/ConsultarDebitos';

    private readonly string $url;

    public function __construct(
        private readonly DaypagConfig $daypagConfig
    )
    {
        $urlApi = $this->getDaypagConfig()->getAmbiente() == Ambiente::PRODUCAO ? $this->getDaypagConfig()->getUrls()['producao'] : $this->getDaypagConfig()->getUrls()['homologacao'];
        if (str_ends_with($urlApi, '/')) {
            $this->url = substr($urlApi, 0, -1);
        } else {
            $this->url = $urlApi;
        }
    }

    /**
     * @return DaypagConfig
     */
    public function getDaypagConfig(): DaypagConfig
    {
        return $this->daypagConfig;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->getDaypagConfig()->getToken();
    }


    /**
     * @param $serializedObject
     * @return DebitoResult[]
     */
    private function responseToObject($serializedObject): array
    {
        /* @var $listaDebitos DebitoResult[] */
        $serializedObject = json_decode($serializedObject, true);
        $listaDebitos = [];
        if (isset($serializedObject['ListaDebitos'])) {
            foreach ($serializedObject['ListaDebitos'] as $debito) {
                $listaDebitos[] = new DebitoResult($debito);
            }
        }
        if (isset($serializedObject['DebitoResultDto'])) {
            foreach ($serializedObject['DebitoResultDto'] as $debito) {
                $listaDebitos[] = new DebitoResult($debito);
            }
        }
        return $listaDebitos;
    }

    /**
     * @param ParametrosConsultaDaypag[] $parametros
     * @return DebitoResult[]
     * @throws DaypagException
     */
    public function consultarDebitos(array|ParametrosConsultaDaypag $parametros, VersaoApi $versaoApi = VersaoApi::V1): array
    {
        if (is_null($versaoApi)) {
            $versaoApi = VersaoApi::V1;
        }
        $parametrosDebitoVeiculos = [];
        if (is_array($parametros)) {
            foreach ($parametros as $parametroDebitoVeiculo) {
                if (!($parametroDebitoVeiculo instanceof ParametrosConsultaDaypag)) {
                    throw new \InvalidArgumentException('ParametroDebitoVeiculo precisa ser um array de ParametroDebitoVeiculo');
                }
                if ($parametroDebitoVeiculo->getCodServico() == null) {
                    throw new \InvalidArgumentException('Parametro Debito Veiculo must have CodServico');
                }
                $parametrosDebitoVeiculos[] = $parametroDebitoVeiculo->toArray();
            }
        } else if ($parametros instanceof ParametrosConsultaDaypag) {
            $parametrosDebitoVeiculos[] = $parametros->toArray();
        } else {
            throw new \InvalidArgumentException('ParametroDebitoVeiculo precisa ser um array de ParametroDebitoVeiculo ou um objeto ParametroDebitoVeiculo');
        }

        $requestData = [
            'TokenCliente' => $this->getToken(),
            'FormaPagamento' => $this->getDaypagConfig()->getFormaPagamento()->value,
            'ListaParametroDebitoVeiculo' => $parametrosDebitoVeiculos
        ];

        $response = Http::post(
            $this->url . $this->pathConsultarDebitos . $versaoApi->toString(),
            $requestData
        );
        if (!$response) {
            throw new DaypagException('Algum erro não identificado ocorreu ao consumir a API Daycoval');
        }
        if ($response && (isset($response['ErrorMessage']))) {
            throw new DaypagException($response['ErrorMessage'][0] . '. Verifique os parametros configurados');
        }
        if (!$response['SerializedObject']) {
            throw new DaypagException('SerializedObject não encontrado');
        }
        return $this->responseToObject($response['SerializedObject']);
    }

    /**
     * @param ParametrosTransferencia[] $parametrosTransferencia
     * @return DebitoResult[]
     * @throws DaypagException
     */
    public function consultarTransferencia(array|ParametrosTransferencia $parametrosTransferencia)
    {
        return $this->consultarDebitos($parametrosTransferencia);
    }

    /**
     * @param ParametrosLicenciamento[] $parametrosLicenciamento
     * @return DebitoResult[]
     * @throws DaypagException
     */
    public function consultarLicenciamento(array|ParametrosLicenciamento $parametrosLicenciamento): array
    {
        return $this->consultarDebitos($parametrosLicenciamento);
    }

    /**
     * @param ParametrosLicenciamentoETransferencia[] $parametrosLicenciamentoETransferencia
     * @return DebitoResult[]
     * @throws DaypagException
     */
    public function consultarLicenciamentoETransferencia(array|ParametrosLicenciamentoETransferencia $parametrosLicenciamentoETransferencia): array
    {
        return $this->consultarDebitos($parametrosLicenciamentoETransferencia);
    }

    /**
     * @param ParametrosSegundaViaDeTransferencia[] $parametrosSegundaViaDeTransferencia
     * @return DebitoResult[]
     * @throws DaypagException
     */
    public function consultarSegundaViaDeTransferencia(array|ParametrosSegundaViaDeTransferencia $parametrosSegundaViaDeTransferencia): array
    {
        return $this->consultarDebitos($parametrosSegundaViaDeTransferencia);
    }

    /**
     * @param ParametrosPrimeiroRegistro[] $parametrosPrimeiroRegistro
     * @return DebitoResult[]
     * @throws DaypagException
     */
    public function consultarPrimeiroRegistro(array|ParametrosPrimeiroRegistro $parametrosPrimeiroRegistro): array
    {
        return $this->consultarDebitos($parametrosPrimeiroRegistro);
    }

    /**
     * @param ParametrosPagamentoDeDebitos[] $parametrosPagamentoDeDebitos
     * @return DebitoResult[]
     * @throws DaypagException
     */
    public function consultarPagamentoDeDebitos(array|ParametrosPagamentoDeDebitos $parametrosPagamentoDeDebitos): array
    {
        return $this->consultarDebitos($parametrosPagamentoDeDebitos);
    }

    /**
     * @param ParametrosIpva[] $parametrosIpva
     * @return DebitoResult[]
     * @throws DaypagException
     */
    public function consultarIpva(array|ParametrosIpva $parametrosIpva): array
    {
        // check instance of itens of array
        if (is_array($parametrosIpva)) {
            foreach ($parametrosIpva as $parametroIpva) {
                if (!($parametroIpva instanceof ParametrosIpva)) {
                    throw new \InvalidArgumentException('ParametroIpva precisa ser um array de ParametroIpva');
                }
            }
        } else if (!($parametrosIpva instanceof ParametrosIpva)) {
            throw new \InvalidArgumentException('ParametroIpva precisa ser um array de ParametroIpva ou um objeto ParametroIpva');
        }
        return $this->consultarDebitos($parametrosIpva);
    }

    /**
     * @param ParametrosDpvat[] $parametrosDpvat
     * @return DebitoResult[]
     * @throws DaypagException
     */
    public function consultarDpvat(array|ParametrosDpvat $parametrosDpvat): array
    {
        return $this->consultarDebitos($parametrosDpvat);
    }

    /**
     * @param ParametrosMultasDeTransito[] $parametrosMultasDeTransito
     * @return DebitoResult[]
     * @throws DaypagException
     */
    public function consultarMultasDeTransito(array|ParametrosMultasDeTransito $parametrosMultasDeTransito): array
    {
        return $this->consultarDebitos($parametrosMultasDeTransito);
    }

    /**
     * @param ParametrosMultasRenainf[] $parametrosMultasRenainf
     * @return DebitoResult[]
     * @throws DaypagException
     */
    public function consultarMultasRenainf(array|ParametrosMultasRenainf $parametrosMultasRenainf): array
    {
        return $this->consultarDebitos($parametrosMultasRenainf);
    }

    /**
     * @param ParametrosTaxasDetran[] $parametrosTaxasDetran
     * @return DebitoResult[]
     * @throws DaypagException
     */
    public function consultarTaxasDetran(array|ParametrosTaxasDetran $parametrosTaxasDetran): array
    {
        return $this->consultarDebitos($parametrosTaxasDetran);
    }
}
