<?php

namespace Daypag\Objects\Parametros;

use Daypag\Enums\CodServico;
use Daypag\Enums\TipoConsulta;

class ParametrosIpva extends ParametrosConsultaDaypag
{
    public function __construct(
        string        $renavan,
        TipoConsulta  $tipoConsulta,
        public string $codSubServico,
        public string $ano,
        public string $cotaIpva,
        public float $valor
    )
    {
        if ($this->codSubServico != '1' && $this->codSubServico != '2') {
            throw new \Exception('Código de sub-serviço inválido para o serviço de IPVA');
        }
        parent::__construct($renavan, $tipoConsulta, CodServico::IPVA);
    }

    /**
     * @return string
     */
    public function getCodSubServico(): string
    {
        return $this->codSubServico;
    }
}
