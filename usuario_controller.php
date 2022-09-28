<?php

    require 'usuario_service.php';
    require 'usuario.php';
    require 'conexao.php';


    $tratamento = isset($_GET['tratamento']) ? $_GET['tratamento'] : $tratamento;

    if($tratamento == 'login')
    {
        $conexao = new Conexao();
        $usuario = new Usuario();
        $usuario->__set('email',$_POST['email'])->__set('senha',$_POST['senha']);

        $usuario_service = new UsuarioService($conexao,$usuario);
        if($usuario_service->verificaLogin()){
            $_SESSION['autenticacao'] = true;
            header('Location:home.php');
        }else{
            header('Location:index.php?login=ERROR');
            $_SESSION['autenticacao'] = false;
        }
    }

    if($tratamento == 'registrar')
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
    if($tratamento == 'sair')
    {
        session_destroy();
        header('Location:index.php');

    }

    if($tratamento == 'sethist')
    {
        $conexao = new Conexao();
        $usuario = new Usuario();
        $usuario->__set('tempo',$_GET['temp'])->__set('id', $_SESSION['id_user']);

        $usuario_service = new UsuarioService($conexao,$usuario);
        $usuario_service->setHist();
    }

    if($tratamento == 'gethist')
    {
        $conexao = new Conexao();
        $usuario = new Usuario();
        $usuario->__set('id', $_SESSION['id_user']);

        $usuario_service = new UsuarioService($conexao,$usuario);
        $hist = $usuario_service->getHist();
        echo(json_encode($hist));
        
    }

?>