<?php

namespace App\repository;

use App\model\Piloto;
use App\database\Connection;
use App\model\Equipe;
use PDO;

class PilotoDAO
{

    private PDO $conn;

    public function __construct()
    {
        $this->conn = Connection::getConn();
    }

    public function list(): array
    {
        $sql = "SELECT p.*, e.id AS id_equipe, e.nome_equipe, e.cor1, e.cor2
                FROM pilotos p
                JOIN equipes e on id_equipe = e.id
                ORDER BY p.id DESC;";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $this->map($stm->fetchAll());
        return $result;
    }

    public function insert(Piloto $piloto): void
    {
        $sql = "INSERT INTO pilotos(nome_piloto, idade, nacionalidade, numero, foto_piloto, id_equipe) 
        VALUES (:nome, :idade, :nacional, :numero, :foto, :equipe) ";

        $stm = $this->conn->prepare($sql);

        $stm->bindValue(":nome", $piloto->getNome());
        $stm->bindValue(":idade", $piloto->getIdade());
        $stm->bindValue(":nacional", $piloto->getNacionalidade());
        $stm->bindValue(":numero", $piloto->getNumero());
        $stm->bindValue(":foto", $piloto->getFotoPerfil());
        $stm->bindValue(":equipe", $piloto->getEquipe()->getId());

        $stm->execute();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM pilotos WHERE id = :id";
        $stm = $this->conn->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->execute();
    }

    private function map(array $result): array
    {
        $pilotos = [];

        foreach ($result as $r) {
            $piloto = new Piloto();
            $piloto->setId($r['id']);
            $piloto->setNome($r['nome_piloto']);
            $piloto->setIdade($r['idade']);
            $piloto->setNacionalidade($r['nacionalidade']);
            $piloto->setNumero($r['numero']);
            $piloto->setFotoPerfil($r['foto_piloto']);
            $equipe = new Equipe();
            $equipe->setId($r['id_equipe']);
            $equipe->setNome($r['nome_equipe']);
            $equipe->setCor1($r['cor1']);
            $equipe->setCor2($r['cor2']);
            $piloto->setEquipe($equipe);
            array_push($pilotos, $piloto);
        }
        return $pilotos;
    }
}
