<?php

namespace App\repository;

use App\database\Connection;
use App\model\Categoria;
use PDO;

class CategoriaDAO
{

    private PDO $conn;

    public function __construct()
    {
        $this->conn = Connection::getConn();
    }

    public function list()
    {
        $sql = "SELECT * FROM categorias c
        ORDER BY c.id";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $this->map($stm->fetchAll());
        return $result;
    }

    public function insert(Categoria $c)
    {
        $sql = "INSERT INTO categorias(
        nome_categoria, max_pilotos, max_equipes, logo)
        VALUES(:nome, :maxP, :maxE, :logo);";
        $stm = $this->conn->prepare($sql);

        $stm->bindValue(":nome", $c->getNome());
        $stm->bindValue(":maxP", $c->getMaxPilotos());
        $stm->bindValue(":maxE", $c->getMaxEquipes());
        $stm->bindValue(":logo", $c->getLogo());
        $stm->execute();
    }

    private function map(array $result)
    {
        $categorias = [];
        foreach ($result as $r) {
            $categoria = new Categoria();
            $categoria->setId($r['id']);
            $categoria->setNome($r['nome_categoria']);
            $categoria->setMaxPilotos($r['max_pilotos']);
            $categoria->setMaxEquipes($r['max_equipes']);
            $categoria->setLogo($r['logo']);
            array_push($categorias, $categoria);
        }

        return $categorias;
    }
}
