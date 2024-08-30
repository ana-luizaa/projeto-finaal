<?php
   if (isset($_POST['nome'])) {
       include "config.php";
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cepInput = $_POST['cep'];

        $querySelect = "SELECT id FROM clientes WHERE telefone = '$telefone'";
        $dadosSelect = mysqli_query($conexao, $querySelect);
        $queryInsert = "INSERT INTO clientes (nome, telefone) VALUES ('" . $nome . "," . $telefone . "')";
        $dadosInsert = mysqli_query($conexao, $queryInsert);
       

        if($dadosSelect){
            while($linha = mysqli_fetch_assoc($dadosSelect)){
                if($linha["id"] > 0){
                    echo "existe";
                    echo $linha["id"];

                }
                
            };
        }
        else{
            echo "aqui";
            $dadosInsert;
            function get_endereco($cep){
                $cep = preg_replace("/[^0-9]/","", $cep);
                $url = "https://viacep.com.br/ws/$cep/xml/";
    
                $xml = simplexml_load_file($url);
                return $xml;
    
            }
    
            $endereco = (get_endereco($cepInput));
            echo "Rua: $endereco->logradouro";
        }
       

        if (!$conexao) {
            die("Connection failed: " . mysqli_connect_error());
        }



        $conexao->close(); 
    }
?>