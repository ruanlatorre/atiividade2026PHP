<?php
require_once("../conexao/conexao.php");

$sql = "SELECT * FROM pessoa";
$result = mysqli_query($conexao, $sql);
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
    <title>Consulta de Pessoas</title>
    <link rel="stylesheet" href="../pedidos/style.css">
</head>
<body>
<?php include_once("../menu.php"); ?>
<input type="text" name="search" id="" placeholder="Pesquisar">
<button onclick="location.href='consult.php?search=' + document.getElementsByName('search')[0].value">Pesquisar</button>



<table>
    <thead> 
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Data de Nascimento</th>
            <th>Nome da Mãe</th>
            <th>Nome do Pai</th>
            <th>Nacionalidade</th>
            <th>Estado Civil</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>CEP</th>
            <th>Bairro</th>
            <th>Complemento</th>
            <th>Nível de Escolaridade</th>
            <th>Ocupação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>

<?php

if ($search == "") {
    $sql = "SELECT * FROM pessoa";
} else {
    $sql = "SELECT * FROM pessoa WHERE pessoa_nome LIKE '%$search%' OR pessoa_cpf LIKE '%$search%'";
}
$result = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_assoc($result)) {

    echo "
    <tr>
            <td>" . $row["id_pessoa"] . "</td>
            <td>" . $row["pessoa_nome"] . "</td>
            <td>" . $row["pessoa_cpf"] . "</td>
            <td>" . $row["pessoa_rg"] . "</td>
            <td>" . $row["data_nascimento"] . "</td>
            <td>" . $row["nome_mae"] . "</td>
            <td>" . $row["nome_pai"] . "</td>
            <td>" . $row["nacionalidade"] . "</td>
            <td>" . $row["estado_civil"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["telefone"] . "</td>
            <td>" . $row["endereco"] . "</td>
            <td>" . $row["cep"] . "</td>
            <td>" . $row["bairro"] . "</td>
            <td>" . $row["complemento"] . "</td>
            <td>" . $row["nivel_escolaridade"] . "</td>
            <td>" . $row["ocupacao"] . "</td>
            <td>
            <a href='delete.php?id=" . $row['id_pessoa'] . "' onclick=\"return confirm('Deseja realmente excluir?')\">Excluir</a>
            <a href='../formulario/edit.php?id=" . $row['id_pessoa'] . "' onclick=\"return confirm('Deseja realmente editar?')\">Editar</a>
            </td>
        </tr>";
}



echo "</tbody>
</table>
<div class='back-container'><button class='back-button' onclick=\"location.href='../menu.php'\">Voltar ao Menu</button></div>";
?>