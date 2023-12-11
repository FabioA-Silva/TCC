<?php 

  include('../conexao.php');

  $id=$_GET["idprocedimento"];
  $sql= ("DELETE FROM procedimento_clinico WHERE idprocedimento=$id");

  if (mysqli_query($conexao,$sql)){
      ?> 
        <script>
          window.location.href = "procedimentos.php";
          alert("Procedimento excluido com sucesso!");
        </script>
      <?php
      exit(); 
  } else
  {
      ?> 
        <script>
          window.location.href = "procedimentos.php";
          alert("Não foi posivel excluir o procedimento!");
        </script>
      <?php
  }      

?>