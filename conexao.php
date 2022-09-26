<?php

    class Conexao
    {
        private $DSN = 'mysql:host=localhost;dbname=testerapido';
        private $DSN_usuario = 'root';
        private $DSN_senha = '';

        public function conectar()
        {
            try{
                $conexao = new PDO($this->DSN,$this->DSN_usuario,$this->DSN_senha);
                return $conexao;
                
            }catch(PDOException $e){
                print_r($e);
            }
        }
    }

?>