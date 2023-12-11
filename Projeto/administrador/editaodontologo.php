<?php

    include '../conexao.php';

    $id = $id;
    $sql = "  SELECT * FROM odontologos WHERE idodontologo =$id ";
    $query = $conexao->query($sql);
    while ($dados = $query->fetch_array()) {
        $nome_odontologo = $dados['nome_odontologo'];
        $cpf = $dados['cpf'];
        $email = $dados['email'];
        $telefone = $dados['telefone'];
        $horario_entrada = $dados['horario_entrada'];
        $horario_saida = $dados['horario_saida'];
        $color = $dados['color'];   
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <form action="edodontologo.php?idodontologo=<?php echo $id; ?>" method="POST">
        <label>Nome do Odontológo</label>
        <input type="text" class="form-control" name="nome_odontologo" value="<?php echo $nome_odontologo; ?>" disabled />
        <br />
        <label>Cpf</label>
        <input type="text" class="form-control" name="cpf" value="<?php echo $cpf; ?>" />
        <br />
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $email; ?> " />
        <br />
        <label>Telefone</label>
        <input type="text" class="form-control" name="telefone" value="<?php echo $telefone; ?>" />
        <br />
     
        <label>Horário de Entrada</label>
        <input type="time" class="form-control" name="horario_entrada" value="<?php echo $horario_entrada; ?>" />
        <br />
        <label>Horário de Saída</label>
        <input type="time" class="form-control" name="horario_saida" value="<?php echo $horario_saida;?>" />
        <br />
        <label>Cor do Evento</label>
        <input type="color" class="form-control" name="color" value="<?php echo $color;?>"   />
        <br />
        <button type="submit" class="btn btn-outline-dark">Atualizar</button>

        </div>
    </form>
</body>

</html>