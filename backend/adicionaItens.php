<?php
   if (isset($_POST['nome'])) {
    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'projeto-final';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName );
    $nome = $_POST['nome'];
    $sql = "insert into clientes (nome) values ('" . $nome . "');";

    if (!$conexao) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($conexao->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conexao->close();
}

?>