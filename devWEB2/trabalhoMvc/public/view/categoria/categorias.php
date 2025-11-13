<?php

$viewController
    ->setLinks([
        "css/categoria.css",
        "css/form.css",
        "css/list.css"
    ])
    ->setTitle("Form")
    ->includeHtmlHeader();
?>

<div class="container container-categoria">


    <?php require_once App::URL_VIEW . "categoria/list.php" ?>

    <div class="form-container">

        <form class="form" method="POST" enctype="multipart/form-data">


            <h2>Cadastro de Categorias</h2>
            <div class="form-group">

                <div class="form-control">
                    <?php if (isset($erros['nome'])): ?>

                        <label for="inpNome" class="invalid"><?= $erros['nome'] ?></label>

                    <?php else: ?>

                        <label for="inpNome">Nome da categoria</label>

                    <?php endif; ?>
                    <input
                        class="inp"
                        id="inpNome"
                        type="text"
                        name="nome"
                        placeholder="Ex: Fórmula 1">
                </div>

                <div class="form-control">
                    <?php if (isset($erros['maxPilotos'])): ?>

                        <label for="selMaxP" class="invalid"><?= $erros['maxPilotos'] ?></label>

                    <?php else: ?>

                        <label for="selMaxP">Máximo de pilotos</label>

                    <?php endif; ?>
                    <select
                        class="sel"
                        id="selMaxP"
                        type="text"
                        name="maxPilotos">
                        <option value=""></option>
                        <?php for ($i = 20; $i <= 60; $i += 2): ?>

                            <option value="<?= $i ?>">
                                <?= $i ?>
                                pilotos
                            </option>

                        <?php endfor; ?>
                    </select>
                </div>

                <div class="form-control">
                    <?php if (isset($erros['maxEquipes'])): ?>

                        <label for="selMaxP" class="invalid"><?= $erros['maxEquipes'] ?></label>

                    <?php else: ?>

                        <label for="selMaxE">Máximo de equipes</label>

                    <?php endif; ?>
                    <select
                        class="sel"
                        id="selMaxE"
                        type="text"
                        name="maxEquipes">
                        <option value=""></option>
                        <?php for ($i = 10; $i <= 30; $i++): ?>

                            <option value="<?= $i ?>">
                                <?= $i ?>
                                equipes
                                -
                                <?= $i * 2 ?>
                                carros
                            </option>

                        <?php endfor; ?>
                    </select>
                </div>


                <div class="form-control">
                    <?php if (isset($erros['logo'])): ?>

                        <label for="inpLogo" class="invalid"><?= $erros['logo'] ?></label>

                    <?php else: ?>

                        <label for="inpLogo">Logo da categoria</label>

                    <?php endif; ?>
                    <input
                        class="inp"
                        id="inpLogo"
                        type="file"
                        name="logo">
                </div>
            </div>

            <button
                class="btn"
                type="submit">ENVIAR</button>
        </form>
    </div>

</div>

<?php
$viewController->includeHtmlFooter();
?>