<?php

require('../conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_usuario = $_POST['nome_usuario'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $senha = $_POST['senha'];
    $nome_odontologo = isset($_POST['nome_odontologo']) ? $_POST['nome_odontologo'] : null;

    // Verifique se o nome de usuário já existe
    $checkUserQuery = "SELECT * FROM usuarios WHERE nome_usuario = ?";
    $checkUserStmt = $conexao->prepare($checkUserQuery);
    $checkUserStmt->bind_param("s", $nome_usuario);
    $checkUserStmt->execute();
    $existingUser = $checkUserStmt->get_result()->fetch_assoc();

    if ($existingUser) {
        echo '<script language="javascript" type="text/javascript">';
        echo 'window.location.href="usuarios.php";';
        echo 'alert("Nome de usuário já existe!");';
        echo '</script>';
        exit();
    }

    if ($tipo_usuario === 'odontologo') {
        $nome_odontologo = $_POST['nome_odontologo'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $horario_entrada = $_POST['horario_entrada'];
        $horario_saida = $_POST['horario_saida'];
        $color = $_POST['color'];

        // Verifique se o nome de usuário é igual ao nome do odontólogo
        if ($nome_usuario !== $nome_odontologo) {
            echo '<script language="javascript" type="text/javascript">';
            echo 'window.location.href="usuarios.php";';
            echo 'alert("O nome de usuário deve ser igual ao nome do odontólogo.");';
            echo '</script>';
            exit;
        }

        // Verifique se o CPF já existe
        $checkQuery = "SELECT * FROM odontologos WHERE cpf = ?";
        $checkStmt = $conexao->prepare($checkQuery);
        $checkStmt->bind_param("s", $cpf);
        $checkStmt->execute();
        $existingRecord = $checkStmt->get_result()->fetch_assoc();

        // Verifique se o e-mail já existe
        $checkEmailQuery = "SELECT * FROM odontologos WHERE email = ?";
        $checkEmailStmt = $conexao->prepare($checkEmailQuery);
        $checkEmailStmt->bind_param("s", $email);
        $checkEmailStmt->execute();
        $existingEmail = $checkEmailStmt->get_result()->fetch_assoc();

        // Verifique se a cor já existe
        $checkColorQuery = "SELECT * FROM odontologos WHERE color = ?";
        $checkColorStmt = $conexao->prepare($checkColorQuery);
        $checkColorStmt->bind_param("s", $color);
        $checkColorStmt->execute();
        $existingColor = $checkColorStmt->get_result()->fetch_assoc();

        // Verifique se o telefone já existe
        $checkTelefoneQuery = "SELECT * FROM odontologos WHERE telefone = ?";
        $checkTelefoneStmt = $conexao->prepare($checkTelefoneQuery);
        $checkTelefoneStmt->bind_param("s", $telefone);
        $checkTelefoneStmt->execute();
        $existingTelefone = $checkTelefoneStmt->get_result()->fetch_assoc();

        if ($existingRecord || $existingEmail || $existingColor || $existingTelefone) {

            echo '<script language="javascript" type="text/javascript">';
            echo 'window.location.href="usuarios.php";';
            echo 'alert("Dados inseridos já estão cadastrados!");';
            echo '</script>';
            exit();
            
        } elseif ($existingRecord) {
            echo '<script language="javascript" type="text/javascript">';
            echo 'window.location.href="usuarios.php";';
            echo 'alert("CPF já está em uso!");';
            echo '</script>';
            exit();
        } elseif ($existingEmail) {
            echo '<script language="javascript" type="text/javascript">';
            echo 'window.location.href="usuarios.php";';
            echo 'alert("E-mail já está em uso!");';
            echo '</script>';
            exit();
        } elseif ($existingColor) {
            echo '<script language="javascript" type="text/javascript">';            
            echo 'window.location.href="usuarios.php";';            
            echo 'alert("A cor já está sendo usada por outro odontologista!");';            
            echo '</script>';
            exit();
        } elseif ($existingTelefone) {
            echo '<script language="javascript" type="text/javascript">';
            echo 'window.location.href="usuarios.php";';
            echo 'alert("O telefone já está em uso!");';
            echo '</script>';
            exit();
        }

        // Insira os dados do odontólogo na tabela "odontologos"
        $sql = "INSERT INTO odontologos (nome_odontologo, cpf, email, telefone, horario_entrada, horario_saida, color) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sssssss", $nome_odontologo, $cpf, $email, $telefone, $horario_entrada, $horario_saida, $color);
        $stmt->execute();

        // Obtenha o ID do odontólogo recém-inserido
        $idodontologo = $stmt->insert_id;

        $stmt->close();

        // Insira os dados básicos do usuário na tabela "usuarios" com o idodontologo correspondente
        $sql = "INSERT INTO usuarios (nome_usuario, tipo_usuario, senha, idodontologo) VALUES (?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sssi", $nome_usuario, $tipo_usuario, $senha, $idodontologo);
        $stmt->execute();
        $stmt->close();
    } else {
        // Se não for um odontólogo, insira na tabela "usuarios" com idodontólogo nulo
        $sql = "INSERT INTO usuarios (nome_usuario, tipo_usuario, senha, idodontologo) VALUES (?, ?, ?, NULL)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sss", $nome_usuario, $tipo_usuario, $senha);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: usuarios.php");
} else {
    // Redirecione em caso de acesso incorreto ao arquivo
    header("Location: usuarios.php");
}

$conexao->close();
?>
