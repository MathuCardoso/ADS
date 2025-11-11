<div class="list">

    <h1>Equipes Cadastradas</h1>

    <div class="equipes">

        <?php
        foreach ($equipes as $e):
        ?>

            <div class="card"
                style="background-color: <?= $e->getCor1(); ?>; 
                color: <?= $e->getCor2() ?>">
                <div class="c-head">

                    <?= $e->getNome(); ?>
                </div>

                <div class="c-body">
                    <?= $e->getSede() ?>
                    <?= $e->getCategoria()->getNome() ?>
                </div>

            </div>
        <?php endforeach; ?>



    </div>

</div>