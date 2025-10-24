<?php
include_once __DIR__ . "/../../controller/AlunoController.php";
include_once __DIR__ . "/../../controller/CursoController.php";


$erros = [];

if (isset($_POST['_submit'])) {
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
    $idade = is_numeric($_POST['idade']) ? trim($_POST['idade']) : null;
    $estrangeiro = isset($_POST['estrangeiro']) ? trim($_POST['estrangeiro']) : null;
    $idCurso = isset($_POST['curso']) ? trim($_POST['curso']) : null;

    $aluno = new Aluno();
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrangeiro);

    if ($idCurso) {
        $curso = new Curso();
        $curso->setId($idCurso);
        $aluno->setCurso($curso);
    }

    $ac = new AlunoController();
    $erros = $ac->insertAluno($aluno);
    if (empty($erros)) {
        header("location: " . APP_URL . "/view/alunos/listar.php");
        exit;
    }
}

include_once __DIR__ . "/form.php";
