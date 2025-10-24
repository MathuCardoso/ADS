<?php

class AlunoService {
    public function validate(Aluno $aluno) {
        $erros = [];

        if(!$aluno->getNome()) {
            $erros['nome'] = "Preencha este campo.";
        }
        if(!$aluno->getIdade()) {
            $erros['idade'] = "Preencha este campo.";
        }
        if(!$aluno->getEstrangeiro()) {
            $erros['estrangeiro'] = "Preencha este campo";
        }
        if(!$aluno->getCurso()) {
            $erros['curso'] = "Preencha este campo.";
        }

        return $erros;
    }
}