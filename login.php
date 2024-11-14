<?php
include "funcoes.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $usuarioValido = false;
    // Carrega os usuários do arquivo
    $usuarios = carregarUsuarios();
    // Vrifica se o usuário ou a senha estão no vetor de usuários
    foreach ($usuarios as $user) {
        if ($user["usuario"] === $usuario &&
            $user["senha"] === $senha ){
            $usuarioValido = true;
        break;
    }
}
if ($usuarioValido) {
    // Define o cookie para o login por 5 minutos(300 segundos)
    setcookie("usuario_logado", $usuario, time() + 300, "/");
    header("location:index.php");
    exit;
} else {
    echo "Usuário ou senha incorretos";
}
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login de Usuário</h2>
    <form action="index.php" method="POST">
    <input type="text" name="usuario" id="usuario" placeholder="Digite seu usuário"><br><br>
    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" require><br><br>
    <button type="submit">Entrar</button><br><br>

</form>
<a href="cadastro.php">Não tem cadastro? Clique aqui"</a></a>
</body>

</html>