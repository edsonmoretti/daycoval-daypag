<?php

namespace Daypag\Objects\Parametros;

use Daypag\Enums\CodServico;
use Daypag\Enums\TipoConsulta;

class ParametrosMultasRenainf extends ParametrosConsultaDaypag
{
    public function __construct(string $renavan, TipoConsulta $tipoConsulta)
    {
        parent::__construct($renavan, $tipoConsulta, CodServico::MULTAS_RENAINF);
    }
}
