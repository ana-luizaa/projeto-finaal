<?php
//Pegando o caminho absoluto a partir da raiz da pasta publica do servidor
$path = $_SERVER['DOCUMENT_ROOT'] . '\projeto-finaal\backend\\';

$fileConnect = $path . 'config.php';

include($fileConnect);

function pesquisaCep(){
    $cepInput = $_POST['cep'];
    function get_endereco($cep){
        $cep = preg_replace("/[^0-9]/","", $cep);
        $url = "https://viacep.com.br/ws/$cep/xml/";

        $xml = simplexml_load_file($url);
        return $xml;
    }

    $endereco = (get_endereco($cepInput));
    echo "Rua: $endereco->logradouro";

}
?>