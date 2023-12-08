<?php
// Conexão com o banco de dados
include("../../../conexao.php");

if(isset($_GET['consultaId'])) {
    $consultaId = $_GET['consultaId'];

    // Consulta para obter os dados do paciente associado à consulta
    $query = "SELECT p.cpf as paciente_cpf, p.email as paciente_email, p.telefone as paciente_telefone, p.nome_paciente as paciente_nome
    FROM pacientes p
    INNER JOIN consultas c ON c.idpaciente = p.idpaciente 
    WHERE c.idconsulta = ?";

    // Preparação da consulta
    if ($stmt = mysqli_prepare($conexao, $query)) {
        // Vincular parâmetros
        mysqli_stmt_bind_param($stmt, "i", $consultaId);

        // Executar a consulta
        mysqli_stmt_execute($stmt);

        // Obter resultados
        $result = mysqli_stmt_get_result($stmt);

        // Verificar se existem resultados
        if ($row = mysqli_fetch_assoc($result)) {
            // Retorna os dados do paciente como um objeto JSON
            echo json_encode($row);
        } else {
            // Retorna um JSON vazio se não houver resultados
            echo json_encode(array());
        }
    } else {
        // Retorna um JSON vazio ou uma mensagem de erro, dependendo do seu fluxo
        echo json_encode(array());
    }

    // Fechar a declaração
    mysqli_stmt_close($stmt);
} else {
    // Retorna um JSON vazio ou uma mensagem de erro, dependendo do seu fluxo
    echo json_encode(array());
}

// Fechar a conexão
mysqli_close($conexao);
?>
