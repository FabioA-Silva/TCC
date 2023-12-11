<?php

    require('../conexao.php');
    require('menuadministrador.php');

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Dashboard</title>
    
</head>

<body>

    <div class="col d-flex flex-column h-sm-100 ">
        <main class=" row overflow ">
            <div class="col pt-4 ">
          
                <div class="card text-center ">
                    <div class="card-header bg-dark text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16" style="color:Darkgoldenrod ;">
                            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                        </svg>
                        <h4>DASHBOARD</h4></b><br />

                    </div>

                    <div class="container px-4 text-center" style="margin-top: 30px;">
                        <div class="row gx-5">
                            <div class="col">

                                <div class="p-2 border bg-danger text-white ">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 0 448 512">
                                        <style>
                                            svg {
                                                fill: #ffffff
                                            }
                                        </style>
                                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                                    </svg>
                                    <hr>
                                    ODONTÓLOGOS
                                    <br><br>
                                    <?php

                                        $sql = "SELECT COUNT(*) total  FROM odontologos";
                                        $result = mysqli_query($conexao, $sql);
                                        $fila = mysqli_fetch_assoc($result);
                                        echo 'Número  total de registros: ' . $fila['total'];

                                    ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-2 border bg-primary text-white ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                    </svg>
                                    <hr>
                                    PACIENTES
                                    <br><br>
                                    <?php

                                        $sql = "SELECT COUNT(*) total  FROM pacientes";
                                        $result = mysqli_query($conexao, $sql);
                                        $fila = mysqli_fetch_assoc($result);
                                        echo 'Número  total de registros: ' . $fila['total'];

                                    ?>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2 border bg-success text-white ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
                                        <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                                        <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z" />
                                    </svg>
                                    <hr>
                                    CONSULTAS
                                    <br><br>
                                    <?php

                                        $sql = "SELECT COUNT(*) total  FROM consultas";
                                        $result = mysqli_query($conexao, $sql);
                                        $fila = mysqli_fetch_assoc($result);
                                        echo 'Número  total de registros: ' . $fila['total'];

                                    ?>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2 border bg-info text-white ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                        <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                                    </svg>
                                    <hr>
                                    USUÁRIOS
                                    <br><br>
                                    <?php

                                        $sql = "SELECT COUNT(*) total  FROM usuarios";
                                        $result = mysqli_query($conexao, $sql);
                                        $fila = mysqli_fetch_assoc($result);
                                        echo 'Número  total de registros: ' . $fila['total'];

                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card" style="border: none;">
                                <div class="card-body">

                                    <div class="card-header text-center text-white" style="background-color:green; padding:10px">
                                        <br>
                                        <h4 class="my-0 fw-normal "><br><i class="fa-solid fa-teeth-open  fa-lg" style="color:white ;"></i>
                                            &nbsp;&nbsp;Procedimentos Clínicos</b></h4><br />
                                        <?php

                                            $sql = "SELECT COUNT(*) total FROM procedimento_clinico";
                                            $result = mysqli_query($conexao, $sql);
                                            $fila = mysqli_fetch_assoc($result);

                                            echo 'Número total de registros: ' . $fila['total'];

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card" style="border: none;">
                                <div class="card-body">
                                    <div class="card-header text-center text-white" style="background-color:darkblue; padding:10px">
                                        <br>
                                        <h4 class="my-0 fw-normal"><br> <i class="bi bi-calculator" style="color:white; font-size:40px"></i>
                                            &nbsp;&nbsp;Orçamentos</b></h4><br />
                                        <?php

                                            $sql = "SELECT COUNT(*) total FROM orcamentos";
                                            $result = mysqli_query($conexao, $sql);
                                            $fila = mysqli_fetch_assoc($result);
                                            echo 'Número total de registros: ' . $fila['total'];

                                        ?>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card text-center">
                            <div class="card-header " style="background-color:blue; color:white; padding:10px; font-size:20px;">
                                RENDA POR MES
                                <i class="bi bi-cash-coin" style="color:white; font-size:40px"></i>
                            </div>
                            <div class="card-body">

                                <div id="chart_div" style="width:100%; height: 350px;"></div>
                            </div>

                        </div>
                        </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">PROCEDIMENTO CLÍNICO MAIS PROCURADO</h5>
                                    <div class="grafico-container1">
                                        <div id="piechart_3d_proc" class="grafico" style="width: 100%; height: 500px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">SEXO DOS PACIENTES</h5>
                                    <div class="grafico-container1">
                                        <div id="columnchart_material" class="grafico" style="width: 100%; height: 500px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

        </main>
    </div>

    

    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['procedimento', 'numero'],
                <?php

                $consulta = mysqli_query($conexao, "SELECT COUNT(c.idprocedimento) AS count, p.nome_procedimento AS procedimento
          FROM consultas AS c
          JOIN procedimento_clinico AS p ON c.idprocedimento = p.idprocedimento
          GROUP BY c.idprocedimento");

                while ($resultado = mysqli_fetch_object($consulta)) :
                    echo "['" . $resultado->procedimento . "', " . $resultado->count . "],";
                endwhile;

                ?>
            ]);

            var options = {
                width: 519, // Defina a largura desejada
                height: 500, // Defina a altura desejada
                chartArea: {
                    left: '15%', // Ajuste o valor conforme necessário
                    top: '20%', // Ajuste o valor conforme necessário
                },
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_proc'));
            chart.draw(data, options);
        }
    </script>


    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['SEXO', 'QUANTIDADE'],
                <?php
                $consulta = mysqli_query($conexao, "SELECT count(sexo) AS count,sexo
        FROM pacientes GROUP BY sexo");
                while ($resultado = mysqli_fetch_object($consulta)) :

                    echo "['" . $resultado->sexo . "'," . $resultado->count . "],";
                endwhile;
                ?>
            ]);

            var options = {
                chart: {
                    title: 'Pacientes por Sexo',
                    legend: 'sexo',

                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Total Mes'],
                <?php
                $consulta = mysqli_query($conexao, "SELECT MONTHNAME(data) AS Mes, SUM(monto) AS Total FROM facturas f WHERE YEAR(data) = '2023'
                GROUP BY Mes ORDER BY Mes ASC");
                while ($resultado = mysqli_fetch_object($consulta)) :

                    echo "['" . $resultado->Mes . "'," . $resultado->Total . "],";
                endwhile;
                ?>
            ]);

            var options = {

                vAxis: {
                    title: 'TOTAL'
                },
                hAxis: {
                    title: 'MES'
                },
                seriesType: 'bars',
                series: {
                    5: {
                        type: 'line'
                    }
                }
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>