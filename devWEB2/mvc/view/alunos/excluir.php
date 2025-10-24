<?php
include_once __DIR__ . "/../../controller/AlunoController.php";
$idAluno = $_GET['idAluno'] ?? '';

if ($idAluno) {
    $ac = new AlunoController();
    $ac->deleteAluno($idAluno);
}
