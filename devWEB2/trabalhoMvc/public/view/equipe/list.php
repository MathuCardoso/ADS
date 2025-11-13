<div class="list">
    <?php require_once App::DIR_COMPONENTS . "menu.php" ?>


    <h1>Equipes Cadastradas</h1>

    <div class="equipes">

        <?php
        foreach ($equipes as $e):
        ?>

            <div class="card"
                style="background-color: <?= $e->getCor1(); ?>; 
                color: <?= $e->getCor2() ?>">
                <div class="c-nome">
                    <span><?= $e->getNome(); ?></span>
                </div>

                <div class="c-info">
                    <span><?= $e->getSede() ?></span>
                    <span><?= $e->getCategoria()->getNome() ?></span>
                </div>

            </div>
        <?php endforeach; ?>



    </div>

</div>