<?php

session_start();
include('../conexao.php');

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

$nomeDoUsuario = $_SESSION['usuario'];
$idodontologo = obterIdOdontologo($nomeDoUsuario);

function obterIdOdontologo($nomeOdontologo) {
    global $conexao;

    $query = "SELECT idodontologo FROM odontologos WHERE nome_odontologo = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $nomeOdontologo);
    $stmt->execute();
    $stmt->bind_result($idodontologo);

    if ($stmt->fetch()) {
        return $idodontologo;
    }

    return null;
}

$query_eventos = "SELECT idconsulta, idpaciente, idprocedimento, idodontologo, data_consulta, hora, descripcao, situacao, title, color FROM consultas WHERE idodontologo = ?";
$stmt_eventos = $conexao->prepare($query_eventos);
$stmt_eventos->bind_param("i", $idodontologo);
$stmt_eventos->execute();
$result_eventos = $stmt_eventos->get_result();

$events = array();

while ($row_evento = $result_eventos->fetch_assoc()) {
    $event = array(
        'id' => $row_evento['idconsulta'],
        'title' => $row_evento['title'],
        'start' => $row_evento['data_consulta'] . 'T' . $row_evento['hora'],
        'description' => $row_evento['descripcao'],
        'color' => $row_evento['color'],
    );

    $events[] = $event;
}

header('Content-Type: application/json');
echo json_encode($events);
?>
