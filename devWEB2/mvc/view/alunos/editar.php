<?php
include_once __DIR__ . "/../../controller/AlunoController.php";
include_once __DIR__ . "/../../controller/CursoController.php";

if (isset($_POST['_submit'])) {
    $idAluno      = is_numeric($_POST['idAluno']) ? (int)trim($_POST['idAluno']) : null;
    $nome         = isset($_POST['nome']) ? trim($_POST['nome']) : null;
    $idade        = isset($_POST['idade']) ? trim((int)$_POST['idade']) : null;
    $estrangeiro  = isset($_POST['estrangeiro']) ? trim($_POST['estrangeiro']) : null;
    $idCurso      = is_numeric($_POST['curso']) ? trim($_POST['curso']) : null;

    $aluno = new Aluno();
    $aluno->setId($idAluno);
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrangeiro);

    if ($idCurso) {
        $curso = new Curso();
        $curso->setId($idCurso);
        $aluno->setCurso($curso);
    }

    $ac = new AlunoController();
    $erros = $ac->update($aluno);

    if (empty($erros)) {
        header("location: " . APP_URL . "/view/alunos/listar.php");
        exit;
    }
} else {

    $idAluno = isset($_GET['idAluno']) ? (int)trim($_GET['idAluno']) : null;
    $ac = new AlunoController();
    $aluno = $ac->findAlunoById($idAluno);
    if (!$aluno) {
        echo "Aluno não encontrado.";
        echo "<br>";
        echo "<a href='listar.php'>VOLTAR</a>";
        exit;
    }
}





include_once "./form.php";
