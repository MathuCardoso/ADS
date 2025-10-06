<?php
include_once('persistencia.php');

$livros = buscarDados("./arquivos/livros.json");

if (isset($_GET['id']))
    $id = $_GET['id'];

$idxExcluir = -1;
foreach ($livros as $idx => $l) {
    if ($id == $l['id']) {
        $idxExcluir = $idx;
        break;
    }
}

array_splice($livros, $idxExcluir, 1);

salvarDados($livros, "livros.json");

header("location: livros.php");
