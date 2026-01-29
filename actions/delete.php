<?php

require_once("../conexao/conexao.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = "DELETE FROM pessoa WHERE id_pessoa = '$id'";
$result = mysqli_query($conexao, $sql);

?>