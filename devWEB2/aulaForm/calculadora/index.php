<?php

$erros = [];

if (isset($_POST['submited'])) {
    $val1 = isset($_POST['val1']) ? $_POST['val1'] : '';
    $val2 = isset($_POST['val2']) ? $_POST['val2'] : '';
    $oper = isset($_POST['oper']) ? $_POST['oper'] : '';

    $val1 == NULL ? array_push($erros, "O valor 1 precisa ser informado!") : '';
    $val2 == NULL ? array_push($erros, "O valor 2 precisa ser informado!") : '';
    $oper == NULL ? array_push($erros, "É preciso escolher um operador matemático!") : '';

    if (empty($erros)) {
        if ($oper == "+") {
            $result = $val1 + $val2;
        } else if ($oper == "-") {
            $result = $val1 - $val2;
        } else if ($oper == "*") {
            $result = $val1 * $val2;
        } else if ($oper == "/") {
            $result = $val1 / $val2;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>

<body>

    <form action="" method="POST">

        <label for="val1">Valor 1</label>
        <br>
        <input step="any" type="number" name="val1" id="val1" value="<?= $val1 ?>" placeholder="Escolha o primeiro valor">
        <br><br>

        <label for="val2">Valor 2</label>
        <br>
        <input step="any" type="number" name="val2" id="val2" value="<?= $val2 ?>" placeholder="Escolha o segundo valor">
        <br><br>

        <label for="oper">Operador Matemático</label>
        <br>
        <select name="oper" id="oper">
            <option value="" selected>---ESCOLHA---</option>

            <option value="+" <?= (isset($oper) && $oper == "+") ? "selected" : '';  ?>>ADIÇÃO</option>

            <option value="-" <?= (isset($oper) && $oper == "-") ? "selected" : '';  ?>>SUBTRAÇÃO</option>


            <option value="*" <?= (isset($oper) && $oper == "*") ? "selected" : '';  ?>>MULTIPLICAÇÃO</option>


            <option value="/" <?= (isset($oper) && $oper == "/") ? "selected" : '';  ?>>DIVISÃO</option>
        </select>
        <br><br>


        <input type="text" name="submited" value="1" hidden>
        <button type="submit">CALCULAR</button>

    </form>

    <?php
    if (isset($result)) {
        echo "Resultado da conta: " . number_format($result, 2);
    }
    ?>

    <?php if (!empty($erros)): ?>

        <div style="color: red; font-weight: bold;">

            <?php
            foreach ($erros as $e) {
                echo "<span>" . $e . "</span><br>";
            }
            ?>

        </div>

    <?php endif;  ?>

</body>

</html>