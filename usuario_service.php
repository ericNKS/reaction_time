<?php
    session_start();
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
            $query = '
                select
                    *
                from
                    tb_usuarios
                where
                    :email = email and :senha = senha
            ';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':email', $this->usuario->__get('email'));
            $stmt->bindValue(':senha', $this->usuario->__get('senha'));
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_OBJ);
            if($usuario){
                $_SESSION['id_user'] = $usuario->id;
            }
            return $usuario;
            
        }

        public function registrarConta()
        {
            $query = '
                SELECT 
                    *
                FROM
                    tb_usuarios
                WHERE
                    email = :email
            ';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':email', $this->usuario->__get('email'));
            $stmt->execute();
            $usuarioExistente = $stmt->fetch(PDO::FETCH_OBJ);

            if(!$usuarioExistente){
                $query = '
                INSERT INTO 
                    tb_usuarios(nome,sobrenome,email,senha)
                VALUES(:nome, :sobrenome, :email, :senha)
            ';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->usuario->__get('nome'));
            $stmt->bindValue(':sobrenome', $this->usuario->__get('sobreNome'));
            $stmt->bindValue(':email', $this->usuario->__get('email'));
            $stmt->bindValue(':senha', $this->usuario->__get('senha'));
            $stmt->execute();
            header('Location:index.php');
            }else{
                header('Location:registrar.php?registrar=existente');
            }

        }
        public function setHist()
        {
            $query = '
                INSERT INTO 
                    tb_pontos(id_usuario, pontos)
                VALUES
                    (:id_user, :pontos)
            ';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':email_logado', $this->usuario->__get('email'));
            $stmt->bindValue(':id_user', $_SESSION['id_user']);
            $stmt->execute();
            $historico = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $historico;
        }

    }

?>