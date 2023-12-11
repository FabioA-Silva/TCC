<?php

    require('../conexao.php');
    include('menusecretaria.php');

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Odontólogos</title>
</head>

<body>
    <div class="col d-flex flex-column h-sm-100">
        <main class="row overflow">
            <div class="col pt-4">
                <div class="card">
                    <div class="card-header bg-dark text-white  text-center ">
                        <br>
                        <h4 class="my-0 fw-normal"><b><i class="fa-solid fa-user-doctor fa-lg" style="color:Darkgoldenrod ;"></i>
                                &nbsp;&nbsp;ODONTÓLOGOS</b></h4><br />

                    </div>
                    <div class="table-responsive">
                        <table class="table table-light text-center">
                            <thead>
                                <tr>

                                    <th scope="col">NOME</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">E-MAIL</th>
                                    <th scope="col">TELEFONE</th>
                                    <th scope="col">ENTRADA</th>
                                    <th scope="col">SAIDA</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    include '../conexao.php';

                                    $pesquisa = mysqli_query($conexao, "SELECT * FROM odontologos");
                                    $row = mysqli_num_rows($pesquisa);

                                    if ($row > 0) {
                                        while ($registro = $pesquisa->fetch_array()) {

                                            $id = $registro['idodontologo'];
                                            echo '<tr>';
                                            echo '<td>' . $registro['nome_odontologo'] . '</td>';
                                            echo '<td>' . $registro['cpf'] . '</td>';
                                            echo '<td>' . $registro['email'] . '</td>';
                                            echo '<td>' . $registro['telefone'] . '</td>';
                                            echo '<td>' . $registro['horario_entrada'] . '</td>';
                                            echo '<td>' . $registro['horario_saida'] . '</td>';

                                            echo  '<div class="modal fade" id="exampleModal2' . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">';
                                            echo  '<div class="modal-dialog modal-dialog-centered">';
                                            echo '<div class="modal-content">';
                                            echo    '<div class="modal-header">';

                                            echo  '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                            echo  '</div>';
                                            echo '<div class="modal-body">';

                                            echo '</div>';
                                            echo '<div class="modal-footer">';
                                            echo ' <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                        echo '</tbody>';
                                        echo '</table>';
                                    } else {
                                        echo "Não há Odontologos cadastrados !";
                                        echo '</tbody>';
                                        echo '</table>';
                                    }

                                ?>

                    </div>
                </div>
            </div>
    </div>
    </div>

    </div>

    </main>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>