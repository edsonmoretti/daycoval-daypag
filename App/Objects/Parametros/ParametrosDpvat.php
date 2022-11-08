<?php

namespace Daypag\Objects\Parametros;

use Daypag\Enums\CodServico;
use Daypag\Enums\TipoConsulta;

class ParametrosDpvat extends ParametrosConsultaDaypag
{
    public function __construct(string $renavan, TipoConsulta $tipoConsulta, public string $codSubServico)
    {
        if ($this->codSubServico != '1' && $this->codSubServico != '2') {
            throw new \Exception('Código de sub-serviço inválido para o serviço de DPVAT');
        }
        parent::__construct($renavan, $tipoConsulta, CodServico::DPVAT);
    }

    /**
     * @return string
     */
    public function getCodSubServico(): string
    {
        return $this->codSubServico;
    }
}
