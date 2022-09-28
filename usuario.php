<?php

    class Usuario
    {
        private $id;
        private $nome;
        private $sobreNome;
        private $email;
        private $senha;
        private $tempo;
        
        public function __get($attr)
        {
            return $this->$attr;
        }

        public function __set($attr, $value)
        {
            $this->$attr = $value;
            return $this;
        }

    }

?>