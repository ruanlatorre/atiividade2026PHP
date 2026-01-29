<?php
require_once("../conexao/conexao.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "DELETE FROM pedidos WHERE id_pedidos = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../pedidos/listar_pedidos.php");
    exit;
} else {
    echo "Erro ao deletar o pedido: " . mysqli_stmt_error($stmt);
}
mysqli_stmt_close($stmt);


?>