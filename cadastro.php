<?php
include "funcoes.php";
// Processo cadastro usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) && isset($_POST["senha"])) {
    $novoUsuario = $_POST["usuario"];
    $novaSenha = $_POST["senha"];
    salvarUsuarios($novoUsuario, $novaSenha);
    echo " Usuario cadastrado com sucesso! ";
    header("Location: login.php");
}
// Processa a exclusão do usuário
if (isset($_GET["excluir"])) {
    $index = $_GET["excluir"];
    excluirUsuario($index);
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <h2>
        Cadastre um novo usuário
    </h2>

    <form method="POST" action="login.php">
        <input type="text" name="usuario" id="usuario" placeholder="usuario" required><br><br>
        <input type="password" name="senha" id="senha" placeholder="senha" required><br><br>
        <button type="submit">Cadastrar</button>
    </form>
    <h3>
        Usuarios Cadastrados
    </h3>
    <?php listarUsuario() ?>
</body>

</html>