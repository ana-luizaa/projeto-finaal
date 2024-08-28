<?php
    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'projeto-final';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName );

    if($conexao->connect_error){
        echo "Erro";
    }
    else{
        echo "ok";
    }

?>