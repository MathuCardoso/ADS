<?php


$erros = [];
$inicio = isset($_GET['inicio']) ? $_GET['inicio'] : '';
$razao = isset($_GET['razao']) ? $_GET['razao'] : '';
$qtd = isset($_GET['qtd']) ? $_GET['qtd'] : '';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROG ARIT GET & POST</title>
</head>

<body>

    <form action="" method="GET">
        <label for="inicio">Informe o início da P.A.</label>
        <br>
        <input type="number" name="inicio" id="inicio" value="<?= $inicio ?>">

        <br><br>

        <label for="razao">Informe a razão da P.A.</label>
        <br>
        <input type="number" name="razao" id="razao" value="<?= $razao ?>">

        <br><br>

        <label for="qtd">Informe a quantidade de termos da P.A.</label>
        <br>
        <input type="number" name="qtd" id="qtd" value="<?= $qtd ?>">
        <br>
        <button type="submit">ENVIAR</button>
    </form>

    <?php
    if (isset($inicio, $razao, $qtd)) {
        for ($i = 1; $i <= $qtd; $i++, $inicio = $inicio + $razao) {
            $n = $inicio;
            print($n . "<br>");
        }
    } else {
        if (isset($_GET['inicio']) && $_GET['inicio'] == null)
            array_push($erros, 'INÍCIO não informado');
        if (isset($_GET['razao']) && $_GET['razao'] == null)
            array_push($erros, 'RAZÃO não informada');
        if (isset($_GET['qtd']) && $_GET['qtd'] == null)
            array_push($erros, 'QUANTIDADE não informado');
        else if ($_GET['qtd'] <= 0)
            array_push($erros, 'QUANTIDADE precisa ser maior do que 0!');
    }

    if (!empty($erros)) {
        foreach ($erros as $e) {
            echo $e;
            echo "<br>";
        }
    }
    ?>

</body>

</html>