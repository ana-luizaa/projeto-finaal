<?php
   if (isset($_POST['nome'])) {
       include "config.php";
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $logradouro = $_POST['Rua'];
        $numero = $_POST['Numero'];
        $complemento = $_POST['APTO'];
        $bairro = $_POST['Bairro'];
        // $cepInput = $_POST['cep'];

        //Gerando IdEndereco aleatorio de 1 a 1000
        $geraIdEnd = rand(1,1000);

        //Inserindo endereco
        $queryInsEndereco = "INSERT INTO endereco (idEndereco,logradouro, numero, complemento, bairro) VALUES ($geraIdEnd,'" . $logradouro . "'," . $numero . ",'" . $complemento . "','" . $bairro . "')";
        $dadosInsEndereco = mysqli_query($conexao, $queryInsEndereco);

        //Select para verificar se o cliente ja existe no banco
        $querySelect = "SELECT id FROM clientes WHERE telefone = '$telefone'";
        $dadosSelect = mysqli_query($conexao, $querySelect);

        //Inserindo cliente
        $queryInsert = "INSERT INTO clientes (nome, telefone, endereco) VALUES ('" . $nome . "','" . $telefone . "', $geraIdEnd)";
        $dadosInsert = mysqli_query($conexao, $queryInsert);

        if($dadosSelect){
            while($linha = mysqli_fetch_assoc($dadosSelect)){
                if($linha["id"] > 0){
                    echo "Cliente ja cadastrado";
                    echo $linha["id"];
                }               
            };
        }
        else{
            $dadosInsEndereco;
            if($geraIdEnd > 0){
              $dadosInsert;
            }
        }     
        // envia mensagem wpp
        $curl = curl_init();
        $telefone = $_POST['telefone'];

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://app.whatsgw.com.br/api/WhatsGw/Send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "apikey" : "205dd43d-4ff5-4419-9ba8-2adebfa6011e",
            "phone_number" : "553191829077",
            "contact_phone_number" : 55'."$telefone".',
            "message_custom_id" : "teste",
            "message_type" : "text",
            "message_body" : "Ola! Seu pedido no restaurante Cheirô Mineiro foi realizado com sucesso! Sua entrega chegará em ate 55 minutos no endereço: '.$logradouro.', numero '.$numero.'/'.$complemento.', bairro '.$bairro.'."

            }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        header("Location: wpp.php");
    }
?>

