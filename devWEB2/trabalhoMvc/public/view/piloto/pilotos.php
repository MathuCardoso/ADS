<?php

$viewController
    ->setLinks([
        "css/piloto.css",
        "css/form.css",
        "css/list.css"
    ])
    ->setTitle("teste");

require_once App::URL_INCLUDE . "template/app_head.php";
?>

<div class="container container-piloto">


    <?php require_once App::URL_VIEW . "piloto/list.php" ?>

    <div class="form-container">

        <form class="form" method="POST" enctype="multipart/form-data">


            <h2>Cadastro de Piloto</h2>
            <div class="form-group">

                <div class="form-control">
                    <?php if (isset($erros['nome'])): ?>

                        <label for="inpNome" class="invalid"><?= $erros['nome'] ?></label>

                    <?php else: ?>

                        <label for="inpNome">Nome do piloto</label>

                    <?php endif; ?>
                    <input
                        class="inp"
                        id="inpNome"
                        type="text"
                        name="nome"
                        placeholder="Ex: Felipe Drugovich">
                </div>

                <div class="form-control">
                    <?php if (isset($erros['idade'])): ?>

                        <label for="inpIdade" class="invalid"><?= $erros['idade'] ?></label>

                    <?php else: ?>

                        <label for="inpIdade">Idade do piloto</label>

                    <?php endif; ?>
                    <input
                        class="inp"
                        id="inpIdade"
                        type="number"
                        name="idade"
                        placeholder="Ex: 21">
                </div>

                <div class="form-control">
                    <?php if (isset($erros['nacional'])): ?>

                        <label for="inpNacional" class="invalid"><?= $erros['nacional'] ?></label>

                    <?php else: ?>

                        <label for="inpNacional">Nacionalidade do piloto</label>

                    <?php endif; ?>
                    <select
                        class="sel"
                        id="inpNac"
                        name="nacional">
                        <option value="">Escolha um país</option>
                    </select>


                </div>

                <div class="form-control">
                    <label for="inpFoto">Foto do piloto</label>
                    <input
                        class="inp"
                        id="inpFoto"
                        type="file"
                        name="foto">
                </div>

                <div class="form-control">
                    <?php if (isset($erros['equipe'])): ?>

                        <label for="selEquipe" class="invalid"><?= $erros['equipe'] ?></label>

                    <?php else: ?>

                        <label for="selEquipe">Equipe do piloto</label>

                    <?php endif; ?>
                    <select name="equipe" id="selEquipe" class="sel">
                        <option value="">Escolha uma equipe</option>

                        <?php foreach ($equipes as $e): ?>

                            <option value="<?= $e->getId() ?>">
                                <?= $e->getNome() ?>
                            </option>

                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <button
                class="btn"
                type="submit">ENVIAR</button>
        </form>
    </div>

</div>

<?php

$viewController->setScriptLink(["/js/paises.js"]);

require_once App::URL_INCLUDE . "template/app_footer.php";
?>