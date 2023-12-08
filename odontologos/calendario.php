<?php

include('../conexao.php');
include('menuodontologos.php');
include ('../verifica_sessao.php');

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

$nomeDoUsuario = $_SESSION['usuario'];

?>

<!doctype html>
<html lang="pt">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="js/moment-with-locales.js"></script>
    <!-- Bootstrap fullcalendar 5.10.1 -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js"></script>




</head>

<body>
    <div class="col d-flex flex-column h-sm-100">
        <main class="row overflow">
            <div class="col pt-4">
                <div class="container-fluid">
                    <div class="col-md-8 offset-md-2" style="text-align: center;margin-top:25px;">
                        <h2>Agenda do(a) <?php echo $nomeDoUsuario; ?></h2><br><br>
                        <div id='calendar'></div> <br />

                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var calendarEl = document.getElementById('calendar');
                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                initialView: 'dayGridMonth',
                                locale: 'pt',
                                headerToolbar: {
                                    left: 'prev,next,today',
                                    center: 'title',
                                    right: 'dayGridMonth,timeGridWeek,timeGridDay',
                                },
                                selectable: true, // Permite a seleção de datas

                                eventSources: [{
                                    url: 'listarconsultas_calendario.php',
                                    method: 'POST',
                                    extraParams: {

                                    },
                                    failure: function() {
                                        alert('Houve um erro ao carregar os eventos!');
                                    },
                                }],
                                eventClick: function(info) {
                                    $('#exampleModal').modal('hide');

                                    alert('Event: ' + info.event.title + "   " + info.event.start);
                                },
                            });

                            calendar.render();
                        });
                        </script>

                        <?php

                            include '../conexao.php';

                            $eventos = [];

                            $pesquisa = mysqli_query($conexao, "SELECT * FROM consultas C 
                                INNER JOIN pacientes p  ON p.idpaciente = c.idpaciente
                                INNER JOIN procedimento_clinico pc  ON pc.idprocedimento =  c.idprocedimento
                                INNER JOIN odontologos o ON  c.idodontologo = o.idodontologo");

                            $row = mysqli_num_rows($pesquisa);

                            if ($row > 0) {
                                while ($registro = $pesquisa->fetch_array()) {

                                    $evento = [
                                        'idconsulta' => $registro['idconsulta'],
                                        'nome_paciente' => $registro['nome_paciente'],
                                        'procedimento_clinico' => $registro['nome_procedimento'],
                                        'nome_odontologo' => $registro['nome_odontologo'],
                                        'hora' => $registro['hora'],
                                        'descricao' => $registro['descripcao'],
                                        'situacao' => $registro['situacao'],
                                    ];

                                    $eventos[] = $evento;
                                }
                            }
                        ?>

                        <!-- Modal Informações Consulta -->
                        <div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="modalInfoLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark mb-3 text-white">
                                        <h5 class="modal-title" id="modalInfoLabel">Informações da Consulta</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="infoconsultas.php" method="POST">
                                            <div class="form-group">

                                                <dl class="row">

                                                    <dt class="col-sm-3">Paciente:</dt>
                                                    <dd class="col-sm-9" id="visualizar_idpaciente"></dd>
                                                    <hr>

                                                    <dt class="col-sm-3">Odontólogo:</dt>
                                                    <dd class="col-sm-9" id="visualizar_idodontologo"></dd>
                                                    <hr>

                                                    <dt class="col-sm-3">Procedimento:</dt>
                                                    <dd class="col-sm-9" id="visualizar_idprocedimento"></dd>
                                                    <hr>

                                                    <dt class="col-sm-3">Data e Hora:</dt>
                                                    <dd class="col-sm-9" id="visualizar_start"></dd>
                                                    <hr>

                                                    <dt class="col-sm-3">Descrição:</dt>
                                                    <dd class="col-sm-9" id="visualizar_descripcao"></dd>
                                                    <hr>

                                                    <dt class="col-sm-3">Situação:</dt>
                                                    <dd class="col-sm-9" id="visualizar_situacao"></dd>
                                                    <hr>

                                                </dl>

                                            </div>
                                            <br />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var calendarEl = document.getElementById('calendar');
                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                initialView: 'dayGridMonth',
                                locale: 'pt',
                                headerToolbar: {
                                    left: 'prev,next,today',
                                    center: 'title',
                                    right: 'dayGridMonth,timeGridWeek,timeGridDay',
                                },
                                selectable: true,

                                dateClick: function(info) {
                                    var currentView = calendar.view.type;
                                    handleDateSelection(info.date, currentView);
                                },

                                eventSources: [{
                                    url: 'listarconsultas_calendario.php',
                                    method: 'POST',
                                    extraParams: {},
                                    failure: function() {
                                        alert('Houve um erro ao carregar os eventos!');
                                    },
                                }],
                                eventClick: function(info) {
                                    $('#modalMes').modal('hide');
                                    $('#modalSemana').modal('hide');

                                    // Encontre o evento correspondente no array de eventos
                                    var evento = <?php echo json_encode($eventos); ?>.find(function(
                                        e) {
                                        return e.idconsulta === info.event.id;
                                    });

                                    // Mostrar os dados do evento no modal
                                    document.getElementById("visualizar_idpaciente").innerText =
                                        evento.nome_paciente;
                                    document.getElementById("visualizar_idprocedimento").innerText =
                                        evento.procedimento_clinico;
                                    document.getElementById("visualizar_idodontologo").innerText =
                                        evento.nome_odontologo;
                                    document.getElementById("visualizar_start").innerText = info
                                        .event.start.toLocaleString();
                                    document.getElementById("visualizar_descripcao").innerText =
                                        evento.descricao;
                                    document.getElementById("visualizar_situacao").innerText =
                                        evento.situacao;

                                    $('#modalInfo').modal('show');
                                },
                            });

                            calendar.render();

                        });
                        </script>

                    </div>
        </main>
    </div>
    <script type="text/javascript" src="js/events.js"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>