<?php

class Curso
{
    private ?int $id;
    private ?string $nome;
    private ?string $turno;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getNome()
    {
        return $this->nome;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }


    public function getTurno()
    {
        return $this->turno;
    }


    public function setTurno($turno)
    {
        $this->turno = $turno;

        return $this;
    }

    public function getTurnoDesc()
    {
        if ($this->getTurno() == "N")
            return "Noturno";
        else if ($this->getTurno() == "V")
            return "Verspertino";
        else if ($this->getTurno() == "M")
            return "Matutino";
        else
            return "";
    }

    public function getNomeTurno() {
        return $this->getNome() . " - " .$this->getTurnoDesc();
    }
}
