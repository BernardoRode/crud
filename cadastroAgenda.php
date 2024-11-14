<?php
include "funcoesAgenda.php";
// Processo cadastro usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"]) && isset($_POST["fone"])) {
    $nome = $_POST["nome"];
    $fone = $_POST["fone"];
    salvarAgenda($nome, $fone);
    echo " Agenda cadastrada com sucesso! ";
}

// Processa a exclusão do usuário
if (isset($_GET["excluir"])) {
    $index = $_GET["excluir"];
    excluirAgenda($index);
    header("location:cadastroAgenda.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro agenda</title>
</head>

<body>
    <h2>
        Cadastre uma nova agenda
    </h2>

    <form method="POST" action="cadastroAgenda.php">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="tel" name="fone" placeholder="Fone" required>
        <button type="submit">Cadastrar</button>
    </form>
    <h3>
        Agendas Cadastradas
    </h3>
    <?php listarAgenda() ?>
</body>

</html>