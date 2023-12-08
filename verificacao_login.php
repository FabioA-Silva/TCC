<?php

session_start();
include "conexao.php";

$nome = $_POST["nome_usuario"];
$senha = $_POST["senha"];

# Encripitando a Senha
$senha = hash("sha256", $senha);

// Evitar injeção de SQL usando consulta preparada
$stmt = $conexao->prepare("SELECT tipo_usuario FROM usuarios WHERE nome_usuario = ? AND senha = ?");
$stmt->bind_param("ss", $nome, $senha);
$stmt->execute();
$stmt->bind_result($tipo_usuario);

if ($stmt->fetch()) {
    $_SESSION["usuario"]=$nome;
    

    switch ($tipo_usuario) {
        case "administrador":
             echo ("<script>alert('Logado como ADMINISTRADOR!');window.location.href='./administrador/homeadministrador.php';</script>");
            
            break;
        case "odontologo":
        
         echo ("<script>alert('Logado como ODONTÓLGO!');window.location.href='./odontologos/homeodontologos.php';</script>");
            break;
        
        case "secretaria":
            echo ("<script>alert('Logado como SECRETARIA!');window.location.href='./secretaria/homesecretaria.php';</script>");
            break;
        default:
            echo ("<script>alert('Tipo de usuário desconhecido!');window.location.href='index.php';</script>");
            break;
    }
} else {
    echo ("<script>alert('Login ou senha incorretos! Tente novamente.');window.location.href='index.php';</script>");
}

$stmt->close();
$conexao->close();
