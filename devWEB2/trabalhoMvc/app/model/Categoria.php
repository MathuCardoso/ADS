<?php

namespace App\model;

class Categoria
{

    private ?int $id;
    private ?string $nome;
    private array|string|null $logo;
    private ?int $maxPilotos;
    private ?int $maxEquipes;

    public function __construct()
    {
        $this->id = null;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of logo
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set the value of logo
     *
     * @return  self
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get the value of maxPilotos
     */
    public function getMaxPilotos()
    {
        return $this->maxPilotos;
    }

    /**
     * Set the value of maxPilotos
     *
     * @return  self
     */
    public function setMaxPilotos($maxPilotos)
    {
        $this->maxPilotos = $maxPilotos;

        return $this;
    }

    /**
     * Get the value of maxEquipes
     */
    public function getMaxEquipes()
    {
        return $this->maxEquipes;
    }

    /**
     * Set the value of maxEquipes
     *
     * @return  self
     */
    public function setMaxEquipes($maxEquipes)
    {
        $this->maxEquipes = $maxEquipes;

        return $this;
    }
}
