<?php
include "funcoes.php";
// Processo cadastro usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) && isset($_POST["senha"])) {
    $novoUsuario = $_POST["usuario"];
    $novaSenha = $_POST["senha"];
    salvarUsuarios($novoUsuario, $novaSenha);
    echo "Usuário cadastrado com sucesso!";
    header("Location: login.php");
    exit;
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
    <link rel="stylesheet" href="style/styleCadUsuario.css">
</head>

<body>
    <div class="container">
        <h2>Cadastre um novo usuário</h2>

        <form method="POST">
            <input type="text" name="usuario" id="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" id="senha" placeholder="Senha" required>
            <button type="submit">Cadastrar</button>
        </form>

        <h3>Usuários Cadastrados</h3>
        <div class="usuarios-cadastrados">
            <?php listarUsuario() ?>
        </div>
    </div>
</body>

</html>
