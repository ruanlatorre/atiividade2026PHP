<?php

require_once("../conexao/conexao.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = "DELETE FROM pessoa WHERE id_pessoa = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../actions/consult.php");
    exit;
} else {
    echo "Erro ao deletar a pessoa: " . mysqli_stmt_error($stmt);
}
mysqli_stmt_close($stmt);

?>
