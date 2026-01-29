<?php
require_once("../conexao/conexao.php");

$nome_cliente = $_POST['nome_cliente'] ?? '';
$produto = $_POST['produto'] ?? '';
$quantidade = $_POST['quantidade'] ?? '';
$data_pedido = $_POST['data_pedido'] ?? '';
$endereco_entrega = $_POST['endereco_entrega'] ?? '';
$preco_unitario = $_POST['preco_unitario'] ?? '';
$status_pedido = $_POST['status_pedido'] ?? '';

$sql = "INSERT INTO pedidos (fk_cliente, produto, quantidade, data_pedido, endereco_entrega, preco_unitario, status_pedido)
        VALUES ('$nome_cliente', '$produto', '$quantidade', '$data_pedido', '$endereco_entrega', '$preco_unitario', '$status_pedido')";
$resultado = mysqli_query($conexao, $sql);

if($resultado){
    echo "<p>Pedido cadastrado com sucesso!</p>";
} else {
    echo "<p>Erro ao cadastrar o pedido: " . mysqli_error($conexao) . "</p>";
}
mysqli_close($conexao);

header("Location: ../pedidos/listar_pedidos.php");
?>