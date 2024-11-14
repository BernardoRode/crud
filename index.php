<?php
if (isset($_COOKIE['usuario_logado'])) {
    $usuario = htmlspecialchars($_COOKIE['usuario_logado']);
} else {
    header('Location:login.php');
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
    <header>
        <h1>Agenda</h1> <button><a href="cadastroAgenda.php">Cadastrar agenda</a></button>
    </header>
    <?php
    include 'funcoesAgenda.php';
    carregarAgenda();
    ?>
</body>

</html>