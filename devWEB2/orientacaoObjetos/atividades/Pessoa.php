<?php
    class Pessoa {
        private string $nome;
        private string $sobrenome;

        public function __construct() {
            $this->nome = "";
            $this->sobrenome = "";
        }

        /**
         * Get the value of sobrenome
         */ 
        public function getSobrenome()
        {
                return $this->sobrenome;
        }

        /**
         * Set the value of sobrenome
         *
         * @return  self
         */ 
        public function setSobrenome($sobrenome)
        {
                $this->sobrenome = $sobrenome;

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

        public function getNomeCompleto() {
            return $this->nome . " " . $this->sobrenome;
        }

    }
