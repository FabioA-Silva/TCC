<?php

    include '../conexao.php';

    $idpaciente = mysqli_real_escape_string($conexao, $_POST['idpaciente']);
    $idprocedimento = mysqli_real_escape_string($conexao, $_POST['idprocedimento']);
    $idodontologo = mysqli_real_escape_string($conexao, $_POST['idodontologo']);
    $data_consulta = mysqli_real_escape_string($conexao, $_POST['data_consulta']);
    $hora = mysqli_real_escape_string($conexao, $_POST['hora']);
    $descripcao = mysqli_real_escape_string($conexao, $_POST['descripcao']);
    $situacao = mysqli_real_escape_string($conexao, $_POST['situacao']);
    $title = mysqli_real_escape_string($conexao, $_POST['title']);
    $cor_evento = mysqli_real_escape_string($conexao, $_POST['cor_evento']);

    // Recupere os horários de entrada e saída do dentista
    $queryHorariosOdontologo = $conexao->query("SELECT horario_entrada, horario_saida FROM odontologos WHERE idodontologo = '$idodontologo'");

    if ($queryHorariosOdontologo && $queryHorariosOdontologo->num_rows > 0) {
        $row = $queryHorariosOdontologo->fetch_assoc();
        $horario_entrada_odontologo = $row['horario_entrada'];
        $horario_saida_odontologo = $row['horario_saida'];

        $hora_consulta = new DateTime($hora);
        $horario_entrada = new DateTime($horario_entrada_odontologo);
        $horario_saida = new DateTime($horario_saida_odontologo);

        if ($hora_consulta >= $horario_entrada && $hora_consulta <= $horario_saida) {
            $queryConsultaPaciente = $conexao->query("SELECT * FROM consultas WHERE idpaciente = '$idpaciente' AND data_consulta = '$data_consulta' AND hora = '$hora'");
            $queryConsultaOdontologo = $conexao->query("SELECT * FROM consultas WHERE idodontologo = '$idodontologo' AND data_consulta = '$data_consulta' AND hora = '$hora'");

            if (mysqli_num_rows($queryConsultaPaciente) > 0) {
                ?>
                <script>
                    window.location.href = "lista_odontologos.php";
                    alert("Não foi possível cadastrar! A consulta com o paciente já existe");
                </script>
                <?php
                exit();
            } elseif (mysqli_num_rows($queryConsultaOdontologo) > 0) {
                ?>
                <script>
                    window.location.href = "lista_odontologos.php";
                    alert("Não foi possível cadastrar! O Odontólogo já está em uma consulta no mesmo horário");
                </script>
                <?php
                exit();
            } else {
                $sql = "INSERT INTO consultas (idpaciente, idprocedimento, idodontologo, data_consulta, hora, descripcao, situacao, title, color)
                        VALUES ('$idpaciente', '$idprocedimento', '$idodontologo', '$data_consulta', '$hora', '$descripcao', '$situacao', '$title', '$cor_evento')";
                
                if (mysqli_query($conexao, $sql)) {
                    ?>
                    <script>
                        window.location.href = "lista_consulta.php";
                        alert("Cadastro da consulta realizado com sucesso!");
                    </script>
                    <?php
                    exit();
                } else {
                    ?>
                    <script>
                        window.location.href = "lista_consulta.php";
                        alert("Ocorreu um erro ao cadastrar a consulta!");
                    </script>
                    <?php
                    exit();
                }
            }
        } else {
            ?>
            <script>
                window.location.href = "lista_odontologos.php";
                alert("Não foi possível cadastrar! O Odontólogo não está disponível no horário selecionado");
            </script>
            <?php
            exit();
        }
    } else {
        // O dentista não foi encontrado no banco de dados
        ?>
        <script>
            window.location.href = "lista_odontologos.php";
            alert("Não foi possível cadastrar! Odontólogo não encontrado");
        </script>
        <?php
        exit();
    }
    
?>
