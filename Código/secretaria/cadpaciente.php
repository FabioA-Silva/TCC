<?php
    include '../conexao.php';

    $nome_paciente = $_POST['nome_paciente'];
    $sexo = $_POST['sexo'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $duplicados = array();  // Para rastrear quais campos já foram cadastrados

    // Verifique se o CPF já existe
    $checkCpf = "SELECT * FROM pacientes WHERE cpf = ?";
    $checkCpfStmt = $conexao->prepare($checkCpf);
    $checkCpfStmt->bind_param("s", $cpf);
    $checkCpfStmt->execute();
    $existingCpf = $checkCpfStmt->get_result()->fetch_assoc();

    // Verifique se o EMAIL já existe
    $checkEmail = "SELECT * FROM pacientes WHERE email = ?";
    $checkEmailStmt = $conexao->prepare($checkEmail);
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $existingEmail = $checkEmailStmt->get_result()->fetch_assoc();

    // Verifique se o TELEFONE já existe
    $checkTelefone = "SELECT * FROM pacientes WHERE telefone = ?";
    $checkTelefoneStmt = $conexao->prepare($checkTelefone);
    $checkTelefoneStmt->bind_param("s", $telefone);
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
            window.location.href = "pacientes.php";
            alert("Não foi possível cadastrar, os seguintes campos já foram cadastrados por outro paciente: <?php echo implode(", ", $duplicados); ?>");
        </script>
        <?php
        exit();
    }

    $sql = "INSERT INTO pacientes(nome_paciente, sexo, data_nascimento, cpf, email, telefone) VALUES (?, ?, ?, ?, ?, ?)";
    $insertStmt = $conexao->prepare($sql);
    $insertStmt->bind_param("ssssss", $nome_paciente, $sexo, $data_nascimento, $cpf, $email, $telefone);

    if ($insertStmt->execute()) {
        ?>
        <script>
            window.location.href = "pacientes.php";
            alert("Paciente cadastrado com sucesso!!");
        </script>
        <?php
        exit();
    } else {
        ?>
        <script>
            window.location.href = "pacientes.php";
            alert("Ocorreu um erro ao cadastrar!!");
        </script>
        <?php
        exit();
    }
?>
