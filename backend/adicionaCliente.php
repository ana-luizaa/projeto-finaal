<?php
   if (isset($_POST['nome'])) {
       include "config.php";
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        // $cepInput = $_POST['cep'];

        $querySelect = "SELECT id FROM clientes WHERE telefone = '$telefone'";
        $dadosSelect = mysqli_query($conexao, $querySelect);
        $queryInsert = "INSERT INTO clientes (nome, telefone) VALUES ('" . $nome . "','" . $telefone . "')";
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
            $dadosInsert;
        }
       
    }
?>