<?php
define("DIR_ARQUIVO", "arquivos");

function salvarDados($array, $arquivo)
{
    $json = json_encode($array, JSON_PRETTY_PRINT);

    file_put_contents(DIR_ARQUIVO . "/" . $arquivo, $json);
    header("location: livros.php");
}

function buscarDados($path)
{

    if (file_exists($path)) {
        $json = file_get_contents($path);
        $dados = json_decode($json, true);


        return $dados;
    }
}

