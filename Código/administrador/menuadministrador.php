<?php

    session_start();

    require('../conexao.php');
    require('../verifica_sessao.php');

    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit;
    }

    $nomeDoUsuario = $_SESSION['usuario'];

?>

<!doctype html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="admin.css" media="screen" />

    <style>

        .fixed-sidebar {

            position: fixed;
            height: 100%;
            overflow-y: auto;

        }

        @media (min-width:578px) {

            .h-sm-100 {
                height: auto;

            }

        }

        @media (max-width: 768px) {
            .fixed-sidebar {
                position: static;
                height: auto;
            }
        }

        #sair {
            margin-bottom: 20px;
        }

        #menu li {
                display: flex;
                align-items: center;
                margin-bottom: 7px;
            }

        #menu li i {
            width: 24px;
            height: 24px; 
            vertical-align: middle; 
        }


    </style>

    <title>Dental System Admin</title>
</head>

<body>
    </nav>
    <div class="container-fluid overflow-hidden">
        <div class="row vh-100 overflow-auto">
            <div class="col-12 col-sm-3 col-xl-2 px-sm-2 px-0  d-flex sticky-top bg-dark fixed-sidebar">
                <div
                    class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
                    <br>

                    <span class="fs-5"><i class="fa-sharp fa-solid fa-tooth fa-beat" style="color:white"></i> <span
                            class="d-none d-sm-inline  " style="color: Darkgoldenrod;">Dental System</span></span>
                    <br>

                    <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start"
                        id="menu">

                        <li class="nav-item">
                            <a href="homeadministrador.php" class="nav-link px-sm-0 px-2">
                                <i class="fs-5 bi-house" style="color:Darkgoldenrod"></i><span
                                    class="ms-1 d-none d-sm-inline text-white">&nbsp;Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="dashboard.php" class="nav-link px-sm-0 px-2">
                                <i class="fs-5 bi-speedometer2" style="color:Darkgoldenrod"></i><span
                                    class="ms-1 d-none d-sm-inline text-white ">&nbsp;Dashboard</span> </a>
                        </li>
                        <li>
                            <a href="odontologos.php" class="nav-link px-sm-0 px-2">
                                <i class="fa-solid fa-user-doctor" style="color:Darkgoldenrod"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white ">&nbsp;&nbsp;&nbsp;Odontológos</span></a>
                        </li>
                        <li>
                            <a href="procedimentos.php" class="nav-link px-sm-0 px-2">
                                <i class="fa-solid fa-teeth-open" style="color:Darkgoldenrod"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white ">&nbsp;&nbsp;&nbsp;Procedimentos</span></a>
                        </li>
                        <li>
                            <a href="calendario.php" class="nav-link px-sm-0 px-2">
                                <i class="bi bi-calendar-week" style="color:Darkgoldenrod"></i><span
                                    class="ms-1 d-none d-sm-inline text-white">&nbsp;Calendario </span></a>
                        </li>
                        <li>
                            <a href="lista_pacientes.php" class="nav-link px-sm-0 px-2">
                                <i class="fs-5 bi-people" style="color:Darkgoldenrod"></i><span
                                    class="ms-1 d-none d-sm-inline text-white "> Lista Pacientes</span> </a>
                        </li>
                        <li>
                            <a href="lista_consulta.php" class="nav-link px-sm-0 px-2">
                                <i class="bi bi-list-columns-reverse" style="color:Darkgoldenrod"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white">Lista Consultas</span></a>
                        </li>
                        <li>
                            <a href="usuarios.php" class="nav-link px-sm-0 px-2">
                                <i class="bi bi-person-fill-add" style="color:Darkgoldenrod"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white">Gerenciar Acessos</span></a>
                        </li>
                    </ul>
                    <hr>

                    <footer>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-outline-warning" id="sair"><a href="../sair.php"
                                    class="text-white">Sair</a></button>
                            <h6 class="ms-2 text-white nome" style="line-height: 40px;">
                                <span>&nbsp;<?php echo $nomeDoUsuario ?></span>
                            </h6>
                        </div>
                    </footer>

                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js"
                integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
                integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
                crossorigin="anonymous"></script>

</body>

</html>