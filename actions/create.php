<?php
require_once("../conexao/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome_pessoa"];
    $cpf = $_POST["pessoa_cpf"];
    $rg = $_POST["pessoa_rg"];
    $data_nascimento = $_POST["data_nascimento"];
    $nome_mae = $_POST["nome_mae"];
    $nome_pai = $_POST["nome_pai"];
    $nacionalidade = $_POST["nacionalidade"];
    $estado_civil = $_POST["estado_civil"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $cep = $_POST["cep"];
    $bairro = $_POST["bairro"];
    $complemento = $_POST["complemento"];
    $nivel_escolaridade = $_POST["nivel_escolaridade"];
    $ocupacao = $_POST["ocupacao"];

    $sql = "INSERT INTO pessoa (pessoa_nome, pessoa_cpf, pessoa_rg, data_nascimento, nome_mae, nome_pai, 
                nacionalidade, estado_civil, email, telefone, endereco, cep, bairro, complemento, nivel_escolaridade, ocupacao)
                VALUES ('$nome', '$cpf', '$rg', '$data_nascimento', '$nome_mae', '$nome_pai', '$nacionalidade', '$estado_civil', '$email', '$telefone', '$endereco', '$cep',
                '$bairro', '$complemento', '$nivel_escolaridade', '$ocupacao')";

    mysqli_query($conexao, $sql);

}
?>
