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
        <form action="usuario_controller.php?tratamento=registrar" method="post" required="required">
            <div class="divForm">
                <h3>Registrar</h3>
                <label for="nome">Nome:
                    <input type="text" name="nome" id="v" placeholder="Eric" required="required">
                </label>
                <label for="Sobrenome">Sobrenome:
                    <input type="text" name="Sobrenome" id="Sobrenome" placeholder="Santos" required="required">
                </label>
                <label for="email">Email:
                    <input type="text" name="email" id="email" placeholder="exemple@exemplo.com" required="required">
                </label>
                <label for="senha">Senha:
                    <input type="password" name="senha" id="senha" placeholder="*********" required="required">
                </label>
                <label for="confirmSenha">Confirmar senha:
                    <input type="password" name="confirmSenha" id="confirmSenha" placeholder="*********" required="required">
                </label>
                <?php if(isset($_GET['registrar']) && $_GET['registrar'] == 'errorSenha'){?>
                    <p style="color: red; font-weight: bold;">Senhas diferentes</p>
                <?php } ?>
                <?php if(isset($_GET['registrar']) && $_GET['registrar'] == 'existente'){?>
                    <p style="color: red; font-weight: bold;">Email ja cadastrado</p>
                <?php } ?>
                <input type="submit" value="Entrar">
            </div>
        </form>
    </div>

</body>
</html>