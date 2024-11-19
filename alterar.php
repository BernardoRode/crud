<?php
include "funcoes.php";
if (isset($_GET["editar"])) {
    $index = $_GET["editar"];
    $usuario = carregarUsuarios();
    if (isset($usuario[$index])) {
        $usuarioAtual = $usuario[$index]["usuario"];
        $senhaAtual = $usuario[$index]["senha"];
    } else {
        echo "Usuario não encontrado";
        exit;
    }
}

//processa aletaração

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["senha"])) {
    $novoUsuario = $_POST["usuario"];
    $novaSenha = $_POST["senha"];
    alterarUsuario($index, $novoUsuario, $novaSenha);
    header("location: cadastro.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleAltUsuario.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h2>Alterar usuario</h2>
    </header>

    <form method="POST">
        <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuarioAtual); ?>" required>
        <input type="password" name="senha" value="<?php echo htmlspecialchars($senhaAtual); ?>" required>
        <button type="submit">Salvar altereção</button>
    </form>
</body>

</html>