<?php
include_once __DIR__ . "/../dao/AlunosDAO.php";
include_once __DIR__ . "/../service/AlunoService.php";
class AlunoController
{
    private $alunoService;
    private ?AlunosDAO $alunosDao;

    public function __construct()
    {
        $this->alunosDao = new AlunosDAO();
        $this->alunoService = new AlunoService();
    }
    public function findAlunoById(int $id)
    {
        return $this->alunosDao->findAlunoById($id);
    }

    public function listar()
    {
        $alunos = $this->alunosDao->list();
        return $alunos;
    }

    public function insertAluno(Aluno $aluno)
    {
        $erros = $this->alunoService->validate($aluno);

        if (empty($erros)) {
            $this->alunosDao->insert($aluno);
            return [];
        }
        return $erros;
    }

    public function update(Aluno $aluno)
    {
        $erros = $this->alunoService->validate($aluno);

        if (empty($erros)) {
            $this->alunosDao->update($aluno);
            return [];
        } else
            return $erros;
    }

    public function deleteAluno(int $idAluno)
    {
        try {
            $this->alunosDao->delete($idAluno);
            header("location: " . APP_URL . "/view/alunos/listar.php");
            exit;
        } catch (PDOException $p) {
            echo "Erro ao excluir aluno.";
            echo "<br><a href='listar.php'>Voltar</a>";
            echo $p->getMessage();
        }
    }
}
