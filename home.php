<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION['autenticacao']) || $_SESSION['autenticacao'] == false){
        header('Location: index.php?entrada=forcado');
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Reaction Time</title>
</head>
<body>
    <nav class="navbar">
        <h2>Seu tempo de resposta</h2>
        <a class="btn" href="usuario_controller.php?tratamento=sair">Sair</a>
    </nav>
    <div class="container">
        <p class="media"></p>
        <p class="conteudo">Click quando o botão estiver <span class="vermelho">VERMELHO</span></p>
        <button id="botao">Começar</button>

        <button class="buttonHist" onclick="media()">Média</button>
        <div class="divHist">
            <?php
                
            ?>
                <ol>
                    <li>

                    </li>
                </ol>
        </div>

    </div>
    
<script src="js/index.js"></script>
<script src="js/dados.js"></script>
</body>
</html>