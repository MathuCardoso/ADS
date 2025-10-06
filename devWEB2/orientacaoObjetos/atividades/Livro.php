<?php
class Livro {
    private string $titulo;
    private string $autor;
    private string $genero;
    private int $qtdPaginas;

    public function __construct() {
        $this->titulo = "";
        $this->autor = "";
        $this->genero = "";
        $this->qtdPaginas = 0;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of autor
     */ 
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     *
     * @return  self
     */ 
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of genero
     */ 
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */ 
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of qtdPaginas
     */ 
    public function getQtdPaginas()
    {
        return $this->qtdPaginas;
    }

    /**
     * Set the value of qtdPaginas
     *
     * @return  self
     */ 
    public function setQtdPaginas($qtdPaginas)
    {
        $this->qtdPaginas = $qtdPaginas;

        return $this;
    }
}
