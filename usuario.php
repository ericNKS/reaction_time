<?php

    class Usuario
    {
        private $id;
        private $nome;
        private $email;
        private $senha;

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