<?php
// Carregar usuario do arquivo

function carregarAgenda()
{
    $agenda = [];
    if (file_exists("agendas.txt")) {
        $linhas = file("agendas.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($linhas as $linha) {
            list($nome, $fone) = explode(":", $linha);
            $agenda[] = ["nome" => $nome, "fone" => $fone];
        }
    }
    return $agenda;
}

//Salvar um novo usuario no arquivo
function salvarAgenda($nome, $fone)
{
    $linha = $nome . ":" . $fone . PHP_EOL;
    file_put_contents("agendas.txt", $linha, FILE_APPEND);
}


//Listar usuario

function listarAgenda()
{
    $agenda = carregarAgenda();
    echo "<table border ='2px' >";
    echo " <tr>
    <th>Nome</th>
    <th>Telefone</th>
    <th>Ações</th>
  </tr>";
    
    foreach ($agenda as $index => $user) {
        echo "<tr height='30px' >";
        echo "<td  width = '200px' heigth = '30px' >"
        .htmlspecialchars($user['nome']) . "</td> <td  width = '200px' heigth = '30px' > " . $user['fone'] .
            "</td> <td  width = '200px' heigth = '30px' > <a href =  'cadastroAgenda.php?excluir=" . $index . "'> Excluir </a> |" .
            "<a href='alterarAgenda.php?editar=" . $index . "'> Alterar </a></td></tr>";
       // echo "<tr height='30px' >";
    }
    echo "</table>";
}

function excluirAgenda($index)
{
    $agenda = carregarAgenda();
    if (isset($agenda[$index])) {
        unset($agenda[$index]);
        file_put_contents("agendas.txt", "");
        foreach ($agenda as $user) {
            salvarAgenda(
                $user["nome"],
                $user["fone"]
            );
        }
    }
}

function alterarAgenda($index, $novoNome, $novoFone)
{
    $agenda = carregarAgenda();
    if (isset($agenda[$index])) {
        $agenda[$index] = ["nome" => $novoNome, "fone" => $novoFone];
        file_put_contents("agendas.txt", "");
        foreach ($agenda as $user) {
            salvarAgenda($user["nome"], $user["fone"]);
        }
    }
}
