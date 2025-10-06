<?php
function validate($dados): array
{
    $erros = [];

    if (!$dados['nome']) {
        $erros['nome'] = "Preencha este campo";
    } elseif (strlen($dados['nome']) < 3) {
        $erros['nome'] = "Precisa conter mais que 3 letras";
    }
    if (!$dados['piloto1']) {
        $erros['p1'] = "Preencha este campo!";
    } elseif (strlen($dados['piloto1']) < 3) {
        $erros['p1'] = "Precisa conter mais que 3 letras";
    }
    if (!$dados['piloto2']) {
        $erros['p2'] = "Preencha este campo!";
    } elseif (strlen($dados['piloto2']) < 3) {
        $erros['p2'] = "Precisa conter mais que 3 letras";
    }
    if (!$dados['motor']) {
        $erros['motor'] = "Escolha o motor!";
    }
    if ($dados['logo']['size'] <= 0) {
        $erros['logo'] = "Escolha uma logo!";
    }
    if ($dados['carro']['size'] <= 0) {
        $erros['carro'] = "Escolha um carro!";
    }

    return $erros;
}
