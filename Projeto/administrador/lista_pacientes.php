<?php

  require('../conexao.php');
  include('menuadministrador.php');

?>

<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Pacientes</title>
</head>

<body>
    <div class="col d-flex flex-column h-sm-100">
        <main class="row overflow">
            <div class="col pt-4">
                <div class="card  ">
                    <div class="card-header bg-dark text-white  text-center">
                        <br />
                        <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16"
                                    style="color:Darkgoldenrod;">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                </svg>&nbsp;&nbsp;PACIENTES</b></h4><br />

                        <button type="button" class="btn btn-outline-link" style="background:Darkgoldenrod;"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">Novo Paciente</button>
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
                                    <th scope="col">NOME PACIENTE</th>
                                    <th scope="col">SEXO</th>
                                    <th scope="col">IDADE</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">TELEFONE</th>
                                    <th scope="col">AÇÕES</th>
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

                                if (!empty($_GET['search'])) 
                                {
                                    $data = $_GET['search'];
                                    $pesquisa = "SELECT * FROM pacientes WHERE nome_paciente LIKE '%$data%' or cpf LIKE '%$data%' or email LIKE '%$data%' or telefone LIKE '%$data%' ORDER BY idpaciente DESC";

                                } 
                                else 
                                {
                                    $pesquisa = "SELECT * FROM pacientes ORDER BY idpaciente DESC";
                                }

                                $result = $conexao->query($pesquisa);

                                if ($result) {
                                    $row = $result->num_rows;

                                    if ($row > 0) {
                                        while ($registro = $result->fetch_array()) {
                                          
                                            $id = $registro['idpaciente'];
                                            $dataNascimento = $registro['data_nascimento'];

                                            echo '<tr>';
                                            echo '<td>' . $registro['nome_paciente'] . '</td>';
                                            echo '<td>' . $registro['sexo'] . '</td>';
                                            echo '<td>' . calcularIdade($dataNascimento) . '</td>';
                                            echo '<td>' . $registro['cpf'] . '</td>';
                                            echo '<td>' . $registro['email'] . '</td>';
                                            echo '<td>' . $registro['telefone'] . '</td>';
                                            echo '<td> <a href="editapaciente.php?idpaciente=' . $id . '" data-bs-toggle="modal" data-id="' . $id . '" data-bs-target="#exampleModal1' . $id . '"> <button type="button" class="btn btn-dark"><i class="bi bi-pencil-square"></i> </button> </a> </td>';
                                            echo '</tr>';
                                            echo  '<div class="modal fade" id="exampleModal1' . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">';
                                            echo  '<div class="modal-dialog modal-dialog-centered">';
                                            echo '<div class="modal-content">';
                                            echo    '<div class="modal-header bg-dark text-white ">';
                                            echo   '<h5 class="modal-title"  id="exampleModalLabel">Editar paciente</h5>';
                                            echo  '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                            echo  '</div>';
                                            echo '<div class="modal-body">';
                                            include 'editapaciente.php';
                                            echo '</div>';
                                            echo '<div class="modal-footer">';
                                            echo ' <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    } else {
                                        echo "Não há pacientes cadastrados!";
                                    }
                                }

                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark mb-3 text-white">

                    <h5 class="modal-title " id="exampleModalLabel">Cadastrar Novo Paciente</h5>

                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="cadpaciente.php" method="POST">
                        <div class="form-group">
                            <label>Nome Paciente</label>
                            <input type="text" class="form-control" name="nome_paciente" placeholder="Insira o nome"
                                required />
                            <br />
                            <label>Sexo</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1"
                                    value="Feminino" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Feminino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2"
                                    value="Masculino">
                                <label class="form-check-label" for="exampleRadios2">
                                    Masculino
                                </label>
                            </div>
                            <br />
                            <?php

                                date_default_timezone_set("America/Sao_Paulo");
                                date("Y/m/d");
                                
                            ?>
                            <label>Data de Nascimento</label>
                            <input type="date" class="form-control" name="data_nascimento"
                                max="<?php echo date('Y-m-d'); ?>" placeholder="Insira sua data de nascimento"
                                required />
                            <br />
                            <label>Cpf</label>
                            <input type="text" class="form-control" name="cpf" placeholder="Insira seu cpf" required />
                            <br />
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Insira seu email"
                                required />
                            <br />
                            <label>Telefone</label>
                            <input type="text" class="form-control" name="telefone" placeholder="Insira seu telefone"
                                required />
                            <br />
                            <button type="submit" class="btn btn-outline-dark">Cadastrar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>

                </div>

            </div>
        </div>
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
      window.location = 'lista_pacientes.php?search=' + search.value;
  }
</script>

</html>
