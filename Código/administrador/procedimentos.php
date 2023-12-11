<?php

    require('../conexao.php');
    include('menuadministrador.php')

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="admin.css">
    <title>Procedimentos Clínicos</title>
</head>

<body>

    <div class="col d-flex flex-column h-sm-100">
        <main class="row overflow">
            <div class="col pt-4">
                <div class="card  ">
                    <div class="card-header bg-dark  text-center text-white">
                        <h4 class="my-0 fw-normal"><b><br><i class="fa-solid fa-teeth-open fa-lg"
                                style="color:Darkgoldenrod ;"></i>
                            &nbsp;&nbsp;PROCEDIMENTOS CLÍNICOS</b></h4><br />
                        <button type="button" class="btn btn-outline-link" style="background:Darkgoldenrod;"
                            data-bs-toggle="modal" data-bs-target="#exampleModal4">Novo Procedimento</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-light text-center">
                            <thead>
                                <tr>
                                    <th scope="col">NOME PROCEDIMENTO</th>
                                    <th scope="col">PREÇO R$</th>
                                    <th scope="col">AÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include '../conexao.php';
                                    $pesquisa = mysqli_query($conexao, "SELECT * FROM procedimento_clinico");
                                    $row = mysqli_num_rows($pesquisa);

                                    if ($row > 0) {
                                        while ($registro = $pesquisa->fetch_array()) {

                                        $id = $registro['idprocedimento'];
                                        echo '<tr>';

                                        echo '<td>' . $registro['nome_procedimento'] . '</td>';
                                        echo '<td> R$ ' . $registro['preco'] . '</td>';
                                        
                                        echo '<td> <a href="editaprocedimento.php?idprocedimento=' . $id . '" data-bs-toggle="modal" data-id="' . $id . '" data-bs-target="#exampleModal4' . $id . '"> <button type="button" class="btn btn-dark"><i class="bi bi-pencil-square"></i> </button> </a>  <a href="excluir_procedimento.php ?idprocedimento=' . $id . '"> <button type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> </button></td>';
                                        echo  '<div class="modal fade" id="exampleModal4' . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">';
                                        echo  '<div class="modal-dialog modal-dialog-centered">';
                                        echo '<div class="modal-content">';
                                        echo    '<div class="modal-header bg-dark text-white text-center">';
                                        echo   '<h5 class="modal-title " id="exampleModalLabel">Editar procedimento</h5>';
                                        echo  '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                        echo  '</div>';
                                        echo '<div class="modal-body">';
                                        include 'editaprocedimento.php';
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
                                        echo "Não há Procedimentos  cadastrados !";
                                        echo '</tbody>';
                                        echo '</table>';
                                    }
                                ?>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-dark mb-3 text-white">
                            <h5 class="modal-title" id="exampleModalLabel4">Cadastrar novo Procedimento</h5>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                style></button>
                        </div>
                        <div class="modal-body">
                            <form action="cadprocedimentos.php" method="POST">
                                <div class="form-group">
                                    <label>Nome do Procedimento</label>
                                    <input type="text" class="form-control" name="nome_procedimento"
                                        placeholder="Insira o nome do Procedimento" required />
                                    <br />
                                    <label>Preço</label>
                                    <input type="text" class="form-control" name="preco" placeholder="Insira o Preço"
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
    </div>
    </div>

    </div>

    </main>
    </div>
    ]
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    
</body>

</html>