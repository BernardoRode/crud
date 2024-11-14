<?php
// Carregar usuario do arquivo

function carregarUsuarios()
{
    $usuarios = [];
    if (file_exists("usuarios.txt")) {
        $dados = file("usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($dados as $linha) {
            list($usuario, $senha) = explode(":", $linha);
            $usuarios[] = ["usuario" => $usuario, "senha" => $senha];
        }
    }
    return $usuarios;
}

//Salvar um novo usuario no arquivo
function salvarUsuarios($usuarios, $senha)
{
    $linha = $usuarios . ":" . $senha . PHP_EOL;
    file_put_contents("usuarios.txt", $linha, FILE_APPEND);
}


//Listar usuario

function listarUsuario()
{
    $usuarios = carregarUsuarios();
    echo "<table border ='2px' >";
    echo " <tr>
    <th>Nome</th>
    <th>Ações</th>
  </tr>";

    foreach ($usuarios as $index => $user) {
        echo "<tr height='30px' >";
        echo "<td  width = '200px' heigth = '30px' >"
            . htmlspecialchars($user['usuario']) . "</td> <td  width = '200px' heigth = '30px' > <a href =  'cadastro.php?excluir=" . $index . "'> Excluir </a> |" .
            "<a href='alterar.php?editar=" . $index . "'> Alterar </a></td></tr>";
        // echo "<tr height='30px' >";
    }
    echo "</table>";
}

function excluirUsuario($index)
{
    $usuario = carregarUsuarios();
    if (isset($usuario[$index])) {
        unset($usuario[$index]);
        file_put_contents("usuarios.txt", "");
        foreach ($usuario as $user) {
            salvarUsuarios(
                $user["usuario"],
                $user["senha"]
            );
        }
    }
}

function alterarUsuario($index, $novoUsuario, $novaSenha)
{
    $usuario = carregarUsuarios();
    if (isset($usuario[$index])) {
        $usuario[$index] = ["usuario" => $novoUsuario, "senha" => $novaSenha];
        file_put_contents("usuarios.txt", "");
        foreach ($usuario as $user) {
            salvarUsuarios($user["usuario"], $user["senha"]);
        }
    }
}
