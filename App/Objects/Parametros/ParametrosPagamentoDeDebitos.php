<?php

namespace App\Objects\Parametros;

use App\Enums\CodServico;
use App\Enums\TipoConsulta;

class ParametrosPagamentoDeDebitos extends ParametrosConsultaDaypag
{
    public function __construct(string $renavan, TipoConsulta $tipoConsulta)
    {
        parent::__construct($renavan, $tipoConsulta, CodServico::PAGAMENTO_DE_DEBITOS);
    }
}
