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
    }
?>
<!DOCTYPE html>
<html lang="en">
    <h2>Sua compra foi finalizada com sucesso!</h2>
</html>
