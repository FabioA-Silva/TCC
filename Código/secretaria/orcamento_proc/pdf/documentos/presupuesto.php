<?php
	
	
	include("../.././../../conexao.php");
	
	$sql_count=mysqli_query($conexao,"SELECT * from items ");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('Não tem procedimentos agregados ao orçamentos')</script>";
	echo "<script>window.close();</script>";
	exit;
	}
	

	$cliente=intval($_GET['cliente']);
	$descripcao = mysqli_real_escape_string($conexao, (strip_tags($_REQUEST['procedimento'], ENT_QUOTES)));

	$sql=mysqli_query($conexao, "SELECT LAST_INSERT_ID(id) as last from orcamentos order by id desc limit 0,1 ");
	$rw=mysqli_fetch_array($sql);
	$numero=$rw['last']+1;	
	$perfil=mysqli_query($conexao,"SELECT * from perfil limit 0,1"); //Obtenho os dados da empresa
	$rw_perfil=mysqli_fetch_array($perfil);
	
	$sql_cliente=mysqli_query($conexao,"SELECT* from pacientes where idpaciente='$cliente' limit 0,1"); // Obtenho os dados do cliente
	$rw_cliente=mysqli_fetch_array($sql_cliente);
   
	include(dirname(__FILE__).'/res/orcamento_html.php');
    $content = ob_get_clean();

?>

<script type="text/javascript">
// Aciona a impressão após 2 segundos
setTimeout(function() {
	window.print(); // Aciona o evento de impressão
}, 2000); // Aguarda 2 segundos antes de imprimir
</script>