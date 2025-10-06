<?php
include_once __DIR__ . "/../controller/persistencia.php";

$equipes = buscarDados(DIR_ARQUIVO . "equipes.json");
?>

<header>
    <nav class="nav-container">
        <div class="logo">
            <img id="f1Logo" src="<?= BASE_URL . "/assets/f1-logo.png" ?>" alt="">
            <span class="ano">2025</span>
        </div>
        <marquee width="500" direction="left">
            <?php
            foreach ($equipes as $e) {
                echo "<span style='color: {$e['cor']};
                    margin-right: 20px;
                    font-size: 25px;
                    font-weight: bold;'
                    >{$e['nome']}</span>";
            }
            ?>
        </marquee>
        <ul class="menu">
            <li><a href="<?= BASE_URL ?>">Home</a></li>
            <li><a href="<?= BASE_URL . "/view/equipes.php"?>">Equipes</a></li>
            <li><a href="<?= BASE_URL . "/view/cadastro.php"?>">Cadastro</a></li>
        </ul>


    </nav>

</header>