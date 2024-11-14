<?php
include"funcoesAgenda.php";
if (isset($_GET["editar"])) {
    $index = $_GET["editar"];
    $agenda = carregarAgenda();
    if (isset($agenda[$index])) {
        $nomeAtual = $agenda[$index]["nome"];
        $foneAtual = $agenda[$index]["fone"];
    } else {
        echo "Usuario não encontrado";
        exit;
    }
}

//processa aletaração

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["senha"])) {
    $novoNome = $_POST["nome"];
    $novoFone = $_POST["fone"];
    alterarUsuario($index, $novoUsuario, $novaSenha);
    header("location: funcoesAgenda.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Alterar usuario</h2>
    <form method="POST">
        <input type="text" name="usuario" value="<?php echo htmlspecialchars($nomeAtual);?>" required>
        <input type="password" name="senha" value="<?php echo htmlspecialchars($foneAtual);?>" required>
        <button type="submit">Salvar altereção</button>
    </form>
</body>
</html>