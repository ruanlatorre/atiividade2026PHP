<?php
    require_once("../conexao/conexao.php");
    
    if (isset($_GET["id"])) {
        $id = (int)$_GET["id"];
    }
    $sql = "SELECT * FROM pessoa WHERE id_pessoa = '$id'";
    $result = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário para Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include_once("../menu.php"); ?>
    <form action="../actions/update.php" method="post">
        <input type="hidden" name="id_pessoa" value="<?php echo $dados['id_pessoa']; ?>">
        <label for="">Nome:</label> <br>
        <input type="text" name="nome_pessoa" id="" value="<?php echo $dados['pessoa_nome']; ?>">
        <br>
        <label for="">CPF:</label> <br>
        <input type="text" name="pessoa_cpf" id="" value="<?php echo $dados['pessoa_cpf']; ?>">
        <br>
        <label for="">RG:</label> <br>
        <input type="text" name="pessoa_rg" id="" value="<?php echo $dados['pessoa_rg']; ?>">
        <br>
        <label for="">Data Nascimento:</label> <br>
        <input type="date" name="data_nascimento" id="" value="<?php echo $dados['data_nascimento']; ?>">
        <br>
        <label for="">Nome da Mãe:</label> <br>
        <input type="text" name="nome_mae" id="" value="<?php echo $dados['nome_mae']; ?>">
        <br>
        <label for="">Nome do Pai:</label> <br>
        <input type="text" name="nome_pai" id="" value="<?php echo $dados['nome_pai']; ?>">
        <br>
        <label for="">Nacionalidade:</label> <br>
        <input type="text" name="nacionalidade" id="" value="<?php echo $dados['nacionalidade']; ?>">
        <br>
        <label for="">Estado Civil:</label> <br>
        <input type="text" name="estado_civil" id="" value="<?php echo $dados['estado_civil']; ?>">
        <br>
        <label for="">Email:</label> <br>
        <input type="text" name="email" id="" value="<?php echo $dados['email']; ?>">
        <br>
        <label for="">Telefone:</label> <br>
        <input type="text" name="telefone" id="" value="<?php echo $dados['telefone']; ?>">
        <br>
        <label for="">Endereço:</label> <br>
        <input type="text" name="endereco" id="" value="<?php echo $dados['endereco']; ?>">
        <br>
        <label for="">CEP:</label> <br>
        <input type="text" name="cep" id="" value="<?php echo $dados['cep']; ?>">
        <br>
        <label for="">Bairro:</label> <br>
        <input type="text" name="bairro" id="" value="<?php echo $dados['bairro']; ?>">
        <br>
        <label for="">Complemento:</label> <br>
        <input type="text" name="complemento" id="" value="<?php echo $dados['complemento']; ?>">
        <br>
        <label for="">Nivel de Escolaridade:</label> <br>
        <input type="text" name="nivel_escolaridade" id="" value="<?php echo $dados['nivel_escolaridade']; ?>">
        <br>
        <label for="">Ocupacao:</label> <br>
        <input type="text" name="ocupacao" id="" value="<?php echo $dados['ocupacao']; ?>">
        <br>
        <br>
        <input type="submit" value="Realizar alteração">
    </form>
    <div style="text-align:center; margin-top:12px;"><button class="back-button" onclick="location.href='../menu.php'">Voltar ao Menu</button></div>
</body>
</html>