<?php
    require_once("../conexao/conexao.php");
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
    <form action="../actions/create.php " method="post">
        <label for="">Nome:</label> <br>
        <input type="text" name="nome_pessoa" id="">
        <br>
        <label for="">CPF:</label> <br>
        <input type="text" name="pessoa_cpf" id="">
        <br>
        <label for="">RG:</label> <br>
        <input type="text" name="pessoa_rg" id="">
        <br>
        <label for="">Data Nascimento:</label> <br>
        <input type="date" name="data_nascimento" id="">
        <br>
        <label for="">Nome da Mãe:</label> <br>
        <input type="text" name="nome_mae" id="">
        <br>
        <label for="">Nome do Pai:</label> <br>
        <input type="text" name="nome_pai" id="">
        <br>
        <label for="">Nacionalidade:</label> <br>
        <input type="text" name="nacionalidade" id="">
        <br>
        <label for="">Estado Civil:</label> <br>
        <input type="text" name="estado_civil" id="">
        <br>
        <label for="">Email:</label> <br>
        <input type="text" name="email" id="">
        <br>
        <label for="">Telefone:</label> <br>
        <input type="text" name="telefone" id="">
        <br>
        <label for="">Endereço:</label> <br>
        <input type="text" name="endereco" id="">
        <br>
        <label for="">CEP:</label> <br>
        <input type="text" name="cep" id="">
        <br>
        <label for="">Bairro:</label> <br>
        <input type="text" name="bairro" id="">
        <br>
        <label for="">Complemento:</label> <br>
        <input type="text" name="complemento" id="">
        <br>
        <label for="">Nivel de Escolaridade:</label> <br>
        <input type="text" name="nivel_escolaridade" id="">
        <br>
        <label for="">Ocupacao:</label> <br>
        <input type="text" name="ocupacao" id="">
        <br>
        <br>
        <input type="submit" value="Realizar cadastro" onclick="window.location.href='../actions/consult.php'">
    </form>
    <div style="text-align:center; margin-top:12px;"><button class="back-button" onclick="location.href='../menu.php'">Voltar ao Menu</button></div>
</body>
</html>