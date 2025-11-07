<?php
include_once __DIR__ . "/../../include/head.php";
include_once __DIR__ . "/../../include/menu.php";

$cc = new CursoController();
$cursos = $cc->getCursos();
?>


<form method="POST" action="" class="col-6">

    <h2>Inserir aluno</h2>

    <div class="mb-3">
        <?php
        if (isset($erros) && isset($erros['nome'])) {
            echo "<label class='text-danger form-label'>{$erros['nome']}</label>";
        } else {
            echo "<label class='form-label' for='txtNome'>Nome:</label>";
        }
        ?>
        <input
            class="form-control"
            type="text"
            id="txtNome"
            name="nome"
            value="<?= isset($aluno) ? $aluno->getNome() : ''; ?>"
            placeholder="Informe o nome">
    </div>

    <div class="mb-3">
        <?php
        if (isset($erros) && isset($erros['idade'])) {
            echo "<label class='text-danger form-label'>{$erros['idade']}</label>";
        } else {
            echo "<label class='form-label' for='txtIdade'>Idade:</label>";
        }
        ?> <input
            class="form-control"
            type="number"
            id="txtIdade"
            name="idade"
            value="<?= isset($aluno) ? $aluno->getIdade() : ''; ?>"
            placeholder="Informe a idade">
    </div>

    <div class="mb-3">
        <?php
        if (isset($erros) && isset($erros['estrangeiro'])) {
            echo "<label class='text-danger form-label'>{$erros['estrangeiro']}</label>";
        } else {
            echo "<label class='form-label' for='selEstrangeiro'>Estrangeiro:</label>";
        }
        ?>
        <select
            class="form-select"
            name="estrangeiro"
            id="selEstrang">
            <option value="">----Selecione----</option>
            <option value="S" <?= isset($aluno) && $aluno->getEstrangeiro() == "S" ? 'SELECTED' : ''; ?>>Sim</option>
            <option value="N" <?= isset($aluno) && $aluno->getEstrangeiro() == "N" ? 'SELECTED' : ''; ?>>Não</option>
        </select>
    </div>

    <div class="mb-3">
        <?php
        if (isset($erros) && isset($erros['curso'])) {
            echo "<label class='text-danger form-label'>{$erros['curso']}</label>";
        } else {
            echo "<label class='form-label' for='selCurso'>Curso:</label>";
        }
        ?>
        <select
            class="form-select"
            name="curso"
            id="selCurso">
            <option value="">----Selecione----</option>

            <?php
            foreach ($cursos as $c):
            ?>

                <option value="<?= $c->getId(); ?>" <?= (isset($aluno) && $aluno->getCurso())
                                                        && $aluno->getCurso()->getId() == $c->getId() ? 'SELECTED' : ''; ?>>

                    <?= $c->getNomeTurno(); ?>
                </option>

            <?php
            endforeach;
            ?>

        </select>
    </div>

    <div class="form-btns d-flex gap-3">
        <button type="submit"
            class="btn btn-success">Gravar
        </button>
        <a
            class="btn btn-primary"
            href="listar.php">Voltar</a>
    </div>

    <input type="text" name="_submit" value="1" hidden>
    <input type="number" name="idAluno" value="<?= $aluno ? $aluno->getId() : 0 ?>" hidden>

</form>

<?php
include_once __DIR__ . "/../../include/footer.php";
?>