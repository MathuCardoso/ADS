<?php
include_once 'persistencia.php';

$equipes = buscarDados("../arquivos/equipes.json");

if (isset($_GET['id']))
    $id = $_GET['id'];

$idxExcluir = 0;
foreach ($equipes as $idx => $l) {
    if ($id == $l['id']) {
        $idxExcluir = $idx;
        break;
    }
}

array_splice($equipes, $idxExcluir, 1);
salvarDados($equipes, "../arquivos/equipes.json");

header("Location: ../view/equipes.php");
exit;