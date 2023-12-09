<?php
	
	include("../../../../conexao.php");
	
	$sql_count=mysqli_query($conexao,"SELECT * from items_factura");
	$count=mysqli_num_rows($sql_count);

	if ($count==0)
	{
		echo "<script>alert('Não tem procedimentos adicionados na fatura')</script>";
		echo "<script>window.close();</script>";
		exit;
	}
		
	//Variables por GET
	$consultaId = intval($_GET['consulta']);
	$descripcion = mysqli_real_escape_string($conexao,(strip_tags($_REQUEST['descripcion'], ENT_QUOTES)));

	// Atualizar o status da consulta para 'Concluída'
	$queryUpdateConsulta = "UPDATE consultas SET situacao = ? WHERE idconsulta = ?";
	$newSituacao = "Concluída";
	$stmtUpdateConsulta = mysqli_prepare($conexao, $queryUpdateConsulta);
	mysqli_stmt_bind_param($stmtUpdateConsulta, "si", $newSituacao, $consultaId);
	mysqli_stmt_execute($stmtUpdateConsulta);

	//Fin de variables por GET
	$sql=mysqli_query($conexao, "SELECT LAST_INSERT_ID(id) as last from facturas order by id desc limit 0,1");
	$rw=mysqli_fetch_array($sql);
	$numero=$rw['last']+1;	
	$perfil=mysqli_query($conexao,"SELECT * from perfil limit 0,1");//Obtengo os dados da empresa
	$rw_perfil=mysqli_fetch_array($perfil);
	
	// Encontrar o id do paciente associado a esta consulta
	$queryIdPaciente = "SELECT idpaciente FROM consultas WHERE idconsulta = ?";
	$stmtIdPaciente = mysqli_prepare($conexao, $queryIdPaciente);
	mysqli_stmt_bind_param($stmtIdPaciente, "i", $consultaId);
	mysqli_stmt_execute($stmtIdPaciente);
	$resultIdPaciente = mysqli_stmt_get_result($stmtIdPaciente);
	$rowIdPaciente = mysqli_fetch_assoc($resultIdPaciente);
	$idPaciente = $rowIdPaciente['idpaciente'];

	// Agora que temos o id do paciente, podemos buscar seus detalhes
	$queryDetalhesPaciente = "SELECT * FROM pacientes WHERE idpaciente = ?";
	$stmtDetalhesPaciente = mysqli_prepare($conexao, $queryDetalhesPaciente);
	mysqli_stmt_bind_param($stmtDetalhesPaciente, "i", $idPaciente);
	mysqli_stmt_execute($stmtDetalhesPaciente);
	$resultDetalhesPaciente = mysqli_stmt_get_result($stmtDetalhesPaciente);
	$rowDetalhesPaciente = mysqli_fetch_assoc($resultDetalhesPaciente);
    
    include(dirname('__FILE__').'/res/factura_html.php');
    $content = ob_get_clean();


?>

<script type="text/javascript">
// Aciona a impressão após 2 segundos
setTimeout(function() {
	window.print(); // Aciona o evento de impressão
}, 2000); // Aguarda 2 segundos antes de imprimir
</script>
