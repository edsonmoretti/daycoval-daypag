<?php
include_once 'vendor/autoload.php';

$daypag = new \App\Daypag(
    new \App\DaypagConfig('token_de_acesso')
);

//$debitos = $daypag->consultarDebitos(
//    new \App\Objects\Parametros\ParametrosDebitoVeiculo(
//        '00284103578',
//        \App\Enums\TipoConsulta::DETALHADA,
//        \App\Enums\CodServico::LICENCIAMENTO
//    )
//);

$debitos = $daypag->consultarIpva(
    [
        new \App\Objects\Parametros\ParametrosIpva(
            '00284103578',
            \App\Enums\TipoConsulta::DETALHADA,
            1,
            '2022',
            '0',
            '10000'
        ),
        new \App\Objects\Parametros\ParametrosIpva(
            '00284103578',
            \App\Enums\TipoConsulta::DETALHADA,
            1,
            '2022',
            '0',
            '10000'
        )
    ]
);

foreach ($debitos as $debito) {
    if ($debito->getRetorno()->getTipoRetorno() == \App\Enums\TipoRetorno::ERRO) {
        echo $debito->getRetorno()->getMensagem();
    } else {
        echo 'else';
    }
}
