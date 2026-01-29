
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include_once("../menu.php"); ?>
<?php
require_once("../conexao/conexao.php");
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
$pedido = null;
if ($id) {
    $sql = "SELECT * FROM pedidos WHERE id_pedidos = $id";
    $resultado = mysqli_query($conexao, $sql_p);
    $pedido = mysqli_fetch_assoc($res_p);
}
?>
     <form action="update_pedido.php" method="post">
        <input type="hidden" name="id_pedidos" value="<?php echo $pedido['id_pedidos'] ?? ''; ?>">
        <select name="fk_cliente" id="">
            <option value="" disabled>Selecione o cliente</option>
            <?php
            $sql = "SELECT id_pessoa, pessoa_nome FROM pessoa";
            $result = mysqli_query($conexao, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $selected = (isset($pedido['fk_cliente']) && $pedido['fk_cliente'] == $row['id_pessoa']) ? ' selected' : '';
                echo "<option value='" . $row['id_pessoa'] . "'" . $selected . ">" . $row['pessoa_nome'] . "</option>";
            }
            ?>
        </select>
        <br>
        <label for="">Produto:</label> <br>
        <input type="text" name="produto" id="" value="<?php echo $pedido['produto']; ?>">
        <br>
        <label for="">Quantidade:</label> <br>
        <input type="number" name="quantidade" id="" value="<?php echo $pedido['quantidade']; ?>">
        <br>
        <label for="">Data do Pedido:</label> <br>
        <input type="date" name="data_pedido" id="" value="<?php echo $pedido['data_pedido']; ?>">
        <br>
        <label for="">Endereço de Entrega:</label> <br>
        <input type="text" name="endereco_entrega" id="" value="<?php echo htmlspecialchars($pedido['endereco_entrega'] ?? ''); ?>">
        <br>
        <label for="">Preço Unitário:</label> <br>
        <input type="number" name="preco_unitario" id="" value="<?php echo $pedido['preco_unitario']; ?>" step="0.01" min="0">
        <br>
        <label for="">Status do Pedido:</label> <br>
        <select name="status_pedido" id="">
            <option value="Pendente" <?php echo (isset($pedido['status_pedido']) && $pedido['status_pedido'] == 'Pendente') ? 'selected' : ''; ?>>Pendente</option>
            <option value="Em andamento" <?php echo (isset($pedido['status_pedido']) && $pedido['status_pedido'] == 'Em andamento') ? 'selected' : ''; ?>>Em andamento</option>
            <option value="Concluído" <?php echo (isset($pedido['status_pedido']) && $pedido['status_pedido'] == 'Concluído') ? 'selected' : ''; ?>>Concluído</option>
        </select>

        <br>
        <br>
        <input type="submit" value="Editar Pedido">
    </form>
    <div style="text-align:center; margin-top:12px;"><button class="back-button" onclick="location.href='../menu.php'">Voltar ao Menu</button></div>
</body>
</html>