<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleLogin.css">
    <link rel="icon" type="image/x-icon" href="assets/icone.png" />
    <title>Login de Administradores</title>
</head>
<body>

    <div class="page">

        <?php
            session_start();
            if (isset($_SESSION['recusa'])) {
                echo "<h1>Login ou Senha Inválidos</h1>";
            }
            unset($_SESSION['recusa']);
        
        ?>

        <div class="container">
            <div class="left">
                <div class="login">
                    Black Free <span style="color: rgb(175, 41, 41);";>Admin's</span>
                </div>
                <div class="eula">
                    Área exclusiva para <span style="color: rgb(175, 41, 41);";>administradores</span> acessarem os <span style="color: rgb(175, 41, 41);";>Formulários Enviados.</span>
                </div>
            </div>

            <form action="processaLogin.php" method="post">
                <div class="right">
                    <div class="form">
                        <label for="email">Usuário</label>
                        <input type="text" name="username" id="email" autocomplete="off">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password">

                        <div class="botao">
                            <a href="relatorio.html"><button type="submit" name="btn">LOGIN</button></a>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>

</body>
</html>