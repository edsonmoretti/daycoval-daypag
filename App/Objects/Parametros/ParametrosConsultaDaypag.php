<?php

namespace App\Objects\Parametros;

use App\Enums\CodServico;
use App\Enums\TipoConsulta;
use App\Enums\VersaoApi;

class ParametrosConsultaDaypag
{
    public function __construct(
        private string       $renavan,
        private TipoConsulta $tipoConsulta,
        private CodServico   $codServico
    )
    {
    }

    /**
     * @return CodServico
     */
    public function getCodServico(): CodServico
    {
        return $this->codServico;
    }

    public function toArray(): array
    {
        return [
            'Renavam' => $this->renavan,
            'CodServico' => $this->codServico,
            'TipoConsulta' => $this->tipoConsulta
        ];
    }
}
