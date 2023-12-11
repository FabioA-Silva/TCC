<?php

    include '../conexao.php';

    $id = $id;

    $sql = "SELECT * FROM consultas C 
        INNER JOIN pacientes p ON p.idpaciente = C.idpaciente
        INNER JOIN procedimento_clinico pc ON pc.idprocedimento = C.idprocedimento
        INNER JOIN odontologos o ON C.idodontologo = o.idodontologo
        WHERE C.idconsulta = $id";

    $query = mysqli_query($conexao, $sql);

    if ($dados = mysqli_fetch_array($query)) 
    {
        $nome_paciente = $dados['nome_paciente'];
        $nome_procedimento = $dados['nome_procedimento'];
        $nome_odontologo = $dados['nome_odontologo'];
        $hora = $dados['hora'];
        $descricao = $dados['descripcao'];
        $situacao = $dados['situacao'];
        $title = $dados['title'];
        $data = $dados['data_consulta'];
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <form action="edconsulta.php?idconsulta=<?php echo $id; ?>" method="POST">
        <div class="form-group">
            <label>Nome Paciente</label>
            <select class="form-select form-select-sm" name="idpaciente"
                aria-label=".form-select-sm example">
                <option disabled selected>Selecione o Nome do Paciente</option>
                <?php

                    $query = $conexao->query("SELECT * FROM pacientes");

                    while ($paciente = mysqli_fetch_array($query)) {
                        $selected = ($paciente['idpaciente'] == $dados['idpaciente']) ? 'selected' : '';
                        echo '<option value="' . $paciente['idpaciente'] . '" ' . $selected . '>' . $paciente['nome_paciente'] . ' </option>';
                    }

                ?>
            </select>
            <br />

            <label>Procedimento Clinico</label>
            <select class="form-select form-select-sm" name="idprocedimento"
                aria-label=".form-select-sm example">
                <option disabled selected>Selecione o Procedimento a Realizar</option>
                <?php

                    $query = $conexao->query("SELECT * FROM procedimento_clinico");

                    while ($procedimento = mysqli_fetch_array($query)) {
                        $selected = ($procedimento['idprocedimento'] == $dados['idprocedimento']) ? 'selected' : '';
                        echo '<option value="' . $procedimento['idprocedimento'] . '" ' . $selected . '>' . $procedimento['nome_procedimento'] . '</option>';
                    }

                ?>
            </select>
            <br />

            <label>Odontólogo</label>
            <select class="form-select form-select-sm" name="idodontologo"
                aria-label=".form-select-sm example" onchange="updateColor2(this)">
                <option disabled selected>Selecione o Nome do Odontólogo</option>
                <?php

                    $query = $conexao->query("SELECT * FROM odontologos");

                    while ($odontologo = mysqli_fetch_array($query)) {
                        $selected = ($odontologo['idodontologo'] == $dados['idodontologo']) ? 'selected' : '';
                        echo '<option value="' . $odontologo['idodontologo'] . '" data-color="' . $odontologo['color'] . '" ' . $selected . '>' . $odontologo['nome_odontologo'] . '</option>';
                    }

                ?>
            </select>
            <input type="hidden" name="cor_evento" id="cor_evento2" value="#ffffff">
            <br />

            <?php

                date_default_timezone_set("America/Sao_Paulo");
                $today = date("Y-m-d");
                $hora = date('h:i:s A');

            ?>

            <label>Data da Consulta</label>
            <input type="date" class="form-control form-select-sm" name="data_consulta" id="data_consulta_con" required value="<?php echo $data; ?>" min="<?php echo $today; ?>" oninput="validateDate()" />
            <span id="date-error" style="color: red;"></span>
            <br />

            <label>Hora da Consulta</label>
            <select class="form-select form-select-sm" name="hora" id="hora" required>
                <?php

                    if (!empty($dados['hora'])) {
                        $formattedHora = date('H:i', strtotime($dados['hora']));
                        echo "<option value='$formattedHora'>$formattedHora</option>";
                    }

                    for ($i = 0; $i < 24; $i++) {
                        for ($j = 0; $j < 60; $j += 30) {
                            $hour = str_pad($i, 2, '0', STR_PAD_LEFT);
                            $minute = str_pad($j, 2, '0', STR_PAD_LEFT);
                            $time = "$hour:$minute";
                            $selected = ($time == $formattedHora) ? 'selected' : '';
                            echo "<option value='$time' $selected>$time</option>";
                        }
                    }
                    
                ?>
            </select>
            <br />

            <label>Descrição da Consulta</label>
            <input type="text" class="form-control form-select-sm" name="descricao" placeholder="" value="<?php echo $descricao; ?>" />
            <br />

            <label for="situacao">Situação Consulta</label>
            <select class="form-select form-select-sm" id="situacao" name="situacao" required>
                <option value="" disabled>Selecione o Status da Consulta</option>
                <option value="Pendente" <?php echo ($situacao === 'Pendente') ? 'selected' : ''; ?>>Pendente</option>
            </select>
            <br />

            <label>Título da Consulta</label>
            <input type="text" class="form-control form-select-sm" name="title" value="<?php echo $title; ?>" required />
            <br />

            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-dark">Atualizar</button>
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </form>

    <script>
        function validateDate() {
            var dataConsultaInput = document.getElementById("data_consulta_con");
            var dateError = document.getElementById("date-error");
            var selectedDate = new Date(dataConsultaInput.value);
            var today = new Date();
            
            if (selectedDate < today) {
                dateError.textContent = "Selecione uma data futura.";
                dataConsultaInput.setCustomValidity("Selecione uma data futura.");
            } else {
                dateError.textContent = "";
                dataConsultaInput.setCustomValidity("");
            }
        }
        
        // Impedir a alteração da data se a consulta já tiver ocorrido
        var dataConsultaInput = document.getElementById("data_consulta_con");
        dataConsultaInput.addEventListener("change", function () {
            var selectedDate = new Date(dataConsultaInput.value);
            var today = new Date();
            
            if (selectedDate < today) {
                dataConsultaInput.value = today.toISOString().split('T')[0];
            }
        });
    </script>
</body>
</html>
