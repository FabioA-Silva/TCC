<?php
// conexao database
include("../../../conexao.php");		

$search = strip_tags(trim($_GET['q'])); 

$query = mysqli_query($conexao, "SELECT * FROM pacientes WHERE nome_paciente LIKE '%$search%' LIMIT 40");

$list = array();
while ($list=mysqli_fetch_array($query)){
	$data[] = array('id' => $list['idpaciente'], 'text' => $list['nome_paciente'],'cpf' => $list['cpf'],'email' => $list['email'],'telefone' => $list['telefone']);
}
// return  json
echo json_encode($data);
?>