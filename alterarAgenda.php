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
    alterarAgenda($index, $novoNome, $novoFone);
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleAltAgenda.css">
    <title>Document</title>
</head>
<body>
    <header>
    <h1>Alterar Agenda</h1>
    </header>
    <form method="POST">
        <input type="text" name="nome" value="<?php echo htmlspecialchars($nomeAtual);?>" required>
        <input type="number" name="fome" value="<?php echo htmlspecialchars($foneAtual);?>" required>
        <button type="submit">Salvar altereção</button>
    </form>
</body>
</html>