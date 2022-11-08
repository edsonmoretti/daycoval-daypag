<?php

namespace App\Objects\Parametros;

use App\Enums\CodServico;
use App\Enums\TipoConsulta;

class ParametrosMultasRenainf extends ParametrosConsultaDaypag
{
    public function __construct(string $renavan, TipoConsulta $tipoConsulta)
    {
        parent::__construct($renavan, $tipoConsulta, CodServico::MULTAS_RENAINF);
    }
}
