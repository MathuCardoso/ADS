<?php
include_once 'ProdutoDAO.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    ProdutoDAO::deleteProduto($id);
    header("location: listarProdutos.php");
}
else {
    echo "Produto não encontrado.";
    echo "<a href='listarProdutos.php'>VOLTAR</a>";
}
