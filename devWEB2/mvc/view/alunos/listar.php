<?php
include_once __DIR__ . "/../../controller/AlunoController.php";
///////////////////////////////////////////////////////////////

$ac = new AlunoController();
$alunos = $ac->listar();

//////////////////////////////////////////////////////////////
include_once __DIR__ . "/../../include/head.php";
include_once __DIR__ . "/../../include/menu.php"
?>


<h2>Listagem de Alunos</h2>


<div class="">

    <div class="insert-btn">
        <a href="inserir.php">Inserir</a>
    </div>

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Estrangeiro</th>
            <th>Curso</th>
            <th class="info">EDITAR</th>
            <th class="danger">EXCLUIR</th>
        </tr>


        <?php
        foreach ($alunos as $a):
        ?>

            <tr>
                <td><?= $a->getId() ?></td>
                <td><?= $a->getNome() ?></td>
                <td><?= $a->getIdade() ?></td>
                <td><?= $a->getEstrangeiroDesc() ?></td>
                <td><?= $a->getCurso()->getNomeTurno() ?></td>
                <td>
                    <a class="btn btn-info" href="./editar.php?idAluno=<?= $a->getId(); ?>">EDITAR</a>
                </td>
                <td>
                    <a class="btn btn-danger" onclick="return confirm('Confirma a exclusão do usuário?')" ;
                        href="<?= "./excluir.php?idAluno=" . $a->getId(); ?>">EXCLUIR</a>
                </td>
            </tr>

        <?php
        endforeach;
        ?>


    </table>
</div>

<?php
include_once __DIR__ . "/../../include/footer.php";
?>