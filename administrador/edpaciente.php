<?php

    include '../conexao.php';

    $id = $_GET['idpaciente'];
    $nome_paciente = $_POST['nome_paciente'];
    $sexo = $_POST['sexo'];
    $data_nascimento = date('Y-m-d', strtotime($_POST['data_nascimento']));
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $duplicados = array();  // Para rastrear quais campos já foram cadastrados

    // Verifique se o CPF já existe
    $checkCpf = "SELECT idpaciente FROM pacientes WHERE cpf = ? AND idpaciente <> ?";
    $checkCpfStmt = $conexao->prepare($checkCpf);
    $checkCpfStmt->bind_param("si", $cpf, $id);
    $checkCpfStmt->execute();
    $existingCpf = $checkCpfStmt->get_result()->fetch_assoc();

    // Verifique se o EMAIL já existe
    $checkEmail = "SELECT idpaciente FROM pacientes WHERE email = ? AND idpaciente <> ?";
    $checkEmailStmt = $conexao->prepare($checkEmail);
    $checkEmailStmt->bind_param("si", $email, $id);
    $checkEmailStmt->execute();
    $existingEmail = $checkEmailStmt->get_result()->fetch_assoc();

    // Verifique se o TELEFONE já existe
    $checkTelefone = "SELECT idpaciente FROM pacientes WHERE telefone = ? AND idpaciente <> ?";
    $checkTelefoneStmt = $conexao->prepare($checkTelefone);
    $checkTelefoneStmt->bind_param("si", $telefone, $id);
    $checkTelefoneStmt->execute();
    $existingTelefone = $checkTelefoneStmt->get_result()->fetch_assoc();

    if ($existingCpf) {
        $duplicados[] = "CPF";
    }

    if ($existingEmail) {
        $duplicados[] = "Email";
    }

    if ($existingTelefone) {
        $duplicados[] = "Telefone";
    }

    if (!empty($duplicados)) {
        ?>
        <script>
            window.location.href = "lista_pacientes.php";
            alert("Não foi possível atualizar, os seguintes campos já estão cadastrados por outro Paciente: <?php echo implode(", ", $duplicados); ?>");
        </script>
        <?php
        exit();
    }

    $sql = "UPDATE pacientes SET nome_paciente=?, sexo=?, data_nascimento=?, cpf=?, email=?, telefone=? WHERE idpaciente=?";
    $stmt = $conexao->prepare($sql) or die($conexao->error);

    if (!$stmt) {
        echo "ERRO NA ATUALIZAÇÃO!" . $conexao->$erno . '-' . $conexao->error;
    }

    $stmt->bind_param('ssssssi', $nome_paciente, $sexo, $data_nascimento, $cpf, $email, $telefone, $id);
    $stmt->execute();
    $stmt->close();
    header("location:lista_pacientes.php#tabs-4");

?>
