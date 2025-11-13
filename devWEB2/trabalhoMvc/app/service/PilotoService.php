<?php

namespace App\service;

use App\model\Piloto;

class PilotoService
{

    public function validate(Piloto $piloto)
    {
        $erros = [];

        if (!$piloto->getNome()) {
            $erros['nome'] = "Preencha este campo.";
        } else if (!str_contains($piloto->getNome(), " ")) {
            $erros['nome'] = "Preencha o sobrenome.";
        }
        if (!$piloto->getIdade()) {
            $erros['idade'] = "Preencha este campo.";
        } else if (!is_int($piloto->getIdade())) {
            $erros['idade'] = "Digite um número!";
        } else if ($piloto->getIdade() >= 70) {
            $erros['idade'] = "Idoso.";
        }
        if (!$piloto->getNacionalidade()) {
            $erros['nacional'] = "Preencha este campo.";
        }
        if (!$piloto->getNumero()) {
            $erros['numero'] = "Preencha este campo.";
        }
        if (!$piloto->getEquipe()->getId()) {
            $erros['equipe'] = "Preencha este campo.";
        }

        return $erros;
    }
}
