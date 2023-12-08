<?php
include '../conexao.php';

$idconsulta = $_GET['idconsulta']; // Você pode obter o ID da consulta a partir dos parâmetros GET
$idpaciente = mysqli_real_escape_string($conexao, $_POST['idpaciente']);
$idprocedimento = mysqli_real_escape_string($conexao, $_POST['idprocedimento']);
$idodontologo = mysqli_real_escape_string($conexao, $_POST['idodontologo']);
$data_consulta = date('Y-m-d', strtotime($_POST['data_consulta']));
$hora = mysqli_real_escape_string($conexao, $_POST['hora']);
$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
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
        $queryConsultaPaciente = $conexao->query("SELECT * FROM consultas WHERE idpaciente = '$idpaciente' AND data_consulta = '$data_consulta' AND hora = '$hora' AND idconsulta != '$idconsulta'");
        $queryConsultaOdontologo = $conexao->query("SELECT * FROM consultas WHERE idodontologo = '$idodontologo' AND data_consulta = '$data_consulta' AND hora = '$hora' AND idconsulta != '$idconsulta'");

        if (mysqli_num_rows($queryConsultaPaciente) > 0) {
            ?>
            <script>
                window.location.href = "lista_odontologos.php";
                alert("Não foi possível editar! A consulta com o paciente já existe no mesmo horário");
            </script>
            <?php
            exit();
        } elseif (mysqli_num_rows($queryConsultaOdontologo) > 0) {
            ?>
            <script>
                window.location.href = "lista_odontologos.php";
                alert("Não foi possível editar! O Odontólogo já está em uma consulta no mesmo horário");
            </script>
            <?php
            exit();
        } else {
            // Atualize a data da consulta no banco de dados
            $sql = "UPDATE consultas SET 
            data_consulta = '$data_consulta', 
            hora = '$hora', 
            descripcao = '$descricao', 
            situacao = '$situacao', 
            title = '$title', 
            color = '$cor_evento', 
            idprocedimento = '$idprocedimento', 
            idpaciente = '$idpaciente' 
            WHERE idconsulta = '$idconsulta'";

            
            if (mysqli_query($conexao, $sql)) {
                ?>
                <script>
                    window.location.href = "lista_consulta.php";
                    alert("Edição da consulta realizada com sucesso!");
                </script>
                <?php
                exit();
            } else {
                ?>
                <script>
                    window.location.href = "lista_consulta.php";
                    alert("Ocorreu um erro ao editar a consulta!");
                </script>
                <?php
                exit();
            }
        }
    } else {
        ?>
        <script>
            window.location.href = "lista_odontologos.php";
            alert("Não foi possível editar! O Odontólogo não está disponível no horário selecionado");
        </script>
        <?php
        exit();
    }
} else {
    // O dentista não foi encontrado no banco de dados
    ?>
    <script>
        window.location.href = "lista_odontologos.php";
        alert("Não foi possível editar! Odontólogo não encontrado");
    </script>
    <?php
    exit();
}
?>
