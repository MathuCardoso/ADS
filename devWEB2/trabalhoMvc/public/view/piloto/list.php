<div class="list">

    <?php require_once App::DIR_COMPONENTS . "menu.php" ?>


    <h1>Pilotos Cadastrados</h1>

    <div class="pilotos">

        <?php
        foreach ($pilotos as $p):
        ?>
            <style>
                .card {
                    box-shadow: 3px 3px 10px black;
                    transition: all 0.2s ease;
                }

                .card.card-<?= $p->getId(); ?>:hover {
                    box-shadow: 3px 3px 10px <?= $p->getEquipe()->getCor1(); ?>;
                }
            </style>


            <div class="card card-<?= $p->getId(); ?>">
                <div class="c-head">
                    <img src="<?= $p->getFotoPerfil(); ?>" alt="" width="100%">
                </div>

                <div class="c-body">

                    <div class="c-nome">

                        <span id="nome"><?= $p->getNome(); ?></span>
                    </div>

                    <div class="c-infos">
                        <span><?= $p->getIdade(); ?> anos</span>
                        <span
                            style="color: <?=
                                            $p->getEquipe()->getCor1();

                                            ?>;"
                            id="numero">
                            <?= $p->getNumero(); ?></span>
                    </div>

                    <div class="c-nacional">
                        <span><?= $p->getNacionalidade() ?></span>
                    </div>

                    <div class="c-equipe">

                        <span
                            style="color: <?=
                                            $p->getEquipe()->getCor1();

                                            ?>;">
                            <?= $p->getEquipe()->getNome(); ?>
                        </span>
                    </div>
                </div>

                <form
                    onsubmit="return confirm('Deseja mesmo excluir o piloto?')"
                    method="POST" id="form-delete-<?= $p->getId() ?>" hidden>
                    <input name="__method" value="delete">
                    <input type="number" name="id" value="<?= $p->getId(); ?>" hidden>
                </form>

                <button type="submit" form="form-delete-<?= $p->getId() ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash3-fill trash" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                    </svg>
                </button>

            </div>

        <?php
        endforeach;
        ?>

    </div>

</div>