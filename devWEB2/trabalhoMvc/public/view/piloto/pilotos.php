<?php

$viewController
    ->setLinks([
        "css/piloto.css",
        "css/form.css",
        "css/list.css"
    ])
    ->setTitle("Pilotos")
    ->includeHtmlHeader();
?>

<div class="container container-piloto">


    <?php require_once App::URL_VIEW . "piloto/list.php" ?>

    <div class="divider"></div>

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
                        placeholder="Ex: Felipe Drugovich"
                        value="<?= isset($piloto) ? $piloto->getNome() : "" ?>">
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
                        placeholder="Ex: 21"
                        value="<?= isset($piloto) ? $piloto->getIdade() : "" ?>">

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
                        <option value=""></option>
                    </select>


                </div>

                <div class="form-control">
                    <label for="inpFoto" class="fotoLabel">Foto do piloto</label>
                    <button type="button" class="inp" id="selFoto">Escolha uma foto</button>
                    <input
                        class="inp"
                        id="inpFoto"
                        type="file"
                        name="foto"
                        hidden>
                </div>

                <div class="form-control">
                    <?php if (isset($erros['equipe'])): ?>

                        <label for="selEquipe" class="invalid"><?= $erros['equipe'] ?></label>

                    <?php else: ?>

                        <label for="selEquipe">Equipe do piloto</label>

                    <?php endif; ?>
                    <select name="equipe" id="selEquipe" class="sel">
                        <option value=""></option>

                        <?php foreach ($equipes as $e): ?>

                            <option value="<?= $e->getId() ?>"
                                <?= isset($piloto) && $piloto->getEquipe()->getId() == $e->getId() ? 'selected' : '' ?>>
                                <?= $e->getNome() ?>
                            </option>

                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-control">

                    <?php if (isset($erros['numero'])): ?>

                        <label for="selNum" class="invalid"><?= $erros['numero'] ?></label>

                    <?php else: ?>

                        <label for="selNum">Número do piloto</label>

                    <?php endif; ?>

                    <select name="numero" id="selNum" class="sel">
                        <option value=""></option>

                        <?php for ($i = 0; $i <= 99; $i++): ?>

                            <option value="<?= $i ?>">
                                <?= $i ?>
                            </option>

                        <?php endfor; ?>

                    </select>

                </div>
            </div>

            <div class="preview">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                    class="loading"
                    preserveAspectRatio="xMidYMid" style="
                    shape-rendering: auto; display: none; background: transparent;" width="50" height="50" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g>
                        <circle stroke-dasharray="164.93361431346415 56.97787143782138" r="35" stroke-width="10" stroke="#ffffff" fill="none" cy="50" cx="50">
                            <animateTransform keyTimes="0;1" values="0 50 50;360 50 50" dur="1s" repeatCount="indefinite" type="rotate" attributeName="transform"></animateTransform>
                        </circle>
                    </g>
                </svg>
                <img src="/public/assets/racer_default.png" id="imgPreview">
            </div>

            <div class="buttons">

                <button
                    class="btn btn-submit"
                    type="submit">ENVIAR</button>
                <input class="btn btn-reset" id="btn-reset" type="reset" value="RESETAR">
            </div>
        </form>
    </div>

</div>

<?php

$viewController->setScriptLink([
    "/js/paises.js",
    "/js/fileReader.js"
])
    ->includeHtmlFooter();
?>