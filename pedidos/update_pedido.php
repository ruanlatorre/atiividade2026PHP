<?php
require_once("../conexao/conexao.php");
if (isset($_POST['id_pedidos'])) {
    $id = (int) $_POST['id_pedidos'];

    $fk_cliente = isset($_POST['fk_cliente']) ? (int) $_POST['fk_cliente'] : 0;
    $produto = $_POST['produto'] ?? '';
    $quantidade = isset($_POST['quantidade']) ? (int) $_POST['quantidade'] : 0;
    $data_pedido = $_POST['data_pedido'] ?? '';
    $endereco_entrega = $_POST['endereco_entrega'] ?? '';
    $preco_unitario = isset($_POST['preco_unitario']) ? (float) $_POST['preco_unitario'] : 0.0;
    $status_pedido = $_POST['status_pedido'] ?? '';


    // Prepared statement para evitar SQL injection e corrigir sintaxe
    $sql = "UPDATE pedidos SET fk_cliente = ?, produto = ?, quantidade = ?, data_pedido = ?, endereco_entrega = ?, preco_unitario = ?, status_pedido = ? WHERE id_pedidos = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if (!$stmt) {
        die('Erro ao preparar query: ' . mysqli_error($conexao));
    }
    
    mysqli_stmt_bind_param($stmt, 'isissdsi', $fk_cliente, $produto, $quantidade, $data_pedido, $endereco_entrega, $preco_unitario, $status_pedido, $id);    
    if (!mysqli_stmt_execute($stmt)) {
        die('Erro ao executar update: ' . mysqli_stmt_error($stmt));
    } else {
        header("Location: ../pedidos/listar_pedidos.php");
        exit;
    }
    mysqli_stmt_close($stmt);

} else {
    die('ID inválido ou dados não enviados via POST.');
    echo $id;
}
