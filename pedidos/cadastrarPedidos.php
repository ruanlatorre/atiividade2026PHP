<?php
require_once("../conexao/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include_once("../menu.php"); ?>
    <form action="processar.php" method="post">
        <select name="nome_cliente" id="">
            <option value="" disabled>Selecione o cliente</option>
            <?php
            $sql = "SELECT id_pessoa, pessoa_nome FROM pessoa";
            $result = mysqli_query($conexao, $sql);
            while ($row = mysqli_fetch_assoc($result)) {  
                echo "<option value='{$row['id_pessoa']}'>{$row['pessoa_nome']}</option>";
            }   
            ?>
        </select>
        <br>
        <label for="">Produto:</label> <br>
        <input type="text" name="produto" id="">
        <br>
        <label for="">Quantidade:</label> <br>
        <input type="number" name="quantidade" id="">
        <br>
        <label for="">Data do Pedido:</label> <br>
        <input type="date" name="data_pedido" id="">
        <br>
        <label for="">Endereço de Entrega:</label> <br>
        <input type="text" name="endereco_entrega" id="">
        <br>
        <label for="">Preço Unitário:</label> <br>
        <input type="number" name="preco_unitario" id="" step="0.01" min="0">
        <div style="text-align:center; margin-top:12px;"><button class="back-button" onclick="location.href='../menu.php'">Voltar ao Menu</button></div>
        <br>
        <label for="">Status do Pedido:</label> <br>
        <select name="status_pedido" id="">
            <option value="Pendente">Pendente</option>
            <option value="Em andamento">Em andamento</option>
            <option value="Concluído">Concluído</option>
        </select>

        <br>
        <br>
        <input type="submit" value="Cadastrar Pedido">
    </form>
</body>

</html>