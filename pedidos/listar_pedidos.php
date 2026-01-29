<?php
require_once("../conexao/conexao.php");
if (isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    $search = "";
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Pedidos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include_once("../menu.php"); ?>

    <input type="text" id="" name="pesquisar" placeholder="Pesquisar pedidos...">
    <button onclick="location.href='listar_pedidos.php?search=' + document.getElementsByName('pesquisar')[0].value">Pesquisar</button>
    <table>
        <thead>
            <th>ID Pedido</th>
            <th>FK do Cliente</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Data do Pedido</th>
            <th>Endereço de Entrega</th>
            <th>Preço Unitário</th>
            <th>Status do Pedido</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php
            if ($search == "") {
                $sql = "SELECT * FROM pedidos";
            } else {
                $sql = "SELECT * FROM pedidos WHERE produto LIKE '%$search%' OR status_pedido LIKE '%$search%'";
            }

            $resultado = mysqli_query($conexao, $sql);

            while ($pedido = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $pedido['id_pedidos'] . "</td>";
                echo "<td>" . $pedido['fk_cliente'] . "</td>";
                echo "<td>" . $pedido['produto'] . "</td>";
                echo "<td>" . $pedido['quantidade'] . "</td>";
                echo "<td>" . $pedido['data_pedido'] . "</td>";
                echo "<td>" . $pedido['endereco_entrega'] . "</td>";
                echo "<td>" . $pedido['preco_unitario'] . "</td>";
                echo "<td>" . $pedido['status_pedido'] . "</td>";
                echo "<td><a href='edit_pedido.php?id=" . $pedido['id_pedidos'] . "'>Editar </a>";
                echo "<a href='deletar_pedido.php?id=" . $pedido['id_pedidos'] . "' onclick=\"return confirm('Tem certeza que deseja deletar este pedido?');\">Deletar</a></td>";
                echo "</tr>";
            }

            mysqli_close($conexao);
            ?>
        </tbody>
    </table>
    <div style="text-align:center; margin-top:12px;"><button class="back-button" onclick="location.href='../menu.php'">Voltar ao Menu</button></div>
</body>
</html>