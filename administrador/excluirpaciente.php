<?php 
include('../conexao.php');
$id=$_GET["idpaciente"];
$sql= ("DELETE FROM pacientes WHERE idpaciente=$id");
if (mysqli_query($conexao,$sql)){
    ?> 
    <script>
  window.location.href = "lista_pacientes.php";
  alert("Paciente Excluido com sucesso!!");
 </script>
 <?php
exit(); 
      
     
  }else{
    ?> 
    <script>
  window.location.href = "lista_pacientes.php";
  alert("Não foi posivel excluir paciente!!");
 </script>
 <?php
  }

       
 ?>