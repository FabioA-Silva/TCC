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
        
        $descricao = $dados['descripcao'];

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

            <label>Descrição da Consulta</label>
            <input type="text" class="form-control form-select-sm" name="descricao" placeholder="" value="<?php echo $descricao; ?>" />
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
