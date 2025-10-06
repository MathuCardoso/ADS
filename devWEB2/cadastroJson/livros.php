<?php

include_once('persistencia.php');

$livros = buscarDados(DIR_ARQUIVO . "/" . "livros.json");
$msgErro = [];
if (isset($_POST['submit'])) {
    $titulo = isset($_POST['titulo']) ? trim($_POST['titulo']) : NULL;
    $autor = isset($_POST['autor']) ? trim($_POST['autor']) : NULL;
    $genero = isset($_POST['genero']) ? trim($_POST['genero']) : NULL;
    $numPaginas = isset($_POST['numPaginas']) ? trim($_POST['numPaginas']) : NULL;

    //validar dados

    if ($titulo == '') {
        array_push($msgErro, "Título deve ser preenchido");
    } else if (strlen($titulo) < 3) {
        array_push($msgErro, "Título deve ser preenchido");
    }
    if ($genero == '') {
        array_push($msgErro, "Gênero deve ser preenchido");
    }
    if ($autor == '') {
        array_push($msgErro, "Autor deve ser preenchido");
    }
    if ($numPaginas == '') {
        array_push($msgErro, "Número de páginas deve ser preenchido");
    }

    if (empty($msgErro)) {

        if ($genero == 'D') {
            $genero = "Drama";
        } else if ($genero == 'F') {
            $genero = "Ficção";
        } else if ($genero == 'R') {
            $genero = "Romance";
        } else if ($genero == 'O') {
            $genero = "Outro";
        }

        $livro = [
            "id" => uniqid(),
            "titulo" => $titulo,
            "autor" => $autor,
            "genero" => $genero,
            "paginas" => $numPaginas

        ];

        array_push($livros, $livro);
        salvarDados($livros, "livros.json");
    }
}



?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container-form d-flex flex-column col-12 my-3">

        <div class="form d-flex gap-4 mx-5">
            <!-- <form method="POST" onsubmit="return validar();" class="w-100 border border-3 border-danger p-3 rounded-3 w-fit"> -->

            <form method="POST" class="col-8 border p-3 rounded-3">
                <h1 class="">Cadastro de Livros</h1>


                <div class="mb-3">
                    <label class="form-label" for="titulo">Título</label>
                    <input
                        class="form-control" name="titulo"
                        value="<?= isset($titulo) ? $titulo : '' ?>"
                        id="titulo" type="text" placeholder="Informe o título" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="autor">Autor</label>
                    <input
                        class="form-control" name="autor" id="autor"
                        value="<?= isset($autor) ? $autor : '' ?>"
                        type="text" placeholder="Informe o Autor" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="genero">Gênero</label>
                    <select
                        class="form-select" name="genero"
                        id="genero">
                        <option value="">--Selecione o gênero--</option>
                        <option <?= isset($genero) && $genero == 'D' ? 'selected' : '' ?> value="D">Drama</option>

                        <option <?= isset($genero) && $genero == 'F' ? 'selected' : '' ?> value="F">Ficção</option>

                        <option <?= isset($genero) && $genero == 'R' ? 'selected' : '' ?> value="R">Romance</option>

                        <option <?= isset($genero) && $genero == 'O' ? 'selected' : '' ?> value="O">Outro</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label" for="titulo">Número de Páginas</label>
                    <input
                        class="form-control" name="numPaginas"
                        value="<?= isset($numPaginas) ? $numPaginas : '' ?>"
                        id="numPaginas" type="number" placeholder="Informe o número de páginas">
                    <input type="text" name="submit" value="1" hidden>
                </div>


                <input class="btn btn-primary" type="submit" value="Enviar" />
            </form>
            <div class="col-4">
                <?php
                if (!empty($msgErro))
                    foreach ($msgErro as $e):
                ?>
                    <span class="msgErro fs-5 fw-bold text-danger w-25" id="msgErro">
                        <?= $e ?>
                    </span>
                    <br>
                <?php
                    endforeach;
                ?>
            </div>
        </div>


    </div>




    <h2>Livros cadastrados</h2>

    <table border="1" class="text-center table table-dark table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Gênero</th>
            <th>Quant. Páginas</th>
            <th>Excluir</th>
        </tr>
        <?php
        foreach ($livros as $l):
        ?>

            <tr>
                <td class=""><?= $l['id']; ?></td>
                <td><?= $l['titulo'];  ?></td>
                <td><?= $l['autor'];  ?></td>
                <td><?= $l['genero'];  ?></td>
                <td><?= $l['paginas'];  ?></td>
                <td><a class="btn btn-danger" onclick="return confirm('Deseja excluir?');" href="excluirLivro.php?id=<?= $l['id']; ?>">EXCLUIR</a></td>
            </tr>

        <?php
        endforeach;
        ?>
    </table>


    <script src="./validacao.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>