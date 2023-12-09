<?php

    require('../conexao.php');
    include('menuodontologos.php');
    $nome = $_SESSION['usuario'];

?>

<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3y-d65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="odontologo.css">    
    <title>Lista de Consultas</title>

    <style>

    .patient-link {
        text-decoration: none;
        color: #1e211f;
        font-weight: bold;
    }

    .patient-link:hover {
        color: black;
        font-weight: bold;
        font-size: 18px;
        transition: 0.2s;
        opacity: 0.7;
    }

    </style>
</head>

<body>
    <div class="col d-flex flex-column h-sm-100 b">
        <main class="row overflow a">
            <div class="col pt-4">
                <div class="card conteudo">
                    <div class="card-header bg-dark text-white text-center">
                        <br>
                            <h4 class="my-0 fw-normal"><b> <i class="bi bi-person-fill" style="color:Darkgoldenrod"></i>
                            &nbsp;&nbsp;PACIENTES</b></h4><br />
                            <div class="box-search d-flex align-items-center">
                            <input type="search" class="form-control w-25 mx-2" placeholder="Pesquisar Paciente" id="pesquisar">
                            <button type="button" onclick="searchData()" class="btn btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </button>
                            </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-light text-center">
                            <thead>
                                <tr>
                                    <th scope="col">NOME</th>
                                    <th scope="col">SEXO</th>
                                    <th scope="col">IDADE</th>
                                    <th scope="col">TELEFONE</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            include '../conexao.php';

                            function calcularIdade($dataNascimento)
                            {
                                $dataNascimento = new DateTime($dataNascimento);
                                $hoje = new DateTime();
                                $idade = $hoje->diff($dataNascimento);

                                if ($idade->y > 110) {
                                    return 'Idade não factível!';
                                } else {
                                    return $idade->y;
                                }
                            }

                            if (!empty($_GET['search'])) {

                                $data = $_GET['search'];
                                $pesquisa = "SELECT DISTINCT p.*, o.nome_odontologo
                                FROM pacientes p
                                INNER JOIN consultas c ON p.idpaciente = c.idpaciente
                                INNER JOIN odontologos o ON o.idodontologo = c.idodontologo
                                WHERE o.nome_odontologo = '$nome' AND p.nome_paciente LIKE '%$data%'
                                ORDER BY p.idpaciente DESC";
                            } 
                            else {
                                $pesquisa = "SELECT DISTINCT p.*, o.nome_odontologo
                                FROM pacientes p
                                INNER JOIN consultas c ON p.idpaciente = c.idpaciente
                                INNER JOIN odontologos o ON o.idodontologo = c.idodontologo
                                WHERE o.nome_odontologo = '$nome'";

                            }
                              
                            $result = $conexao->query($pesquisa);

                            if ($result)
                            {
                                while ($registro = $result->fetch_array()) 
                                {
                                    $id = $registro['idpaciente'];
                                    $dataNascimento = $registro['data_nascimento'];

                                    echo '<tr>';
                                    echo '<td><a class="patient-link" href="#" data-bs-toggle="modal" data-bs-target="#modal' . $id . '">' . $registro['nome_paciente'] . '</a></td>';
                                    echo '<td>' . $registro['sexo'] . '</td>';
                                    echo '<td>' . calcularIdade($dataNascimento) . '</td>';
                                    echo '<td>' . $registro['telefone'] . '</td>';
                                    echo '</tr>';
                                }
                            }
                            
                            ?>
                        </tbody>
                        </table>

                            <?php

                            $result = $conexao->query($pesquisa);

                            if ($result) 
                            {
                                while ($registro2 = $result->fetch_array())
                                {
                                    $id = $registro2['idpaciente'];

                                    echo '<div class="modal fade" id="modal' . $id . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel' . $id . '" aria-hidden="true">';
                                    echo '    <div class="modal-dialog">';
                                    echo '        <div class="modal-content">';
                                    echo '            <div class="modal-header">';
                                    echo '                <h5 class="modal-title" id="modalLabel' . $id . '">Consultas do(a) '. $registro2['nome_paciente'] . '</h5>';
                                    echo '                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                    echo '            </div>';
                                    echo '            <div class="modal-body">';

                                    echo '<table class="table table-light">';
                                    echo '<thead>';
                                    echo '<tr>';
                                    echo '<th scope="col">Descrição</th>';
                                    echo '<th scope="col">Odontólogo</th>';
                                    echo '<th scope="col">Procedimento</th>';
                                    echo '<th scope="col">Data</th>';
                                    echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';

                                    // Consultas do paciente
                                    $queryConsultas = "SELECT c.*, p.nome_procedimento FROM consultas c
                                    INNER JOIN procedimento_clinico p ON c.idprocedimento = p.idprocedimento
                                    WHERE c.idpaciente = $id";

                                    $resultConsultas = mysqli_query($conexao, $queryConsultas);

                                    while ($consulta = mysqli_fetch_array($resultConsultas)) {

                                        $data_consulta = $consulta["data_consulta"];
                                        $data_consulta = implode("/",array_reverse(explode("-",$data_consulta)));

                                        echo '<tr>';
                                        echo '<td>' . $consulta['descripcao'] . '</td>';
                                        echo '<td>' . $registro2['nome_odontologo'] . '</td>';
                                        echo '<td>' . $consulta['nome_procedimento'] . '</td>';
                                        echo '<td>' . $data_consulta . '</td>';
                                        echo '</tr>';
                                    }
                                    
                                    echo '</tbody>';
                                    echo '</table>';

                                    echo '            </div>';
                                    echo '            <div class="modal-footer">';
                                    echo '                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>';
                                    echo '            </div>';
                                    echo '        </div>';
                                    echo '    </div>';
                                    echo '</div>';
                                }
                            }
                    
                            
                            ?>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

<script>

  var search = document.getElementById("pesquisar");

  search.addEventListener("keydown", function (event) {
      if (event.key == "Enter") {
          searchData();
      }
  })

  function searchData() {
      window.location = 'lista_pacientesodont.php?search=' + search.value;
  }
</script>

</html>