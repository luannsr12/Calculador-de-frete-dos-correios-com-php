<?php
    /* O código abaixo foi desenvolvido na vídeo aula, na qual eu encino com usar a Api dos correios, para calcular o frete de um determinado produto
     * Video: https://www.youtube.com/watch?v=61-klmvyUvA
     * www.scriptmundo.com
     * = Este código foi atualizado (06/02/2019) , portando algumas coisas estão diferentes da video
     * Agradeço a todos que assistiram o vídeo
     * Gostaria de pedir para que deizasse uma "STAR" neste repositorio
     * Obrigado
     */


    $cep_origem = "85930000";     // Seu CEP , ou CEP da Loja
    $cep_destino = $_POST['cep']; // CEP do cliente, que irá vim via POST



    /* DADOS DO PRODUTO A SER ENVIADO */
    $peso          = 2;
    $valor         = 100;
    $tipo_do_frete = '41106'; //Sedex: 40010   |  Pac: 41106
    $altura        = 6;
    $largura       = 20;
    $comprimento   = 20;


    $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
    $url .= "nCdEmpresa=";
    $url .= "&sDsSenha=";
    $url .= "&sCepOrigem=" . $cep_origem;
    $url .= "&sCepDestino=" . $cep_destino;
    $url .= "&nVlPeso=" . $peso;
    $url .= "&nVlLargura=" . $largura;
    $url .= "&nVlAltura=" . $altura;
    $url .= "&nCdFormato=1";
    $url .= "&nVlComprimento=" . $comprimento;
    $url .= "&sCdMaoProria=n";
    $url .= "&nVlValorDeclarado=" . $valor;
    $url .= "&sCdAvisoRecebimento=n";
    $url .= "&nCdServico=" . $tipo_do_frete;
    $url .= "&nVlDiametro=0";
    $url .= "&StrRetorno=xml";


    $xml = simplexml_load_file($url);

    $frete =  $xml->cServico;

    echo "<h1>Valor PAC: R$ ".$frete->Valor."<br />Prazo: ".$frete->PrazoEntrega." dias</h1>";

 ?>
