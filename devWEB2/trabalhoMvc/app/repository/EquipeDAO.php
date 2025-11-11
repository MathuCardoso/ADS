<?php

namespace App\repository;

use App\database\Connection;
use App\model\Categoria;
use App\model\Equipe;
use PDO;

class EquipeDAO
{

    private PDO $conn;

    public function __construct()
    {
        $this->conn = Connection::getConn();
    }

    public function list()
    {
        $sql = "SELECT e.*, c.id AS id_categoria, c.nome_categoria
        FROM equipes e
        JOIN categorias AS c on e.id_categoria = c.id
        ORDER BY e.id DESC;";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $this->map($stm->fetchAll());
        return $result;
    }

    public function insert(Equipe $e)
    {
        $sql = "INSERT INTO equipes(nome_equipe, sede, cor1, cor2, id_categoria) VALUES(:nome, :sede, :cor1, :cor2, :categoria)";
        $stm = $this->conn->prepare($sql);
        $stm->bindValue(":nome", $e->getNome());
        $stm->bindValue(":sede", $e->getSede());
        $stm->bindValue(":cor1", $e->getCor1());
        $stm->bindValue(":cor2", $e->getCor2());
        $stm->bindValue(":categoria", $e->getCategoria()->getId());
        $stm->execute();
    }

    private function map(array $result)
    {
        $equipes = [];

        foreach ($result as $r) {
            $equipe = new Equipe();
            $equipe->setId($r['id']);
            $equipe->setNome($r['nome_equipe']);
            $equipe->setSede($r['sede']);
            $equipe->setCor1($r['cor1']);
            $equipe->setCor2($r['cor2']);
            $categoria = new Categoria();
            $categoria->setId($r['id_categoria']);
            $categoria->setNome($r['nome_categoria']);
            $equipe->setCategoria($categoria);
            array_push($equipes, $equipe);
        }

        return $equipes;
    }
}
