<?php

    require('../conexao.php');
    include('menuadministrador.php')

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QdgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Usuários</title>
</head>

<body>
    <div class="col d-flex flex-column h-sm-100">
        <main class="row overflow">
            <div class="col pt-4">
                <div class="card">
                    <div class="card-header bg-dark text-center text-white">
                        <br>
                        <h4 class="my-0 fw-normal"><b>
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-person-add" viewBox="0 0 16 16" style="color: Darkgoldenrod;">
                                    <path
                                        d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                    <path
                                        d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                                </svg>&nbsp;&nbsp;USUÁRIOS</b></h4><br />
                        <button type="button" class="btn btn-outline-link" style="background: Darkgoldenrod;"
                            data-bs-toggle="modal" data-bs-target="#exampleModal3">Novo Usuario</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-light text-center">
                            <thead>
                                <tr>
                                    <th scope="col">NOME USUÁRIO</th>
                                    <th scope="col">TIPO USUÁRIO</th>
                                    <th scope="col">SENHA</th>
                                    <th scope="col">AÇÃO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include '../conexao.php';
                                    $pesquisa = mysqli_query($conexao, "SELECT * FROM usuarios");
                                    $row = mysqli_num_rows($pesquisa);

                                    if ($row > 0) {
                                        while ($registro = $pesquisa->fetch_array()) {

                                            $id = $registro['idusuario'];
                                            $senha = $registro['senha'];
                                            $senhaOcultada = str_repeat('●', 6);

                                            echo '<tr>';
                                            echo '<td>' . $registro['nome_usuario'] . '</td>';
                                            echo '<td>' . $registro['tipo_usuario'] . '</td>';
                                            echo '<td><span class="password-hidden">' . $senhaOcultada . '</span></td>';
                                            echo '<td><a href="editausuario.php?idusuario=' . $id . '" data-bs-toggle="modal" data-id="' . $id . '" data-bs-target="#exampleModal3' . $id . '"><button type="button" class="btn btn-dark"><i class="bi bi-pencil-square"></i></button></a>
                                                <a href="#tabs-4" onclick="openDeleteModal(' . $id . ')"><button type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></a></td>';
                                            echo  '<div class="modal fade" id="exampleModal3' . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">';
                                            echo  '<div class="modal-dialog modal-dialog-centered">';
                                            echo '<div class="modal-content">';
                                            echo    '<div class="modal-header">';
                                            echo   '<h5 class="modal-title" id="exampleModalLabel3">Editar usuario</h5>';
                                            echo  '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                            echo  '</div>';
                                            echo '<div class="modal-body">';
                                            include 'editausuario.php';
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
                                        echo "Não há Usuarios cadastrados !";
                                        echo '</tbody>';
                                        echo '</table>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark mb-3 text-white">
                    <h5 class="modal-title" id="exampleModalLabel3">Cadastrar novo Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="cadusuarios.php" method="POST">
                        <div class="form-group">
                            <label>Nome do Usuário</label>
                            <input type="text" class="form-control" name="nome_usuario"
                                placeholder="Insira o nome do Usuário" required />
                            <br />
                            <label>Tipo Usuário</label>
                            <select class="form-control" name="tipo_usuario" onchange="showAdditionalFields(this)">
                                <option value="administrador">Administrador</option>
                                <option value="odontologo">Odontólogo</option>
                                <option value="secretaria">Secretaria</option>
                            </select>
                            <br />
                            <label>Senha</label>
                            <input type="password" class="form-control" name="senha" placeholder="Insira sua senha"
                                required />
                            <br />

                            <div id="dentistaFields" style="display: none;">
                                <label>Nome do Odontólogo</label>
                                <input type="text" class="form-control" name="nome_odontologo"
                                    placeholder="Insira o nome do Odontólogo" />
                                <br />

                                <label>Cpf</label>
                                <input type="text" class="form-control" name="cpf" placeholder="Insira o cpf" />
                                <br />

                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Insira o email" />
                                <br />

                                <label>Telefone</label>
                                <input type="text" class="form-control" name="telefone"
                                    placeholder="Insira o telefone" />
                                <br />

                                <label>Horario de Entrada</label>
                                <input type="time" class="form-control" name="horario_entrada"
                                    placeholder="Insira horario de entrada" />
                                <br />

                                <label>Horario de Saida</label>
                                <input type="time" class="form-control" name="horario_saida"
                                    placeholder="Insira o horario de saida" />
                                <br />

                                <label>Cor do Odontólogo</label>
                                <input type="color" class="form-control" name="color" />
                                <br />

                            </div>

                            <button type="submit" class="btn btn-outline-dark">Cadastrar</button>
                        </div>
                    </form>

                    <script>
                        function showAdditionalFields(selectElement) {
                            const selectedValue = selectElement.value;
                            const dentistaFields = document.getElementById('dentistaFields');
                            if (selectedValue === 'odontologo') {
                                dentistaFields.style.display = 'block';
                            } else {
                                dentistaFields.style.display = 'none';
                            }
                        }
                    </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmação de exclusão (mesma página) -->
    <div class="modal fade" id="modalExclusao" tabindex="-1" role="dialog" aria-labelledby="modalExclusaoLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalExclusaoLabel">Confirmação de Exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="closeConfirmDeleteModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <script>
                function openDeleteModal(id) {
                    var deleteLink = document.getElementById('confirmDeleteLink');
                    deleteLink.href = 'excluirusuario.php?idusuario=' + id;

                    $('#modalExclusao').modal('show');
                }

                function closeConfirmDeleteModal() {
                    $('#modalExclusao').modal('hide');
                }
                </script>

                <div class="modal-body">
                    Tem certeza de que deseja excluir este usuário?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"
                        onclick="closeConfirmDeleteModal()">Não</button>
                    <a id="confirmDeleteLink" class="btn btn-danger" href="excluirusuario.php?idusuario=">Sim</a>
                </div>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>