<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel=icon href='dente.png' sizes="50x50" type="image/png">

</head>

<body>

    <div class="cotainer-login">

        <div class="img-box">
            <img src="IMG/logosistema.png" style="width: 350px;" alt="Imagem Login">
        </div>

        <div class="content-box">

            <form action="verificacao_login.php" method="post">

                <section class="box">

                    <h3 class="mb-5">Login Usuário</h3>

                    <br>

                    <div class="form-group">
                        <input type="text" id="typeUsernameX-2" class="form-control" name="nome_usuario" required>
                        <label class="form-label" for="typeUsernameX-2">Nome Usuário</label>
                    </div>

                    <div class="form-group">
                        <input type="password" id="typePasswordX-2" class="form-control" name="senha" required>
                        <label class="form-label" for="typePasswordX-2">Senha Usuário</label>
                    </div>

                    <br>

                    <button id="login" class="btn btn btn-lg btn-block" style="background-color: Darkgoldenrod; color:white" type="submit">Login</button>

                </section>

            </form>

        </div>

    </div>

</body>

</html>