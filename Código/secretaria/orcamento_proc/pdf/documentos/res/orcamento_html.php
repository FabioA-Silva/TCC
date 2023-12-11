<style type="text/css">
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }

.text-center{
	text-align:center
}
.text-right{
	text-align:right
}
table th, td{
	font-size:13px
}
.detalle td{
	border:solid 1px #bdc3c7;
	padding:10px;
}
.items{
	border:solid 1px #bdc3c7;
	 
}
.items td, th{
	padding:10px;
}
.items th{
	background-color: #3498db;
	color:white;
	
}
.border-bottom{
	border-bottom: solic 1px #bdc3c7;
}

.invisivel {
	display: none;
}


</style>

<page backtop="15mm" backbottom="100px" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial; height: 1200px;">

	<table cellspacing="0" style="width: 100%;">
		<tr>

			<td style="width: 33%; color: #444444;">
				<img style="width:150px;" src="../../img/logosistema.png" alt="Logo"><br>
			</td>


			<td style="width: 34%;">
				<strong>E-mail : </strong> <?php echo $rw_perfil['email']; ?><br>
				<strong>Telefone : </strong> <?php echo $rw_perfil['telefone']; ?><br>
				<strong>Sitio web : </strong> <?php echo $rw_perfil['web']; ?><br>
			</td>
			<td style="width: 33%;">
				<strong><?php echo $rw_perfil['nome_comercial']; ?> </strong> <br>
				<strong>Endereço : </strong> <?php echo $rw_perfil['endereco']; ?><br>
			</td>

		</tr>
	</table>
	<br>
	<hr style="display: block;height: 1px;border: 1.5px solid #bdc3c7;    margin: 0.5em 0;    padding: 0;">
	<table cellspacing="0" style="width: 100%;">
		<tr>


			<td style="width: 100%;text-align:center;font-size:27px;color:white; background-color: darkgoldenrod;padding:10px; border-radius: 10px ">
				ORÇAMENTO DE PROCEDIMENTOS CLINICOS
			</td>


		</tr>
	</table>

	<br>
	<table cellspacing="0" style="width: 100%;">
		<tr>

			<td style="width: 60%; ">

			</td>
			<td style="width: 20%;color:white;background-color:black;padding:5px;text-align:center ">
				<strong style="font-size:14px;">ORÇAMENTO # </strong>
			</td>
			<td style="width: 20%; color:white;background-color:black;padding:5px;text-align:center ">
				<strong style="font-size:14px;">DATA</strong>
			</td>
		</tr>

		<tr>

			<td style="width: 60%; ">

			</td>
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
				<strong>Nome:</strong> <?php echo $rw_cliente['nome_paciente']; ?><br>
				<strong>Cpf:</strong> <?php echo $rw_cliente['cpf']; ?><br>
				<strong>E-mail:</strong> <?php echo $rw_cliente['email']; ?><br>
				<strong>Teléfone:</strong> <?php echo $rw_cliente['telefone']; ?>
			</td>
		</tr>
	</table>

	<br>

<table cellspacing="0" style="width: 100%;" class='items'>
    <thead>
        <tr>
            <th style="text-align:left;width:40%;background-color: black; color: white; padding: 10px;">Descrição procedimento</th>
            <th style="text-align:center;width:20%;background-color: black; color: white; padding: 10px;">Quantidade</th>
            <th style="text-align:right;width:20%;background-color: black; color: white; padding: 10px;">Preço unitário</th>
            <th style="text-align:right;width:20%;background-color: black; color: white; padding: 10px;">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($conexao, "SELECT * from items order by id");
        $total_procedimentos = 20; // Defina o número total esperado de procedimentos

        $items = 0; // Contador para os procedimentos listados
        $suma = 0;

        while ($row = mysqli_fetch_array($query)) {
            $total = $row['quantidade'] * $row['preco'];
            $total = number_format($total, 2, '.', '');
            ?>
            <tr>
                <td style="border-bottom: 1px solid #bdc3c7; padding: 10px;"><?php echo $row['descripcao_proc']; ?></td>
                <td style="border-bottom: 1px solid #bdc3c7; text-align: center; padding: 10px;"><?php echo $row['quantidade']; ?></td>
                <td style="border-bottom: 1px solid #bdc3c7; text-align: right; padding: 10px;"><?php echo $row['preco']; ?></td>
                <td style="border-bottom: 1px solid #bdc3c7; text-align: right; padding: 10px;"><?php echo $total; ?></td>
            </tr>
            <?php
            $items++;
            $suma += $total;
            $detalle = mysqli_query($conexao, "INSERT INTO `detalle` (`descripcao_proc`, `quantidade`, `preco`, `id_orcamento`) VALUES ( '" . $row['descripcao_proc'] . "', '" . $row['quantidade'] . "', '" . $row['preco'] . "', '$numero');");
        }

        // Se houver apenas um procedimento, adiciona um procedimento fictício
        if ($items === 1) {
            ?>
            <tr class="invisivel">
                <td style="border-bottom: 1px solid #bdc3c7; padding: 10px;">Procedimento Fictício</td>
                <td style="border-bottom: 1px solid #bdc3c7; text-align: center; padding: 10px;">1</td>
                <td style="border-bottom: 1px solid #bdc3c7; text-align: right; padding: 10px;">0.00</td>
                <td style="border-bottom: 1px solid #bdc3c7; text-align: right; padding: 10px;">0.00</td>
            </tr>
            <?php
        }

        // Adicionando linhas vazias se o total de procedimentos for menor que o esperado
        while ($items < $total_procedimentos) {
            ?>
            <tr>
                <td style="border-bottom: 1px solid #bdc3c7; padding: 10px;">&nbsp;</td>
                <td style="border-bottom: 1px solid #bdc3c7; padding: 10px;">&nbsp;</td>
                <td style="border-bottom: 1px solid #bdc3c7; padding: 10px;">&nbsp;</td>
                <td style="border-bottom: 1px solid #bdc3c7; padding: 10px;">&nbsp;</td>
            </tr>
            <?php
            $items++;
        }
        ?>
    </tbody>
    <tfoot>
        <!-- Este bloco de código exibirá o total independentemente do número de procedimentos -->
        <tr>
            <td colspan="3" style="text-align: right; font-size: 24px; color: black; padding: 10px;">TOTAL</td>
            <td style="text-align: right; font-size: 24px; color: black; padding: 10px;">R$<?php echo number_format($suma, 2); ?></td>
        </tr>
        <!-- Adicione sua mensagem de nota aqui -->
        <tr>
            <td colspan="4" style="text-align: left; font-size: 14px; color: black; padding: 10px;">
                <strong>Nota:</strong> Este orçamento não é um contrato ou uma fatura. É a nossa melhor estimativa do preço total para a realização dos procedimentos solicitados. O orçamento pode estar sujeito a mudanças se ultrapassar o tempo de validade. O prazo de validade é de 30 dias contados a partir da emissão do orçamento.
            </td>
        </tr>
    </tfoot>
</table>

<br>

</page>

<?php

//Guardando os dados do orcamento
date_default_timezone_set("America/Sao_Paulo");
$data = date("Y-m-d H:i:s");
$sql = "INSERT INTO `orcamentos` (`data`, `idpaciente`, `descripcao_orc`, `monto`) VALUES ( '$data', '$cliente', '$descripcao', '$suma');";
$save = mysqli_query($conexao, $sql);
$delete = mysqli_query($conexao, "DELETE from items");
?>