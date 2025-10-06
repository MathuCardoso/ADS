<?php
include_once 'Connection.php';
class ProdutoDAO
{

    //MÉTODO QUE PEGA TODOS OS PRODUTOS DO BANCO
    public static function getProdutos(): array
    {
        $conn = Connection::getConnection();
        $sql = "SELECT * FROM produtos";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $result;
    }

    //MÉTODO QUE INSERE UM PRODUTO NO BANCO
    public static function insertProdutos(string $desc, string $unMed): void
    {
        $conn = Connection::getConnection();
        $sql = "INSERT INTO produtos(descricao, un_medida)
                VALUES(?, ?)";
        $stm = $conn->prepare($sql);
        $stm->execute([$desc, $unMed]);
    }

    //MÉTODO QUE DELETA UM PRODUTO DO BANCO
    public static function deleteProduto(int $id): void
    {
        $conn = Connection::getConnection();
        $sql = "DELETE FROM produtos WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$id]);
    }
}
