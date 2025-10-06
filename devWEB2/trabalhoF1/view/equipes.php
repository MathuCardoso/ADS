<?php
include_once "../controller/persistencia.php";

$equipes = buscarDados(DIR_ARQUIVO . "equipes.json");
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipes</title>
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/equipes.css">


    


</head>

<body>
    <div class="container">
        <?php include_once "../components/header.php" ?>

        <h1>Equipes cadastradas:</h1>


        <section class="sectionEquipes">



            <div class="equipes">

                <?php
                foreach ($equipes as $e):
                ?>

                    <div class="card"
                        style="border-color: <?= $e['cor'] ?>;
                        background-color: <?= $e['cor']; ?>">
                        <a href="../controller/excluirEquipe.php?id=<?= $e['id'] ?>" 
                        onclick="return confirm('Confirma a exclusão?')">
                            <i class="fa-solid fa-trash lixeira"></i>
                        </a>

                        <div class="header" style="border-color: <?= $e['cor'] ?>">
                            <img src="../arquivos/imgs/<?= $e['logo'] ?>" alt="">
                            <span><?= $e['nome'] ?></span>
                        </div>
                        <div class="body">
                            <span><?= $e['piloto1'] ?></span>
                            <span><?= $e['piloto2'] ?></span>
                        </div>
                        <footer class="footer">
                            <img 
                            src="../arquivos/imgs/<?= $e['carro'] ?>" alt="">
                        </footer>

                    </div>

                <?php endforeach; ?>

            </div>
        </section>
    </div>

    <script src="https://kit.fontawesome.com/ece9031cab.js" crossorigin="anonymous"></script>
</body>

</html>