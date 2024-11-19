<?php
include "funcoesAgenda.php";
// Processo cadastro usuario

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $fone = $_POST["fone"];
    salvarAgenda($nome, $fone);
    echo " Agenda cadastrada com sucesso! ";
}
if (isset($_GET["excluir"])) {
    $index = $_GET["excluir"];
    excluirAgenda($index);
    header("location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleCadAgenda.css">
    <title>Cadastro agenda</title>
</head>

<body>
    <header>
        <h1>
            Cadastre uma nova agenda
        </h1>
    </header>


    <div class="container">
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="number" name="fone" placeholder="Fone" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>

</body>

</html>