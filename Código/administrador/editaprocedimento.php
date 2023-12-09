<?php
include '../conexao.php';
$id = $id;
$sql = " SELECT * FROM procedimento_clinico WHERE idprocedimento = $id ";
$query = $conexao->query($sql);
while ($dados = $query->fetch_array()) {
    $nome_procedimento = $dados['nome_procedimento'];
    $preco = $dados['preco'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita procedimentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <form action="edprocedimento.php?idprocedimento=<?php echo $id; ?>" method="POST">
        <label>Nome do procedimento</label>
        <input type="text" class="form-control" name="nome_procedimento" value= "<?php echo $nome_procedimento; ?>" />
        <br />
        <label>Preço</label>
        <input type="text" class="form-control" name="preco" value= "<?php echo $preco; ?>" />
        <br />
        <button type="submit" class="btn btn-outline-dark">Atualizar</button>

        </div>
    </form>
</body>

</html>