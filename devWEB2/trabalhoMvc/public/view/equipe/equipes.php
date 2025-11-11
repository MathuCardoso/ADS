<?php

$viewController
    ->setLinks([
        "css/equipe.css",
        "css/form.css",
        "css/list.css"
    ])
    ->setTitle("Equipes");

require_once App::URL_INCLUDE . "template/app_head.php";
?>

<div class="container container-equipe">


    <?php require_once App::URL_VIEW . "equipe/list.php" ?>

    <div class="form-container">

        <form class="form" method="POST">


            <h2>Cadastro de Equipes</h2>
            <div class="form-group">

                <div class="form-control">
                    <?php if (isset($erros['nome'])): ?>

                        <label for="inpNome" class="invalid"><?= $erros['nome'] ?></label>

                    <?php else: ?>

                        <label for="inpNome">Nome da equipe</label>

                    <?php endif; ?>
                    <input
                        class="inp"
                        id="inpNome"
                        type="text"
                        name="nome"
                        placeholder="Ex: Red Bull Racing"
                        value="<?= isset($equipe) ? $equipe->getNome() : ''; ?>">
                </div>

                <div class="form-control">
                    <?php if (isset($erros['sede'])): ?>

                        <label for="inpSede" class="invalid"><?= $erros['sede'] ?></label>

                    <?php else: ?>

                        <label for="inpIdade">Sede da equipe</label>

                    <?php endif; ?>
                    <input
                        class="inp"
                        id="inpSede"
                        type="text"
                        name="sede"
                        placeholder="Ex: Woking - UK"
                        value="<?= isset($equipe) ? $equipe->getSede() : ''; ?>">

                </div>

                <div class="form-control">
                    <?php if (isset($erros['cor1'])): ?>

                        <label for="inpCor1" class="invalid"><?= $erros['cor1'] ?></label>

                    <?php else: ?>

                        <label for="inpCor1">Cor 1 da equipe</label>

                    <?php endif; ?>
                    <input
                        class="inp"
                        id="inpCor1"
                        name="cor1"
                        type="color"
                        value="<?= isset($equipe) ? $equipe->getCor1() : ''; ?>">

                </div>

                <div class="form-control">
                    <?php if (isset($erros['cor2'])): ?>

                        <label for="inpCor2" class="invalid"><?= $erros['cor2'] ?></label>

                    <?php else: ?>

                        <label for="inpCor2">Cor 2 da equipe</label>

                    <?php endif; ?>
                    <input
                        class="inp"
                        id="inpCor2"
                        name="cor2"
                        type="color"
                        value="<?= isset($equipe) ? $equipe->getCor2() : ''; ?>">

                </div>

                <div class="form-control">
                    <?php if (isset($erros['categoria'])): ?>

                        <label for="selCategoria" class="invalid"><?= $erros['categoria'] ?></label>

                    <?php else: ?>

                        <label for="selCategoria">Categoria da equipe</label>

                    <?php endif; ?>
                    <select name="categoria" id="selCategoria" class="sel">
                        <option value="">Escolha uma categoria</option>
                        <?php foreach ($categoria as $c): ?>

                            <option value="<?= $c->getId(); ?>"

                                <?= isset($equipe) && $equipe->getCategoria() &&
                                    $equipe->getCategoria()->getId() === $c->getId() ? 'selected' : ''; ?>>
                                <?= $c->getNome(); ?>
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
require_once App::URL_INCLUDE . "template/app_footer.php";
?>