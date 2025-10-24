<?php
include_once __DIR__ . "/../util/Connection.php";
include_once __DIR__ . '/../model/Aluno.php';
include_once __DIR__ . '/../model/Curso.php';

class AlunosDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function findAlunoById(int $id)
    {
        $sql = "SELECT a.*, 
        c.id AS id_curso,
        c.nome AS nome_curso, 
        c.turno AS turno_curso
        FROM alunos AS a
        JOIN cursos AS c ON a.id_curso = c.id
        WHERE a.id = :id";
        $stm = $this->conn->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->execute();
        $result = $stm->fetchAll();
        $alunos = $this->map($result);

        if (count($alunos) == 1) {
            return $alunos[0];
        } elseif (count($alunos) == 0)
            return null;

        die("Mais de um aluno encontrado para o ID $id.");
    }

    public function list()
    {
        $sql = "SELECT a.*, 
                       c.id AS id_curso, 
                       c.nome AS nome_curso,
                       c.turno AS turno_curso
                FROM alunos AS a
                JOIN cursos AS c ON a.id_curso = c.id";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->map($result);
    }

    public function insert(Aluno $aluno)
    {
        $sql = "INSERT INTO alunos(nome,idade,estrangeiro,id_curso)
                VALUES(:nome, :idade, :estrangeiro, :curso)";
        $stm = $this->conn->prepare($sql);
        $stm->bindValue(":nome", $aluno->getNome());
        $stm->bindValue(":idade", $aluno->getIdade());
        $stm->bindValue(":estrangeiro", $aluno->getEstrangeiro());
        $stm->bindValue(":curso", $aluno->getCurso()->getId());
        $stm->execute();
    }

    public function update(Aluno $aluno)
    {
        $sql = "UPDATE alunos 
        SET nome = :nome, 
            idade = :idade, 
            estrangeiro = :estrangeiro, 
            id_curso = :id_curso
        WHERE id = :id";
        $stm = $this->conn->prepare($sql);
        $stm->bindValue(":nome", $aluno->getNome());
        $stm->bindValue(":idade", $aluno->getIdade());
        $stm->bindValue(":estrangeiro", $aluno->getEstrangeiro());
        $stm->bindValue(":id_curso", $aluno->getCurso()->getId());
        $stm->bindValue(":id", $aluno->getId());
        $stm->execute();
    }

    public function delete(int $id)
    {
        $conn = Connection::getConnection();
        $sql = "DELETE FROM alunos 
        WHERE id = :id";
        $stm = $conn->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
    }

    private function map($result)
    {
        $alunos = [];
        foreach ($result as $res) {
            $aluno = new Aluno();
            $aluno->setId($res['id']);
            $aluno->setNome($res['nome']);
            $aluno->setIdade($res['idade']);
            $aluno->setEstrangeiro($res['estrangeiro']);

            $curso = new Curso();
            $curso->setId($res['id_curso']);
            $curso->setNome($res['nome_curso']);
            $curso->setTurno($res['turno_curso']);
            $aluno->setCurso($curso);
            array_push($alunos, $aluno);
        }

        return $alunos;
    }
}
