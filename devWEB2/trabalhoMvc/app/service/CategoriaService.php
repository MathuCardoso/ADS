<?php

namespace App\service;

use App;
use App\model\Categoria;
use RuntimeException;

class CategoriaService
{

    public function validate(Categoria $c)
    {
        $erros = [];
        if (!$c->getNome()) {
            $erros['nome'] = "Preencha este campo.";
        }

        if (!$c->getMaxPilotos()) {
            $erros['maxPilotos'] = "Preencha este campo.";
        }

        if (!$c->getMaxEquipes()) {
            $erros['maxEquipes'] = "Preencha este campo.";
        }

        if ($c->getLogo()['size'] <= 0) {
            $erros['logo'] = "Escollha uma logo.";
        }


        return $erros;
    }


}
