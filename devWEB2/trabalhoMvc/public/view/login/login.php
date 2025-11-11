<?php

$viewController
    ->setLinks([
        "css/equipe.css",
        "css/form.css",
        "css/list.css"
    ])
    ->setOutsideLink('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">')
    ->setTitle("Form");

require_once App::URL_INCLUDE . "template/app_head.php";
?>


<div class="row mt-5">
    <h3 class="col-12">Informe suas credenciais para acessar o sistema</h3>
</div>

<div class="row">
    <div class="col-6 alert alert-info">
        <form name="frmLogin" method="POST">

            <div>
                <label class="form-label" for="txtLogin">Login:</label>
                <input class="form-control" type="text" id="txtLogin" name="login"
                    maxlength="15" />
            </div>

            <div>
                <label class="form-label" for="txtSenha">Senha:</label>
                <input class="form-control" type="password" id="txtSenha" name="senha"
                    maxlength="15" />
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Logar</button>
            </div>
        </form>
    </div>

    <div class="col-6">
        <?php if ($erros): ?>
            <div id="msgErro" class="alert alert-danger"><?= $msgErro ?></div>
        <?php endif; ?>
    </div>
</div>

<?php
require_once App::URL_INCLUDE . "template/app_footer.php";
?>