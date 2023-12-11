
<?php

    require('../conexao.php');
    include('menusecretaria.php');

?>

<!doctype html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Orçamentos</title>
</head>

<body>
  <div class="col d-flex flex-column h-sm-100">
      <main class="row overflow">
          <div class="col pt-4">
              <div class="card  ">
                  <div class="card-header bg-dark text-white  text-center">
                      <br />
                      <h4 class="my-0 fw-normal"><b> <i class="bi bi-calculator" style="color:Darkgoldenrod"></i>
                              </svg>&nbsp;&nbsp;ORÇAMENTOS</b></h4><br />

                      <button type="button" class="btn btn-outline-link" style="background:Darkgoldenrod; "
                         ><a href="../secretaria/orcamento_proc/novo_orcamento.php" style="text-decoration: none;color:black;">Novo orçamento</a></button>
                      
                          </button>
                      </div>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-light text-center">
                          <thead>
                              <tr>
                                  <th scope="col">NOME PACIENTE</th>
                                  <th scope="col">DATA</th>
                                  <th scope="col">DESCRIÇÃO DO ORÇAMENTO</th>
                                  <th scope="col">TOTAL</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php

                                include '../conexao.php';

                                $pesquisa = mysqli_query($conexao, "SELECT * FROM orcamentos o
                                INNER JOIN pacientes p ON p.idpaciente = o.idpaciente
                                INNER JOIN detalle d ON d.id = o.id
                                ");

                                $row = mysqli_num_rows($pesquisa);
                    
                                if ($row > 0) {
                                    while ($registro = $pesquisa->fetch_array()) {
                                        $id = $registro['id'];
                                        echo '<tr>';
                                
                                        echo '<tr>';
                                        echo '<td>' . $registro['nome_paciente'] . '</td>';
                                        $data_hora_formatada = date('d/m/Y H:i', strtotime($registro['data']));
                                        echo '<td>' . $data_hora_formatada . '</td>';
                                        echo '<td>' . $registro['descripcao_orc'] . '</td>';
                                        echo '<td> R$ ' . $registro['monto'] . '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo "Não há orçamentos cadastrados!";
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
    window.location = 'orcamentos.php?search=' + search.value;
}
</script>

</html>
                   