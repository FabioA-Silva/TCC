<?php 

    include('../conexao.php');

    $id = $_GET["idconsulta"];

    $sql= ("DELETE FROM consultas WHERE idconsulta = $id");
    if (mysqli_query($conexao,$sql))
    {
        ?> 
        <script>
            window.location.href = "http://localhost/TCC/secretaria/lista_consulta.php?filtro=mes";
            alert("Consulta Excluída com sucesso!");
        </script>
        <?php
        exit(); 
    }
    else
    {
        ?> 
        <script>
            window.location.href = "http://localhost/TCC/secretaria/lista_consulta.php?filtro=mes";
            alert("Não foi posivel excluir a Consulta!");
        </script>
        <?php
    }

 ?>