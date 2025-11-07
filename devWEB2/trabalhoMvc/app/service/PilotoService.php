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
        }
        if (!$piloto->getIdade()) {
            $erros['idade'] = "Preencha este campo.";
        }
        if (!$piloto->getNacionalidade()) {
            $erros['nacional'] = "Preencha este campo.";
        }
        if (!$piloto->getEquipe()->getId()) {
            $erros['equipe'] = "Preencha este campo.";
        }

        return $erros;
    }
}
