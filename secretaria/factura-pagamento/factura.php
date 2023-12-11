<?php

	require_once("../../conexao.php");
	
	$query_perfil=mysqli_query($conexao,"SELECT * from perfil where id=1");
	$rw=mysqli_fetch_assoc($query_perfil);
	$sql=mysqli_query($conexao, "SELECT LAST_INSERT_ID(id) as last from facturas order by id desc limit 0,1 ");
	$rws=mysqli_fetch_array($sql);
	$numero = $rws['last'] + 1;

?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Fatura</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <link href="assets/css/style.css" rel="stylesheet" />

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />

	<style>

		.voltar-btn {
			position: absolute;
			top: 20px;
			left: 30px;
			text-decoration: none;
			color: white;
			padding: 10px 20px;
			border: 2px solid red;
			border-radius: 4px;
			background-color: red;
			transition: transform 0.3s, background-color 0.3s;
		}

		.voltar-btn:hover {
			background-color: white;
			color: red;
			transform: scale(1.1);
		}

	</style>

</head>
<body >

	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<a href="../pagamento.php" class="voltar-btn">← Voltar</a>
		</div>
	</div>
	
	<div class="container outer-section">
		
		
       <form class="form-horizontal" role="form" id="datos_presupuesto" method="post">
        <div id="print-area">
                  <div class="row pad-top font-big">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <img src="assets/img/logosistema.png" style="width: 200px;" alt="Logo sistema" />
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <strong>E-mail : </strong> <?php echo $rw['email'];?>
                    <br />
                    <strong>Telefone :</strong> <?php echo $rw['telefone'];?> <br />
					<strong>Site :</strong> <?php echo $rw['web'];?> 
                   
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <strong><?php echo $rw['nome_comercial'];?>  </strong>
                    <br />
                    Endereço : <?php echo $rw['endereco'];?> 
                </div>

            </div>
            
			<div class="row ">
				<hr style="display: block;height: 1px;border: 1.5px solid darkgoldenrod;margin: 0.5em 0;padding: 0;">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<h2>Detalhes da consulta :</h2>
					<select class="consulta form-control" name="consulta" id="consulta" required>
						<option value="">Selecione a consulta</option>
						<?php
							$currentDate = date("Y-m-d");
							$situacao = "Pendente";

							$query = "SELECT idconsulta, title FROM consultas WHERE DATE(data_consulta) = '$currentDate' AND situacao = '$situacao'";
							$result = mysqli_query($conexao, $query);
							
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<option value="' . $row['idconsulta'] . '">' . $row['title'] . '</option>';
							}
						?>
					</select>

					<h4><strong>Nome: </strong><span id="nome_paciente"></span></h4>
					<h4><strong>Cpf: </strong><span id="cpf"></span></h4>
					<h4><strong>E-mail: </strong><span id="email"></span></h4>
					<h4><strong>Telefone: </strong><span id="telefone"></span></h4>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<h2>Detalhes da Fatura :</h2>
					<h4><strong>Fatura #: </strong><?php echo $numero;?></h4>
					<h4><strong>Data: </strong> <?php echo date("d/m/Y");?></h4>

					<textarea class="form-control" id="descripcion" name="descripcao" placeholder="Descrição da Fatura"></textarea>
				</div>
			</div>
            
         
            <div class="row">
			<hr />
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped  table-hover">
                            <thead>
                                <tr>
                                 
									<th class='text-center'>Descrição</th>
									<th class='text-center'>Quantidade</th>
                                    <th class='text-right'>Preço Unitário</th>
                                    <th class='text-right'>Total</th>
									<th class='text-right'></th>
                                </tr>
                            </thead>
                            <tbody class='items'>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
		
        </div>
       <div class="row"> <hr /></div>
        <div class="row pad-bottom pull-right">
		
            <div class="col-lg-12 col-md-12 col-sm-12">
                <button type="submit" class="btn btn-success " style="background-color:black;color:white">Gerar Fatura</button>
                            
            </div>
        </div>
		</form>
    </div>
   
</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$(".consulta").change(function() {
			var consultaId = $(this).val();

			// Requisição AJAX para buscar os dados do paciente
			$.ajax({
				url: "ajax/dados_paciente.php",
				type: "GET",
				data: { consultaId: consultaId },
				dataType: "json",
				success: function(data) {
					$('#nome_paciente').text(data.paciente_nome);
					$('#cpf').text(data.paciente_cpf);
					$('#email').text(data.paciente_email);
					$('#telefone').text(data.paciente_telefone);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log("Erro na requisição AJAX: " + textStatus, errorThrown);
				}
			});

			// Requisição AJAX para buscar os detalhes do procedimento da consulta selecionada
			const quant = 1;

			$.ajax({
				url: "ajax/dados_procedimento.php",
				type: "GET",
				data: { consultaId: consultaId },
				dataType: "json",
				success: function(data) {
					// Limpa o tbody da tabela
					$('.items').empty();

					// Verifica se a resposta não está vazia
					if (data && Object.keys(data).length !== 0) {
						
						var precoFormatado = parseFloat(data.preco).toFixed(2); // Formatando o preço para duas casas decimais

						var row = '<tr>' +
							'<td class="text-center">' + data.descricao + '</td>' +
							'<td class="text-center">' + quant + '</td>' + // Quantidade fixa como 1
							'<td class="text-right">R$ ' + precoFormatado + '</td>' +
							'<td class="text-right">R$ ' + precoFormatado + '</td>' + // Total igual ao preço unitário
							'<td class="text-right"></td>' +
							'</tr>';

						// Adiciona a linha à tabela
						$('.items').append(row);
					} else {
						// Exibe uma mensagem caso não haja dados
						var emptyRow = '<tr><td colspan="5" class="text-center">Nenhum dado encontrado</td></tr>';
						$('.items').append(emptyRow);
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log("Erro na requisição AJAX: " + textStatus, errorThrown);
				}
			});

			// Desabilitar a opção "Selecione a consulta" após uma seleção
			$(this).find("option[value='']").prop('disabled', true);
		});
	});

	$("#datos_presupuesto").submit(function(){

		var consulta = $("#consulta").val();
		var descripcion = $("#descripcion").val();
		  
		if (consulta > 0)
		{
			VentanaCentrada('../factura-pagamento/pdf/documentos/pagamento.php?consulta='+consulta+'&descripcion='+descripcion,'factura','','1024','768','true');	
		} else {
			alert("Seleciona a Consulta");
			return false;
		}
		 
	 });
		
</script>
</html>
