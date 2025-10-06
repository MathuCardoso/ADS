<?php
include_once '../service/validate.php';
include_once '../controller/persistencia.php';

$equipes = buscarDados(DIR_ARQUIVO . "equipes.json");
$motores = buscarDados(DIR_ARQUIVO . "motores.json");
if (isset($_POST['submit'])) {
    $nome = trim($_POST['nome'] ?? '');
    $piloto1 = trim($_POST['piloto1'] ?? '');
    $piloto2 = trim($_POST['piloto2'] ?? '');
    $motor = trim($_POST['motor'] ?? '');
    $cor = trim($_POST['cor'] ?? '');
    $logo = $_FILES['logo'] ?? NULL;
    $carro = $_FILES['carro'] ?? NULL;

    $dados = [
        "nome" => $nome,
        "piloto1" => $piloto1,
        "piloto2" => $piloto2,
        "motor" => $motor,
        "cor" => $cor,
        "logo" => $logo,
        "carro" => $carro
    ];

    $erros = validate($dados);


    if (empty($erros)) {

        $logo = salvarArquivo($nome, $logo, "Logo");
        $carro = salvarArquivo($nome, $carro, "Carro");

        $equipe = [
            "id" => uniqid(),
            "nome" => $nome,
            "piloto1" => $piloto1,
            "piloto2" => $piloto2,
            "motor" => $motor,
            "cor" => $cor,
            "logo" => $logo,
            "carro" => $carro

        ];

        array_push($equipes, $equipe);
        salvarDados($equipes, "equipes.json");
    }
}



?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F1</title>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/cadastro.css">
    <link rel="shortcut icon" href="../assets/f1-logo.png" type="image/x-icon">
</head>

<body>

    <div class="container">

        <?php include_once "../components/header.php" ?>

        <section class="sectionForm">
            <div class="form">
                <form method="POST" enctype="multipart/form-data">
                    <h1>Cadastro de Equipes</h1>

                    <div class="form-control">
                        <?= isset($erros['nome']) && $erros['nome'] ?

                            "<label for='nome' class='invalid'>" .
                            $erros['nome'] : "Nome da equipe";
                        ?>
                        </label>
                        <input
                            <?= isset($erros['nome']) && $erros['nome'] ?
                                "class='error'" : '';
                            ?>
                            value="<?= isset($nome) && $nome ? $nome : '' ?>"
                            name="nome" id="nome" type="text" placeholder="Informe o nome da equipe" />
                    </div>

                    <div class="pilotos">

                        <div class="form-control">
                            <?= isset($erros['p1']) && $erros['p1'] ?

                                "<label for='piloto1' class='invalid'>" .
                                $erros['p1'] : "1º Piloto";
                            ?>
                            </label>
                            <input
                                <?= isset($erros['p1']) && $erros['p1'] ?
                                    "class='error'" : '';
                                ?>
                                value="<?= isset($piloto1) && $piloto1 ? $piloto1 : '' ?>"
                                name="piloto1" id="piloto1" type="text" placeholder="Informe o 1º Piloto" />
                        </div>

                        <div class="form-control">
                            <?= isset($erros['p2']) && $erros['p2'] ?

                                "<label for='piloto2' class='invalid'>" .
                                $erros['p2'] : "2º Piloto";
                            ?>
                            </label>
                            <input
                                <?= isset($erros['p2']) && $erros['p2'] ?
                                    "class='error'" : '';
                                ?>
                                value="<?= isset($piloto2) && $piloto2 ? $piloto2 : '' ?>"
                                name="piloto2" id="piloto2" type="text" placeholder="Informe o 2º Piloto" />
                        </div>
                    </div>

                    <div class="motor-cor">
                        <div class="form-control">
                            <?= isset($erros['motor']) && $erros['motor'] ?

                                "<label for='motor' class='invalid'>" .
                                $erros['motor'] : "Motor";
                            ?>
                            </label>
                            <select
                                <?= isset($erros['motor']) && $erros['motor'] ?
                                    "class='error'" : '';
                                ?>
                                name="motor"
                                id="motor">
                                <option value="">--SELECIONE--</option>
                                <?php foreach ($motores as $m): ?>
                                    <option
                                        <?= (isset($motor) && $motor) && $motor == $m
                                            ? "selected" : '' ?>
                                        value="<?= $m ?>"><?= $m ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-control">

                            <?= isset($erros['cor']) && $erros['cor'] ?

                                "<label for='cor' class='invalid'>{$erros['cor']}</label"
                                : "<label for='cor'>Cor da equipe</label";
                            ?>
                            </label>
                            <input
                                <?= isset($erros['cor']) && $erros['cor'] ?
                                    "class='error'" : '';
                                ?> name="cor" value="<?= isset($cor) && $cor ? $cor : '' ?>"
                                id="cor" type="color" placeholder="Informe a cor principal da equipe">
                        </div>
                    </div>


                    <div class="form-control logo-carro">
                        <div class="form-control">
                            <?= isset($erros['logo']) && $erros['logo'] ?

                                "<label for='logo' class='invalid'>{$erros['logo']}</label"
                                : "<label for='logo'>Logo da equipe</label";
                            ?>
                            </label>
                            <input
                                <?= isset($erros['logo']) && $erros['logo'] ?
                                    "class='error'" : '';
                                ?>
                                value="<?= isset($logo) && $logo ? $logo["tmp_name"] : '' ?>"
                                name="logo"
                                id="logoInp" type="file" placeholder="Informe a logo da equipe" accept="image/*" hidden>
                            <div class="logo-preview">
                                <img id="imgLogo" src="" alt="Logo da equipe">
                            </div>
                            <button type="button" onclick="return logoPreview();" class="logo-select">Selecionar logo</button>
                        </div>


                        <div class="form-control">
                            <?= isset($erros['carro']) && $erros['carro'] ?

                                "<label for='carro' class='invalid'>{$erros['carro']}</label"
                                : "<label for='carro'>Carro da equipe</label";
                            ?>
                            </label>
                            <input
                                <?= isset($erros['carro']) && $erros['carro'] ?
                                    "class='error'" : '';
                                ?> name="carro"
                                id="carroFile" type="file" placeholder="Envie uma foto do carro" accept="image/*,.avif" hidden>
                            <div class="carro-preview">
                                <img id="imgCarro" src="" alt="Carro da equipe">
                            </div>
                            <button type="button" onclick="return carroPreview();" class="carro-select">Selecionar carro</button>
                        </div>
                    </div>
                    <input type="text" name="submit" value="1" hidden>


                    <button class="btn-submit" type="submit" value="Enviar">CADASTRAR</button>
                </form>
            </div>
        </section>
    </div>

    <script src="../js/script.js"></script>
</body>

</html>