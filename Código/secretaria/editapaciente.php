<?php

  include '../conexao.php';

  $id = $id;
  $sql = "SELECT * FROM pacientes WHERE idpaciente =$id";
  $query = $conexao->query($sql);

  while ($dados = $query->fetch_array()) 
  {
      $nome_paciente = $dados['nome_paciente'];
      $sexo = $dados['sexo'];
      $data_nascimento = $dados['data_nascimento'];
      $cpf = $dados['cpf'];
      $email = $dados['email'];
      $telefone = $dados['telefone'];
  }

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edição Paciente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <form action="edpaciente.php?idpaciente=<?php echo $id; ?>" method="POST">
    <div class="form-group">
      <label>Nome Paciente</label>
      <input type="text" class="form-control" name="nome_paciente" value="<?php echo $nome_paciente; ?>" />
      <br />
      <label>Sexo</label>
      <div class="form-check">
      <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="Feminino" <?php echo ($sexo == 'Feminino') ? 'checked="checked"' : ''; ?>>
      <label class="form-check-label" for="exampleRadios1">
          Feminino
      </label>
      </div>
      <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="Masculino" <?php echo ($sexo == 'Masculino') ? 'checked="checked"' : ''; ?>>
          <label class="form-check-label" for="exampleRadios2">
              Masculino
          </label>
      </div>
      <br />
      <?php

        date_default_timezone_set("America/Sao_Paulo");
        date("Y-m-d");
        
      ?>
      <label>Data de Nascimento</label>
      <input type="date" class="form-control" name="data_nascimento" value="<?php echo $data_nascimento; ?>" />
      <br />
      <label>Cpf</label>
      <input type="text" class="form-control" name="cpf" value="<?php echo $cpf; ?>" />
      <br />
      <label>Email</label>
      <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" />
      <br />
      <label>Telefone</label>
      <input type="text" class="form-control" name="telefone" value="<?php echo $telefone; ?>" />
      <br />
      <button type="submit" class="btn btn-outline-dark">Atualizar</button>
    </div>

  </form>
</body>

</html>