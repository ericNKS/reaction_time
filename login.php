<?php
    session_start();
    require 'conexao.php';

    $conexao = new Conexao();
    $connection = $conexao->conectar();


    $query = '
        select * from tb_usuarios
    ';
    $stmt = $connection->query($query);

    $usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);


    $usuario_autenticado = null;
    /*
    $usuarios = array(
        ['email'=>'adm@teste.com', 'senha'=>'123'],
        ['email'=>'user@teste.com', 'senha'=>'123']

    );*/
    foreach($usuarios as $user){
        if($_POST['senha'] == $user->senha && $_POST['email'] == $user->email){
            echo 'chegamo';
            $usuario_autenticado = true;
            break;
        }else{
            $usuario_autenticado = false;
        }
    }
    if($usuario_autenticado){
        $_SESSION['autenticacao'] = $usuario_autenticado;
        header('Location:home.php');
    }else{
        $_SESSION['autenticacao'] = $usuario_autenticado;
        header('Location: index.php?login=ERROR');
    }

?>