<?php
include_once 'ProdutoDAO.php';
$produtos = ProdutoDAO::getProdutos();
?>

<!DOCTYPE html>
<html lang="pr-BR" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body style="height: 100vh;">

    <div style="height: 100%;" class="container d-flex justify-content-center align-items-center flex-column gap-3">


        <a href="cadastrarProduto.php" class="btn btn-success">ADICIONAR PRODUTOS</a>


        <table border="2px" class="table table-dark">

            <th>Id</th>
            <th>Descrição</th>
            <th>Unidade de medida</th>
            <th>Excluir</th>

            <?php
            foreach ($produtos as $p):
            ?>

                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= $p['descricao'] ?></td>
                    <td><?= $p['un_medida'] ?></td>
                    <td>
                        <a onclick="return confirm('Confirma a exclusão do produto?')"
                            href="excluirProduto.php?id=<?= $p['id'] ?>" class="text-danger">EXCLUIR</a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </table>

    </div>

</body>

</html>