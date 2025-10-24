<?php
include_once __DIR__ . "/../../include/head.php";

$cc = new CursoController();
$cursos = $cc->getCursos();
?>

<div class="container">

    <form method="POST" action="">

        <h2>Inserir aluno</h2>

        <div class="form-control">
            <?php
            if (isset($erros) && isset($erros['nome'])) {
                echo "<label class='invalid'>{$erros['nome']}</label>";
            } else {
                echo "<label for='txtNome'>Nome:</label>";
            }
            ?>
            <input type="text" id="txtNome" name="nome" value="<?= isset($aluno) ? $aluno->getNome() : ''; ?>"
                placeholder="Informe o nome">
        </div>

        <div class="form-control">
            <?php
            if (isset($erros) && isset($erros['idade'])) {
                echo "<label class='invalid'>{$erros['idade']}</label>";
            } else {
                echo "<label for='txtIdade'>Idade:</label>";
            }
            ?> <input type="number" id="txtIdade" name="idade" value="<?= isset($aluno) ? $aluno->getIdade() : ''; ?>"
                placeholder="Informe a idade">
        </div>

        <div class="form-control">
            <?php
            if (isset($erros) && isset($erros['estrangeiro'])) {
                echo "<label class='invalid'>{$erros['estrangeiro']}</label>";
            } else {
                echo "<label for='selEstrangeiro'>Estrangeiro:</label>";
            }
            ?>
            <select name="estrangeiro" id="selEstrang">
                <option value="">----Selecione----</option>
                <option value="S" <?= isset($aluno) && $aluno->getEstrangeiro() == "S" ? 'SELECTED' : ''; ?>>Sim</option>
                <option value="N" <?= isset($aluno) && $aluno->getEstrangeiro() == "N" ? 'SELECTED' : ''; ?>>Não</option>
            </select>
        </div>

        <div class="form-control">
            <?php
            if (isset($erros) && isset($erros['curso'])) {
                echo "<label class='invalid'>{$erros['curso']}</label>";
            } else {
                echo "<label for='selCurso'>Curso:</label>";
            }
            ?>
            <select name="curso" id="selCurso">
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

        <div class="form-btns">
            <button type="submit"
                class="btn">Gravar
            </button>
            <a href="listar.php">Voltar</a>
        </div>

        <input type="text" name="_submit" value="1" hidden>
        <input type="number" name="idAluno" value="<?= $aluno ? $aluno->getId() : 0 ?>" hidden>

    </form>

</div>

<?php
include_once __DIR__ . "/../../include/footer.php";
?>