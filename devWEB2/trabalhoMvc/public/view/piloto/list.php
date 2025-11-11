<div class="list">

    <h1>Pilotos Cadastrados</h1>

    <div class="pilotos">

        <?php
        foreach ($pilotos as $p):
        ?>


            <div class="card">
                <div class="c-head">
                    <img src="<?= $p->getFotoPerfil(); ?>" alt="">
                </div>

                <div class="p-body">

                    <span><?= $p->getNome(); ?></span>
                    <span><?= $p->getidade(); ?></span>
                    <span><?= $p->getEquipe()->getNome(); ?></span>
                </div>

            </div>

        <?php
        endforeach;
        ?>

    </div>

</div>