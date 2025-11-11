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

    public function saveFile(array $file, Categoria $cat)
    {

        $fileArray = explode(".", $file['name']);
        $fileExtension = ".{$fileArray[1]}";
        $fileNameToSave = $cat->getNome() . uniqid() . $fileExtension;
        $fileNameToSave = str_replace(" ", "", $fileNameToSave);

        if (move_uploaded_file($file['tmp_name'], App::URL_UPLOADS . "categorias/{$fileNameToSave}")) {
            return $fileNameToSave;
        } else {
            throw new RuntimeException("Não foi possível salvar o arquivo.");
        }
    }
}
