<?php

    require '../conexao.php';

    $id = $id;
    $sql= "SELECT * FROM usuarios WHERE idusuario =$id";
    $query =$conexao->query($sql);

    while($dados= $query->fetch_array()){

        $nome_usuario =$dados['nome_usuario'];
        $tipo_usuario =$dados['tipo_usuario'];
    
        $senha = $dados['senha'];
    }

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <form action="edusuario.php?idusuario=<?php echo $id; ?>" method="POST">
        <div class="form-group">

            <label>Nome do usuario</label>
            <input type="text" class="form-control" name="nome_usuario" value="<?php echo $nome_usuario;?>" required />
            <br />

            <label>Tipo</label>
            <input type="tex" class="form-control" name="tipo_usuario" value="<?php echo ucfirst($tipo_usuario); ?>"
                required readonly />
            <br />

            <label>Senha</label>
            <input type="text" class="form-control" name="senha" value="<?php echo $senha;?> " required />
            <br />

            <button type="submit" class="btn btn-outline-dark">Atualizar</button>

        </div>
    </form>
</body>

</html>