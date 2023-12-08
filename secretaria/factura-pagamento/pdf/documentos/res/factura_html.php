<style type="text/css">
	
	table {
		vertical-align: top;
	}

	tr {
		vertical-align: top;
	}

	td {
		vertical-align: top;
	}

	.text-center {
		text-align: center
	}

	.text-right {
		text-align: right
	}

	table th,
	td {
		font-size: 13px
	}

	.detalle td {
		border: solid 1px #bdc3c7;
		padding: 10px;
	}

	.items {
		border: solid 1px #bdc3c7;

	}

	.items td,
	th {
		padding: 5px;
	}

	.items th {
		background-color: #6c5ce7;
		color: white;

	}

	.border-bottom {
		border-bottom: solic 1px #bdc3c7;
	}

</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 11pt; font-family: arial; height: 900px;">

	<table cellspacing="0" style="width: 100%;">
		<tr>

			<td style="width: 33%; color: #444444;">
				<img style="width: 200px;" src="../../assets/img/logosistema.png" alt="Logo"><br>

			</td>
			<td style="width: 34%;">
				<strong>E-mail : </strong> <?php echo $rw_perfil['email']; ?><br>
				<strong>Telefone : </strong> <?php echo $rw_perfil['telefone']; ?><br>
				<strong>Site : </strong> <?php echo $rw_perfil['web']; ?><br>
			</td>
			<td style="width: 33%;">
				<strong><?php echo $rw_perfil['nome_comercial']; ?> </strong> <br>
				<strong>Endereço : </strong> <?php echo $rw_perfil['endereco']; ?><br>

			</td>

		</tr>
	</table>
	<br>
	<hr style="display: block;height: 1px;border: 1.5px solid darkgoldenrod; margin: 0.5em 0; padding: 0;">
	<table cellspacing="0" style="width: 100%;">
		<tr>

			
			<td style="width:40%;text-align:center;font-size:27px;color:white; background-color:#2c3e50;padding:10px; border-radius: 10px; align-items: center; ">
				FATURA 
			</td>


		</tr>
	</table>

	<br>
	<table cellspacing="0" style="width: 100%;">
		<tr>

			<td style="width: 60%; ">

			</td>
			<td style="width: 20%;color:white;background-color:darkgoldenrod;padding:5px;text-align:center ">
				<strong style="font-size:14px;">FACTURA #</strong>
			</td>
			<td style="width: 20%; color:white;background-color:darkgoldenrod;padding:5px;text-align:center ">
				<strong style="font-size:14px;">DATA</strong>
			</td>
		</tr>

		<tr>

			<td style="width: 60%;"></td>

			
			<td style="width: 20%;padding:5px;text-align:center;border:solid 1px #bdc3c7;font-size:15px">
				<?php echo $numero; ?>
			</td>
			<td style="width: 20%;padding:5px;text-align:center;border:solid 1px #bdc3c7;font-size:15px ">
				<?php echo date("d/m/Y"); ?>
			</td>
		</tr>

	</table>

	<br>
	<table cellspacing="0" style="width: 100%;" class="detalle">
		<tr>
			<td style="width: 100%; ">
				<strong style="font-size:18px;color:#2c3e50">Detalhes do cliente</strong>
			</td>
		</tr>

		<tr>
			<td style="width: 100%; ">
				<strong>Nome: </strong> <?php echo $rowDetalhesPaciente['nome_paciente']; ?><br>
				<strong>Cpf: </strong> <?php echo $rowDetalhesPaciente['cpf']; ?><br>
				<strong>E-mail: </strong> <?php echo $rowDetalhesPaciente['email']; ?><br>
				<strong>Telefone: </strong> <?php echo $rowDetalhesPaciente['telefone']; ?>
			</td>
		</tr>
	</table>

	<br>

	<table cellspacing="0" style="width:100%; margin-bottom: 10px;" class='items'>
		<tr style="width:100%;" >
		
		    <th style="text-align:left;width:40%;background-color:#2c3e50;">Descrição</th>
			<th style="text-align:center;width:20%;background-color: #2c3e50;">Quantidade</th>
			<th style="text-align:right;width:20%;background-color:#2c3e50 ;">Preço unitario</th>
			<th style="text-align:right;width:25%;background-color:#2c3e50;">Total</th>
		</tr>
		<?php
		$query = mysqli_query($conexao, "SELECT * from items_factura order by id");
		$items = 1;
		$suma = 0;
		while ($row = mysqli_fetch_array($query)) {
			$total = $row['quantidade'] * $row['preco'];
			$total = number_format($total, 2, '.', '');
		?>
			<tr>
			
				<td class="border-bottom"><?php echo $row['descripcao']; ?></td>
				<td class="border-bottom text-center"><?php echo $row['quantidade']; ?></td>
				<td class="border-bottom text-right">R$ <?php echo $row['preco']; ?></td>
				<td class="border-bottom text-right">R$ <?php echo $total; ?></td>

			</tr>
		<?php
			$items++;
			$suma += $total;
			$detalle = mysqli_query($conexao, "INSERT INTO `detalle_factura`( `descripcao`, `quantidade`, `preco`, `id_factura`) VALUES ('" . $row['descripcao'] . "', '" . $row['quantidade'] . "', '" . $row['preco'] . "', '$numero');");
		}

		//Dados da empresa
		$query_perfil = mysqli_query($conexao, "SELECT * FROM perfil WHERE id=1");
		$rw = mysqli_fetch_assoc($query_perfil);

		?>

		<tr>
			<td colspan=3 class="text-right" style="font-size: 20px;">TOTAL R$ </td>
			<td class='text-right' style="width: 20%; font-size: 20px; color: black;"><?php echo number_format($suma,2);?></td>
		</tr>
		
	</table>

	<br>

	<table cellspacing="0" style="width: 100%;" class="detalle">

		<tr>
			
			<td style="width: 100%; ">
				<strong>Nota: Aqui está o comprovante de pagamento, agradecemos pela confiança em nossos serviços. Em caso de dúvidas sobre esta fatura ou qualquer outra questão relacionada aos procedimentos realizados, não hesite em entrar em contato conosco.</strong> <br>

			</td>
		</tr>

	</table>


</page>
<?php
//GUARDANDO DADOS DA FACTURA
date_default_timezone_set("America/Sao_Paulo");
$data = date("Y-m-d H:i:s");
$sql = "INSERT INTO `facturas` (`data`, `idpaciente`, `descripcao`, `monto`, `total_neto`, `total_iva`) VALUES ( '$data', '$idPaciente', '$descripcion', '$suma','$neto','$total_iva');";
$save = mysqli_query($conexao, $sql);
$delete = mysqli_query($conexao, "DELETE from items_factura");
?>