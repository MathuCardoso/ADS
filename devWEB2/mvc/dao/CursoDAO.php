<?php
include_once __DIR__ . "/../util/Connection.php";
include_once __DIR__ . "/../model/Curso.php";

class CursoDAO
{
    private $conn;
    public function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function getCursos()
    {
        $sql = "SELECT * FROM cursos";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapCurso($result);
    }

    private function mapCurso(array $result)
    {
        $cursos = [];

        foreach ($result as $r) {
            $c = new Curso();
            $c->setId($r['id']);
            $c->setNome($r['nome']);
            $c->setTurno($r['turno']);

            array_push($cursos, $c);
        }

        return $cursos;
    }
}
