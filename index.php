<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Reflex time</title>
</head>
<body>
    
    <div class="container" style="height: 100vh;">
        <form action="usuario_controller.php?tratamento=login" method="post">
            <div class="divForm">
                <h3>Login</h3>
                <label for="email">Email:
                    <input type="text" name="email" id="email" placeholder="exemple@exemplo.com">
                </label>
                <label for="senha">Senha:
                    <input type="password" name="senha" id="senha" placeholder="*********">
                </label>
                <?php if(isset($_GET['login']) && $_GET['login'] == 'ERROR'){?>
                    <p style="color: red; font-weight: bold;">Usuário ou senha inválida</p>
                <?php } ?>
                <?php if(isset($_GET['entrada']) && $_GET['entrada'] == 'forcado'){?>
                    <p style="color: red; font-weight: bold;">Você precisa estar logado antes de usar o site</p>
                <?php } ?>
                <input type="submit" value="Entrar">
            </div>
        </form>
    </div>

</body>
</html>