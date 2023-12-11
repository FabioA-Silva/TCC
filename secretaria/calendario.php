<?php

    include('../conexao.php');
    include('menusecretaria.php');
    include ('../verifica_sessao.php');

    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit;
    }

?>

<!doctype html>
<html lang="pt">

<head>
    <title>Calendário</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="js/moment-with-locales.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js"></script>
</head>

<body>
    <div class="col d-flex flex-column h-sm-100">
        <main class="row overflow">
            <div class="col pt-4">
                <div class="container-fluid">
                    <div class="col-md-8 offset-md-2" style="text-align: center; margin-top: 25px;">
                        <h2>Agenda dos Odontólogos</h2><br><br>
                        <div id='calendar'></div> <br/>

                        <!-- Modal para semana -->
                        <div class="modal fade" id="modalSemana" tabindex="-1" aria-labelledby="modalSemanaLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark mb-3 text-white">
                                        <h5 class="modal-title" id="modalSemanaLabel">Agendar Consulta</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="cadconsultas.php" method="POST">
                                            
                                            <div class="form-group">
                                                <label>Nome Paciente</label>
                                                <select class="form-select form-select-sm" name="idpaciente"
                                                    aria-label=".form-select-sm example">
                                                    <option selected>Selecione o Nome do Paciente</option>
                                                    <?php
                                                    $mysqli = new mysqli('localhost', 'root', '', 'tcc');

                                                    $query = $mysqli->query("SELECT * FROM pacientes");

                                                    while ($paciente = mysqli_fetch_array($query)) {
                                                        echo '<option value="' . $paciente['idpaciente'] . '">' . $paciente['nome_paciente'] . ' </option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <br />

                                            <label>Procedimento Clínico</label>
                                            <select class="form-select form-select-sm" name="idprocedimento"
                                                aria-label=".form-select-sm example">
                                                <option selected>Selecione o Procedimento a Realizar</option>
                                                <?php
                                                $mysqli = new mysqli('localhost', 'root', '', 'tcc');

                                                $query = $mysqli->query("SELECT * FROM procedimento_clinico");

                                                while ($procedimento = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $procedimento['idprocedimento'] . '">' . $procedimento['nome_procedimento'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <br />

                                            <label>Odontólogo</label>
                                            <select class="form-select form-select-sm" name="idodontologo"
                                                aria-label=".form-select-sm example" onchange="updateColor(this)">
                                                <option selected>Selecione o Nome do Odontólogo</option>
                                                <?php
                                                    $mysqli = new mysqli('localhost', 'root', '', 'tcc');

                                                    $query = $mysqli->query("SELECT * FROM odontologos");

                                                    while ($odontologo = mysqli_fetch_array($query)) {
                                                        echo '<option value="' . $odontologo['idodontologo'] . '" data-color="' . $odontologo['color'] . '">' . $odontologo['nome_odontologo'] . '</option>';
                                                    }
                                                ?>
                                            </select>
                                            <input type="hidden" name="cor_evento" id="cor_evento" value="#ffffff">
                                            <br />

                                            <?php

                                            date_default_timezone_set("America/Sao_Paulo");
                                            $today = date("Y-m-d");
                                            $hora = date('h:i:s A');

                                            ?>

                                            <label>Data da Consulta</label>
                                            <input type="date" class="form-control" name="data_consulta"
                                                id="data_consulta_semana" placeholder="Seleciona a data"
                                                min="<?= $today; ?>" required />
                                            <br />

                                            <label>Hora da Consulta</label>
                                            <input type="time" class="form-control" name="hora" id="hora_semana"
                                                placeholder="Insira a hora da Consulta" required />
                                            <br />

                                            <label for="situacao">Situação Consulta</label>
                                            <select class="form-select form-select-sm" id="situacao" name="situacao" required>
                                                <option value="" selected>Selecione o Status da Consulta</option>
                                                <option value="Pendente">Pendente</option>
                                            </select>
                                            <br />

                                            <label>Título da Consulta</label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Insira título do evento" required />
                                            <br />

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-dark">Cadastrar</button>
                                                <button type="button" class="btn btn-outline-danger"
                                                    data-bs-dismiss="modal">Fechar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Mês -->
                        <div class="modal fade" id="modalMes" tabindex="-1" aria-labelledby="modalMesLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark mb-3 text-white">
                                        <h5 class="modal-title" id="modalMesLabel">Agendar Consulta</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="cadconsultas.php" method="POST">
                                            <div class="form-group">
                                                <label>Nome Paciente</label>
                                                <select class="form-select form-select-sm" name="idpaciente"
                                                    aria-label=".form-select-sm example">
                                                    <option selected>Selecione o Nome do Paciente</option>
                                                    <?php
                                                    $mysqli = new mysqli('localhost', 'root', '', 'tcc');

                                                    $query = $mysqli->query("SELECT * FROM pacientes");

                                                    while ($paciente = mysqli_fetch_array($query)) {
                                                        echo '<option value="' . $paciente['idpaciente'] . '">' . $paciente['nome_paciente'] . ' </option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <br />

                                            <label>Procedimento Clinico</label>
                                            <select class="form-select form-select-sm" name="idprocedimento"
                                                aria-label=".form-select-sm example">
                                                <option selected>Selecione o Procedimento a Realizar</option>
                                                <?php
                                                $mysqli = new mysqli('localhost', 'root', '', 'tcc');

                                                $query = $mysqli->query("SELECT * FROM procedimento_clinico");

                                                while ($procedimento = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $procedimento['idprocedimento'] . '">' . $procedimento['nome_procedimento'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <br />

                                            <label>Odontólogo</label>
                                            <select class="form-select form-select-sm" name="idodontologo"
                                                aria-label=".form-select-sm example" onchange="updateColor2(this)">
                                                <option selected>Selecione o Nome do Odontólogo</option>
                                                <?php
                                                    $query = $conexao->query("SELECT * FROM odontologos");

                                                    while ($odontologo = mysqli_fetch_array($query)) {
                                                        echo '<option value="' . $odontologo['idodontologo'] . '" data-color="' . $odontologo['color'] . '">' . $odontologo['nome_odontologo'] . '</option>';
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
                                            <input type="date" class="form-control form-select-sm" name="data_consulta"
                                                id="data_consulta_mes" required />
                                            <br />

                                            <label>Hora da Consulta</label>
                                            <select class="form-select form-select-sm" name="hora" id="hora_semana" required>
                                                <option value="" disabled selected>Selecione a Hora</option>
                                                <?php
                                                for ($i = 0; $i < 24; $i++) {
                                                    for ($j = 0; $j < 60; $j += 30) {
                                                        $hour = str_pad($i, 2, '0', STR_PAD_LEFT);
                                                        $minute = str_pad($j, 2, '0', STR_PAD_LEFT);
                                                        $time = "$hour:$minute";
                                                        echo "<option value='$time'>$time</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <br />

                                            <label for="situacao">Situação Consulta</label>
                                            <select class="form-select form-select-sm" id="situacao" name="situacao" required>
                                                <option value="" selected>Selecione o Status da Consulta</option>
                                                <option value="Pendente">Pendente</option>
                                            </select>
                                            <br />

                                            <label>Título da Consulta</label>
                                            <input type="text" class="form-control form-select-sm" name="title"
                                                placeholder="Insira título do evento" required />
                                            <br />

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-dark">Cadastrar</button>
                                                <button type="button" class="btn btn-outline-danger"
                                                    data-bs-dismiss="modal">Fechar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function updateColor(select) {
                                var selectedOption = select.options[select.selectedIndex];
                                var corOdontologo = selectedOption.getAttribute(
                                    'data-color'); // Adicione um atributo data-color ao option com a cor do odontólogo
                                document.getElementById('cor_evento').value =
                                    corOdontologo; // Atualiza o valor do campo oculto com a cor selecionada
                            }

                            function updateColor2(select) {
                                var selectedOption = select.options[select.selectedIndex];
                                var corOdontologo = selectedOption.getAttribute('data-color');
                                document.getElementById('cor_evento2').value = corOdontologo;
                            }
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
                                    url: 'listarconsultas.php',
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

                            function handleDateSelection(date, currentView) {
                                var selectedDate = date;
                                var currentDate = new Date();
                                currentDate.setHours(0, 0, 0, 0);

                                if (selectedDate >= currentDate) {
                                    if (currentView === 'dayGridMonth') {
                                        var inputDate = document.getElementById("data_consulta_mes");
                                        var dateStr = formatDate(selectedDate);
                                        inputDate.min = dateStr;
                                        inputDate.max = dateStr;
                                        inputDate.value = dateStr;
                                        $('#modalMes').modal('show');
                                    } else if (currentView === 'timeGridWeek' || currentView ===
                                        'timeGridDay') {
                                        var inputDate = document.getElementById("data_consulta_semana");
                                        var inputTime = document.getElementById("hora_semana");
                                        var dateStr = formatDate(selectedDate);
                                        var timeStr = formatTime(selectedDate);
                                        inputDate.min = dateStr;
                                        inputDate.max = dateStr;
                                        inputDate.value = dateStr;
                                        inputTime.value = timeStr;
                                        inputTime.setAttribute('readonly', true);
                                        $('#modalSemana').modal('show');
                                    }
                                } else {
                                    alert(
                                        'Você só pode agendar consultas para datas iguais ou posteriores à data atual.'
                                    );
                                }
                            }

                            function formatDate(date) {
                                var year = date.getFullYear();
                                var month = (date.getMonth() + 1).toString().padStart(2, '0');
                                var day = date.getDate().toString().padStart(2, '0');
                                return year + '-' + month + '-' + day;
                            }

                            function formatTime(date) {
                                var hours = date.getHours().toString().padStart(2, '0');
                                var minutes = date.getMinutes().toString().padStart(2, '0');
                                return hours + ':' + minutes;
                            }
                        });

                        
                        </script>

                    </div>
                </div>
            </div>
        </main>
    </div>
    <script type="text/javascript" src="js/events.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>