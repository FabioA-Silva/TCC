<?php 
include '../conexao.php';

$id = $_GET['idodontologo'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$horario_entrada = $_POST['horario_entrada'];
$horario_saida = $_POST['horario_saida'];
$color = $_POST['color'];

// Verifique se o CPF já existe no banco
$checkCpfQuery = "SELECT idodontologo FROM odontologos WHERE cpf = ? AND idodontologo != ?";
$checkCpfStmt = $conexao->prepare($checkCpfQuery);
$checkCpfStmt->bind_param('si', $cpf, $id);
$checkCpfStmt->execute();
$existingCpf = $checkCpfStmt->get_result()->fetch_assoc();

// Verifique se o email já existe no banco
$checkEmailQuery = "SELECT idodontologo FROM odontologos WHERE email = ? AND idodontologo != ?";
$checkEmailStmt = $conexao->prepare($checkEmailQuery);
$checkEmailStmt->bind_param('si', $email, $id);
$checkEmailStmt->execute();
$existingEmail = $checkEmailStmt->get_result()->fetch_assoc();

// Verifique se o telefone já existe no banco
$checkTelefoneQuery = "SELECT idodontologo FROM odontologos WHERE telefone = ? AND idodontologo != ?";
$checkTelefoneStmt = $conexao->prepare($checkTelefoneQuery);
$checkTelefoneStmt->bind_param('si', $telefone, $id);
$checkTelefoneStmt->execute();
$existingTelefone = $checkTelefoneStmt->get_result()->fetch_assoc();

// Verifique se a cor já existe no banco
$checkCorQuery = "SELECT idodontologo FROM odontologos WHERE color = ? AND idodontologo != ?";
$checkCorStmt = $conexao->prepare($checkCorQuery);
$checkCorStmt->bind_param('si', $color, $id);
$checkCorStmt->execute();
$existingCor = $checkCorStmt->get_result()->fetch_assoc();

if ($existingRecord || $existingEmail || $existingColor || $existingTelefone || $existingCor) {
    echo '<script language="javascript" type="text/javascript">';
    echo 'window.location.href="odontologos.php";';
    echo 'alert("Dados inseridos já estão em uso por outro odontologista!");';
    echo '</script>';
    exit();
} elseif ($existingCpf) {
    echo '<script language="javascript" type="text/javascript">';
    echo 'window.location.href="odontologos.php";';
    echo 'alert("CPF já está em uso por outro odontologista!");';
    echo '</script>';
    exit();
} elseif ($existingEmail) {
    echo '<script language="javascript" type="text/javascript">';
    echo 'window.location.href="odontologos.php";';
    echo 'alert("E-mail já está em uso por outro odontologista!");';
    echo '</script>';
    exit();
} elseif ($existingTelefone) {
    echo '<script language="javascript" type="text/javascript">';
    echo 'window.location.href="odontologos.php";';
    echo 'alert("Telefone já está em uso por outro odontologista!");';
    exit();
} elseif ($existingCor) {
    echo '<script language="javascript" type="text/javascript">';
    echo 'window.location.href="odontologos.php";';
    echo 'alert("Cor já está em uso por outro odontologista!");';
    echo '</script>';
    exit();
} else {
    // Não há duplicatas, então atualize os dados
    $sql = "UPDATE odontologos SET cpf=?, email=?, telefone=?, horario_entrada=?, horario_saida=?, color=? WHERE idodontologo=?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('ssdsssi', $cpf, $email, $telefone, $horario_entrada, $horario_saida, $color, $id);
    $stmt->execute();
    $stmt->close();
    header("location: odontologos.php#tabs-4");
}
?>
