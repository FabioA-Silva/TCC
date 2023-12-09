<?php
require('../conexao.php');
require('menusecretaria.php');
$nome = $_SESSION['usuario'];

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Secretaria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>
  <div class="col d-flex flex-column h-sm-100">
    <main class="row overflow">

      <?php
      date_default_timezone_set("America/Sao_Paulo");
      date("d/m/Y");
      $data = date('l');
      $semana = array(
        'Sunday' => 'Domingo',
        'Monday' => 'Segunda-Feira',
        'Tuesday' => 'Terca-Feira',
        'Wednesday' => 'Quarta-Feira',
        'Thursday' => 'Quinta-Feira',
        'Friday' => 'Sexta-Feira',
        'Saturday' => 'Sábado'
      );
      ?>
      <marquee style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;margin-top:15px"><?php echo "Hoje é " . $semana[$data] . "," . date(" d/m/Y H:i a") . "," . "  " . "Bem-vindo(a) $nome" . " " ?></marquee>
      <img src="../secretaria/IMG/logosistema.png" class="img-fluid" alt="..." style="width: 600px; margin:auto; ">
  
   
    </main>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>