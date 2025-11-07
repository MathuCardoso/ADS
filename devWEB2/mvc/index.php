<?php
include_once __DIR__ . "/include/head.php";
include_once __DIR__ . "/include/menu.php";
?>

<div class="row mt-3 justify-content-center">
    <div class="col-md-3 col-sm-6">
        <div class="card text-center">
            <img class="card-image-top mx-auto"
                src="img/card_alunos.png"
                style="width: 100%; height: auto;" />
            <div class="card-body">
                <h5 class="card-title">Alunos</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="<?= APP_URL ?>/view/alunos/listar.php" class="card-link">
                        Listagem de Alunos</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php
include_once __DIR__ . "/include/footer.php";
?>