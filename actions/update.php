<?php
require_once("../conexao/conexao.php");


if (isset($_POST['id_pessoa'])) {
    $id = (int) $_POST['id_pessoa'];

    $nome = $_POST['nome_pessoa'] ?? '';
    $cpf = $_POST['pessoa_cpf'] ?? '';
    $rg = $_POST['pessoa_rg'] ?? '';
    $data_nascimento = $_POST['data_nascimento'] ?? '';
    $nome_mae = $_POST['nome_mae'] ?? '';
    $nome_pai = $_POST['nome_pai'] ?? '';
    $nacionalidade = $_POST['nacionalidade'] ?? '';
    $estado_civil = $_POST['estado_civil'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $cep = $_POST['cep'] ?? '';
    $bairro = $_POST['bairro'] ?? '';
    $complemento = $_POST['complemento'] ?? '';
    $nivel_escolaridade = $_POST['nivel_escolaridade'] ?? '';
    $ocupacao = $_POST['ocupacao'] ?? '';

    // Prepared statement para evitar SQL injection e corrigir sintaxe
    $sql = "UPDATE pessoa SET pessoa_nome = ?, pessoa_cpf = ?, pessoa_rg = ?, data_nascimento = ?, nome_mae = ?, nome_pai = ?, nacionalidade = ?, estado_civil = ?, email = ?, telefone = ?, endereco = ?, cep = ?, bairro = ?, complemento = ?, nivel_escolaridade = ?, ocupacao = ? WHERE id_pessoa = ?";

    $stmt = mysqli_prepare($conexao, $sql);
    if (!$stmt) {
        die('Erro ao preparar query: ' . mysqli_error($conexao));
    }

    // 16 strings + 1 inteiro (id)
    mysqli_stmt_bind_param($stmt, 'ssssssssssssssssi', $nome, $cpf, $rg, $data_nascimento, $nome_mae, $nome_pai, $nacionalidade, $estado_civil, $email, $telefone, $endereco, $cep, $bairro, $complemento, $nivel_escolaridade, $ocupacao, $id);

    if (!mysqli_stmt_execute($stmt)) {
        die('Erro ao executar update: ' . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);

    header("Location: ../actions/consult.php");
    exit;
} else {
    die('ID inválido ou dados não enviados via POST.');
}
?>