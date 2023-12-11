<?php

    include('../conexao.php');

    $events = array();

    // Consulta SQL para obter os eventos da tabela de consultas
    $query = "SELECT idconsulta, idpaciente, idprocedimento, idodontologo, data_consulta, hora, descripcao, situacao, title, color FROM consultas";
    $result = mysqli_query($conexao, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $event = array(
            'id' => $row['idconsulta'],
            'title' => $row['title'],
            'start' => $row['data_consulta'] . 'T' . $row['hora'],
            'description' => $row['descripcao'],
            'color' => $row['color'],
        );

        $events[] = $event;
    }

    header('Content-Type: application/json');
    echo json_encode($events);
    
?>
