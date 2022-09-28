<?php

    require 'usuario_service.php';
    require 'usuario.php';
    require 'conexao.php';

    
    if($_GET['tratamento'] == 'login')
    {
        $conexao = new Conexao();
        $usuario = new Usuario();
        $usuario->__set('email',$_POST['email'])->__set('senha',$_POST['senha']);

        $usuario_service = new UsuarioService($conexao,$usuario);
        if($usuario_service->verificaLogin()){
            $_SESSION['autenticacao'] = true;
            $_SESSION['email'] = $usuario->__get('email');
            header('Location:home.php');
        }else{
            header('Location:index.php?login=ERROR');
            $_SESSION['autenticacao'] = false;
        }
    }

    if($_GET['tratamento'] == 'registrar')
    {
        if($_POST['senha'] != $_POST['confirmSenha'])
        {
            header('Location:registrar.php?registrar=errorSenha');
        }else{
            $conexao = new Conexao();
            $usuario = new Usuario();
            $usuario->__set('email',$_POST['email'])->__set('senha',$_POST['senha'])->__set('nome',$_POST['nome'])->__set('sobreNome',$_POST['Sobrenome']);

            $usuario_service = new UsuarioService($conexao,$usuario);
            $usuario_service->registrarConta();
        }
        



    }
    if($_GET['tratamento'] == 'sair')
    {
        session_destroy();
        header('Location:index.php');

    }
    if($_GET['tratamento'] == 'getHist')
    {
        $conexao = new Conexao();
        $usuario = new Usuario();
        $usuario->__set('tempo',$_POST['temp'])->__set('email', $_SESSION['email']);

        $usuario_service = new UsuarioService($conexao,$usuario);
        $usuario_service->setHist();

    }

?>