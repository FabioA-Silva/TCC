<?php

    include '../conexao.php';

    $idconsulta = $_GET['idconsulta']; // Obtendo o ID da consulta via parâmetro GET
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']); // Obtendo a nova descrição

    // Atualizando a descrição da consulta no banco de dados
    $sql = "UPDATE consultas SET descripcao = '$descricao' WHERE idconsulta = '$idconsulta'";

    if (mysqli_query($conexao, $sql)) {
        ?>
        <script>
            window.location.href = "historial_consultasodont.php";
            alert("Edição da descrição realizada com sucesso!");
        </script>
        <?php
        exit();
    } else {
        ?>
        <script>
            window.location.href = "historial_consultasodont.php";
            alert("Ocorreu um erro ao editar a descrição da consulta!");
        </script>
        <?php
        exit();
    }
    
?>
