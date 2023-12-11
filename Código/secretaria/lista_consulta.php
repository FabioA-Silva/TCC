<?php

    require('../conexao.php');
    include('menusecretaria.php');

    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';

    $options = array(
        'dia_atual' => 'Filtrado por Dia',
        'mes' => 'Filtrado por Mês',
        'ano' => 'Filtrado por Ano',
        'todas' => 'Todas as Consultas'
    );

?>

<!doctype html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Lista de Consultas</title>
</head>
<body>
    <div class="col d-flex flex-column h-sm-100">
        <main class="row overflow">
            <div class="col pt-4">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center">
                        <br>
                        <h4 class="my-0 fw-normal"><b> <i class="bi bi-list-columns-reverse" style="color: Darkgoldenrod"></i>
                            &nbsp;&nbsp; LISTA DE CONSULTAS</b></h4><br />
                        <form method="get" action="lista_consulta.php" class="mb-3">
                            <div class="d-flex">
                                <select name="filtro" id="filtrar" class="form-select">
                                    <?php

                                        foreach ($options as $value => $label) {
                                            $selected = ($filtro === $value) ? 'selected' : '';
                                            echo "<option value='$value' $selected>$label</option>";
                                        }

                                    ?>
                                </select>
                                <button type="submit" class="btn btn-secondary ms-2">Filtrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-light text-center">
                            <thead>
                                <tr>
                                    <th scope="col">PACIENTE</th>
                                    <th scope="col">PROCEDIMENTO</th>
                                    <th scope="col">ODONTÓLOGO</th>
                                    <th scope="col">DATA</th>
                                    <th scope="col">HORA</th>
                                    <th scope="col">DESCRIÇÃO</th>
                                    <th scope="col">SITUAÇÃO</th>
                                    <th scope="col">TÍTULO</th>
                                    <th scope="col">AÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include '../conexao.php';

                                    $sql = "SELECT * FROM consultas C 
                                            INNER JOIN pacientes p ON p.idpaciente = C.idpaciente
                                            INNER JOIN procedimento_clinico pc ON pc.idprocedimento = C.idprocedimento
                                            INNER JOIN odontologos o ON C.idodontologo = o.idodontologo";

                                    if ($filtro === "ano") {
                                        $ano = date("Y"); // Obtém o ano atual
                                        $sql .= " WHERE YEAR(data_consulta) = $ano";
                                    } elseif ($filtro === "mes") {
                                        $mes = date("m"); // Obtém o mês atual
                                        $sql .= " WHERE MONTH(data_consulta) = $mes";
                                    } elseif ($filtro === "todas") {
                                        $sql .= "";
                                    } else {
                                        $data_atual = date("d/m/Y"); // Obtém a data atual no formato desejado
                                        $sql .= " WHERE DATE_FORMAT(data_consulta, '%d/%m/%Y') = '$data_atual'";
                                    }

                                    $sql .= " ORDER BY data_consulta DESC";

                                    $pesquisa = mysqli_query($conexao, $sql);

                                    $row = mysqli_num_rows($pesquisa);

                                    if ($row > 0) {
                                        while ($registro = $pesquisa->fetch_array()) {

                                            $id = $registro['idconsulta'];
                                            $data_c = $registro["data_consulta"];
                                            $data_c = date("d/m/Y", strtotime($data_c));
                                            echo '<tr>';
                                            echo '<td>' . $registro['nome_paciente'] . '</td>';
                                            echo '<td>' . $registro['nome_procedimento'] . '</td>';
                                            echo '<td>' . $registro['nome_odontologo'] . '</td>';
                                            echo '<td>' . $data_c . '</td>';
                                            echo '<td>' . $registro['hora'] . '</td>';
                                            echo '<td>' . $registro['descripcao'] . '</td>';
                                            echo '<td>' . $registro['situacao'] . '</td>';
                                            echo '<td>' . $registro['title'] . '</td>';

                                            echo '<td> <a href="editaconsulta.php?idconsulta=' . $id . '" data-bs-toggle="modal" data-id="' . $id . '" data-bs-target="#exampleModal1' . $id . '"> <button type="button" class="btn btn-dark"><i class="bi bi-pencil-square"></i> </button> </a>  <a href="excluirconsulta.php ?idconsulta=' . $id . '"> <button type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> </button></td>';
                                            echo '</tr>';
                                            echo  '<div class="modal fade" id="exampleModal1' . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">';
                                            echo  '<div class="modal-dialog modal-dialog-centered">';
                                            echo '<div class="modal-content">';
                                            echo    '<div class="modal-header bg-dark text-white ">';
                                            echo   '<h5 class="modal-title"  id="exampleModalLabel">Editar Consulta</h5>';
                                            echo  '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                            echo  '</div>';
                                            echo '<div class="modal-body">';
                                            include 'editaconsulta.php';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';

                                        }
                                    } else {
                                        echo "Não há consultas cadastradas!";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
