<?php

namespace App\Objects\Parametros;

use App\Enums\CodServico;
use App\Enums\TipoConsulta;
use App\Exceptions\DaypagException;

class ParametrosTaxasDetran extends ParametrosConsultaDaypag
{
    /**
     * @throws DaypagException
     */
    public function __construct(string $renavan, TipoConsulta $tipoConsulta, public string $codSubServico)
    {
        // Página 53 do manual, tabela II Códigos dos Subserviços
        $codSubServicosValidos = ['17', '18', '19', '21', '23', '24', '25', '26', '28', '29', '35', '36', '37', '39', '40', '43', '44', '45', '46', '50', '51', '52', '53', '54', '55', '56', '57', '58', '60', '66', '67', '73', '82', '84', '92', '93', '94'];
        if (!in_array($codSubServico, $codSubServicosValidos)) {
            throw new DaypagException("Código de subserviço inválido: $codSubServico" . ' para o serviço de Taxas Detran'. ' - Códigos válidos: ' . implode(', ', $codSubServicosValidos));
        }
        parent::__construct($renavan, $tipoConsulta, CodServico::TAXAS_DETRAN);
    }
}
