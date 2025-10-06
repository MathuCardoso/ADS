<?php
include_once 'ProdutoDAO.php';

$msgErros = [];
if (isset($_GET['submit'])) {
    $desc = $_GET['desc'] ?? '';
    $unMed = $_GET['unMed'] ?? '';

    if (!$desc)
        array_push($msgErros, "O campo [DESCRIÇÃO] é obrigatório.");
    if (!$unMed)
        array_push($msgErros, "O campo [Unidade de Medida] é obrigatório.");

    if (empty($msgErros)) {
        ProdutoDAO::insertProdutos($desc, $unMed);
        header("location: listarProdutos.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body style="height: 100vh;">

    <div style="height: 100%;" class="container d-flex justify-content-center align-items-center flex-column">

        <form>

            <label for="desc" class="form-label">Descrição</label>
            <input type="text" name="desc" id="desc" class="form-control"
                value="<?= $desc ?? '' ?>">

            <label for="unMed" class="form-label">Unidade de Medida</label>
            <input type="text" name="unMed" id="unMed" class="form-control mb-3"
                value="<?= $unMed ?? '' ?>">


            <input type="text" name="submit" value="1" hidden>
            <button class="btn btn-success">SALVAR</button>
            <a href="listarProdutos.php" class="btn btn-primary">Lista de produtos</a>
        </form>

        <?php
        if (!empty($msgErros)):
        ?>

            <div class="msgErros mt-3 text-danger">

                <?php foreach ($msgErros as $e): ?>

                    <span></span><?= $e ?></span>
                    <br>

                <?php endforeach; ?>

            </div>

        <?php
        endif;
        ?>

    </div>

</body>

</html>