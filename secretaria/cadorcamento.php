<?php
include '../conexao.php';

$idpaciente = $_POST['idpaciente'];
$data_orcamento = $_POST['data_orcamento'];
$idprocedimento = $_POST['idprocedimento'];
$preco_unitario = $_POST['preco_unitario'];
$quantidade = $_POST['quantidade'];
$preco_total = $_POST['preco_total'];
$query = $conexao->query("SELECT * FROM consultas WHERE idpaciente = '$idpaciente'");

if (mysqli_num_rows($query) > 0) {
?>

  <script>
    window.location.href = "lista_consultas.php";
    alert("Não foi posivel cadastrar! a consulta já existe");
  </script>
<?php
  exit();
} else
  $sql = ("INSERT INTO orcamentos(idpaciente,data_orcamento,idprocedimento,preco_unitario,quantidade,preco_total) 
  VALUES ('$idpaciente','$data_orcamento','$idprocedimento','$preco_unitario','$quantidade','$preco_total')");
if (mysqli_query($conexao, $sql)) {
?>
  <script>
    window.location.href = "orcamentos.php";
    alert("Cadastro de orçamento realizado com sucesso");
  </script>
<?php
  exit();
} else {
?>
  <script>
    window.location.href = "orcamentos.php";
    alert("Ocurriu um error ao cadastrar!!");
  </script>
<?php
  exit();
}
