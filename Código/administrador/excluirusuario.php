<?php

    include('../conexao.php');

    $idusuario = $_GET["idusuario"];

    // Primeiro, obtenha o idodontologo associado ao idusuario que você deseja excluir
    $getOdontologoIdQuery = "SELECT idodontologo FROM usuarios WHERE idusuario = ?";
    $getOdontologoIdStmt = $conexao->prepare($getOdontologoIdQuery);
    $getOdontologoIdStmt->bind_param("i", $idusuario);
    $getOdontologoIdStmt->execute();
    $odontologoIdResult = $getOdontologoIdStmt->get_result();
    $odontologoIdRow = $odontologoIdResult->fetch_assoc();
    $idodontologo = $odontologoIdRow['idodontologo'];

    // Em seguida, exclua o registro da tabela usuarios
    $deleteUsuariosQuery = "DELETE FROM usuarios WHERE idusuario = ?";
    $deleteUsuariosStmt = $conexao->prepare($deleteUsuariosQuery);
    $deleteUsuariosStmt->bind_param("i", $idusuario);

    // Exclua o registro da tabela odontologos com base no idodontologo correspondente
    $deleteOdontologosQuery = "DELETE FROM odontologos WHERE idodontologo = ?";
    $deleteOdontologosStmt = $conexao->prepare($deleteOdontologosQuery);
    $deleteOdontologosStmt->bind_param("i", $idodontologo);

    if ($deleteUsuariosStmt->execute() && $deleteOdontologosStmt->execute()) {
        // Redirecionar em caso de exclusão bem-sucedida
        header("Location: usuarios.php");
        exit();
    } else {
        // Lidar com erros, como redirecionar para uma página de erro
        header("Location: erro.php");
        exit();
    }
    
?>
