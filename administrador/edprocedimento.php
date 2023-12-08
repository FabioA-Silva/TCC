<?php 

include '../conexao.php';
$id = $_GET['idprocedimento'];
$nome_procedimento = $_POST['nome_procedimento'];
$preco = $_POST['preco'];

$sql = "UPDATE procedimento_clinico SET nome_procedimento=?,preco=? WHERE idprocedimento=?";
$stmt=$conexao->prepare($sql) or die ($conexao->error);

if(!$stmt){
    echo "ERRO NA ATUALIZACÃO!". $conexao->$erno.'-'.$conexao->error;

}
$stmt->bind_param('sii', $nome_procedimento,$preco,$id);
$stmt->execute();
$stmt->close();
header("location:procedimentos.php#tabs-4");

?>