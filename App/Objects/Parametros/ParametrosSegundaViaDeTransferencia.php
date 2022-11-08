<?php

namespace Daypag\Objects\Parametros;

use Daypag\Enums\CodServico;
use Daypag\Enums\TipoConsulta;

class ParametrosSegundaViaDeTransferencia extends ParametrosConsultaDaypag
{
    public function __construct(string $renavan, TipoConsulta $tipoConsulta)
    {
        parent::__construct($renavan, $tipoConsulta, CodServico::SEGUNDA_VIA_TRANSFERENCIA);
    }
}
