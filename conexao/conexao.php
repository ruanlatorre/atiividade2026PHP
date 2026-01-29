<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cadastro_pessoa";
    $port = 3308;

    $conexao = mysqli_connect($servername, $username, $password, $dbname, $port);

    if (!$conexao) {
        die("Erro ao realizar". mysqli_connect_error());
    }
?>