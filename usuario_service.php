<?php

    class UsuarioService
    {
        private $conexao;
        private $usuario;

        public function __construct(Conexao $conexao, Usuario $usuario)
        {
            $this->conexao = $conexao->conectar();
            $this->usuario = $usuario;
        }

        public function verificaLogin()
        {
            
        }

    }

?>