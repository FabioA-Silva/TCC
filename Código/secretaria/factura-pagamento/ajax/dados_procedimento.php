<?php
include("../../../conexao.php");

if (isset($_GET['consultaId'])) {
    $consultaId = $_GET['consultaId'];

    // Verifica se existem registros na tabela
    $checkQuery = "SELECT COUNT(*) AS total FROM items_factura";
    $checkResult = mysqli_query($conexao, $checkQuery);

    if ($checkResult) {
        $row = mysqli_fetch_assoc($checkResult);
        $totalRegistros = $row['total'];

        if ($totalRegistros > 0) {
            // Se houver registros, limpa a tabela
            $truncateQuery = "TRUNCATE TABLE items_factura";
            $truncateResult = mysqli_query($conexao, $truncateQuery);
        }

        // Consulta para obter os detalhes do procedimento associado à consulta
        $query = "SELECT pc.nome_procedimento AS descricao, pc.preco AS preco
        FROM procedimento_clinico pc
        INNER JOIN consultas c ON c.idprocedimento = pc.idprocedimento 
        WHERE c.idconsulta = ?";

        if ($stmt = mysqli_prepare($conexao, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $consultaId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {

                $descricao = $row['descricao']; // Obtém a descrição da consulta
                $quantidade = 1; // Supondo que a quantidade seja sempre 1 para este cenário
                $preco = $row['preco']; // Obtém o preço da consulta

                // Insere o novo item na tabela
                $insertSql = "INSERT INTO `items_factura` (`descripcao`, `quantidade`, `preco`) VALUES ('$descricao', '$quantidade', '$preco')";
                $insert = mysqli_query($conexao, $insertSql);

                // Retorna os detalhes do procedimento
                echo json_encode(array(
                    'descricao' => $row['descricao'],
                    'preco' => $row['preco']
                ));
            } else {
                echo json_encode(array());
            }
        } else {
            echo json_encode(array());
        }
    
        mysqli_close($conexao);        
    } 
} else {
    echo json_encode(array());
}   
?>