<?php

	require '../../conexao.php';

	//usei o _FILE_ ao invés de _DIR_ devido a algunas questões de retrocompatibilidade

	define('ROOT_PATH', dirname(__FILE__));

	$query_perfil = mysqli_query($conexao, "SELECT * from perfil where id=1");
	$rw = mysqli_fetch_assoc($query_perfil);
	$sql = mysqli_query($conexao, "SELECT LAST_INSERT_ID(id) as last from orcamentos order by id desc limit 0,1 ");
	$rws = mysqli_fetch_array($sql);
	$numero = $rws['last'] + 1;

?>

<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Orçamento</title>
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
	<link rel=icon href='img/logohome.png' sizes="50x50" type="image/png">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />

	<style>

		.alert {
			padding: 10px;
		}

		.mt-3 {
			margin-top: 1rem;
		}

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

<body>

	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<a href="../orcamentos.php" class="voltar-btn">← Voltar</a>
		</div>
	</div>
		
	<div class="container outer-section">

		<form class="form-horizontal" role="form" id="datos_presupuesto" method="post">
			<div id="print-area">
				<div class="row pad-top font-big">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<img src="img/logosistema.png" style="width: 200px;" alt="Logo sistema" /></a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<strong>E-mail : </strong> <?php echo $rw['email']; ?>
						<br />
						<strong>Telefone :</strong> <?php echo $rw['telefone']; ?> <br />
						<strong>Site :</strong> <?php echo $rw['web']; ?>

					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<strong><?php echo $rw['nome_comercial']; ?> </strong>
						<br />
						Endereço : <?php echo $rw['endereco']; ?>
					</div>

				</div>

				<div class="row ">
					<hr />
					<div class="col-lg-6 col-md-6 col-sm-6">
						<h2>Detalhes do Cliente:</h2>
						<select class="cliente form-control" name="cliente" id="cliente" required>
							<option value="">Selecione o Cliente</option>
						</select>

						<h4><strong>Cpf: </strong><span id="cpf"></span></h4>
						<h4><strong>E-mail: </strong><span id="email"></span></h4>
						<h4><strong>Telefone: </strong><span id="telefone"></span></h4>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<h2>Detalhes do Orçamento:</h2>
						<h4><strong>Orçamento #: </strong><?php echo $numero; ?></h4>
						<?php
						date_default_timezone_set("America/Sao_Paulo");
						
						?>
						<h4><strong>Data: </strong> <?php echo date("d/m/Y ")." - ".date( "H:i A"); ?></h4>


						<textarea class="form-control" id="procedimento2" name="descripcao_orc" required placeholder="Insira a descrição do orçamento"></textarea>


					</div>
				</div>


				<div class="row">
					<hr />
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="table-responsive">
							<table class="table table-striped  table-hover">
								<thead>
									<tr>
										<th class='text-center'>Items</th>
										<th>Descrição</th>
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
			<div class="row">
				<hr />
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
					<div id="mensagemAlerta" class="text-center" style="display: none; color: red; font-size: 20px; margin-bottom: 10px;">
						Você atingiu o número máximo de procedimentos (7) permitidos.
					</div>
			</div>
			<div class="row pad-bottom pull-right">

				<div class="col-lg-12 col-md-12 col-sm-12">
			
					<button type="submit" class="btn btn-success" style="background-color: darkgoldenrod;">Gerar Orçamento</button>

				</div>

			</div>

		</form>
	</div>
	<form class="form-horizontal" name="guardar_item" id="guardar_item">
		<!-- Modal -->
		<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Novo Item</h4>
					</div>
					<div class="modal-body">

						<div class="row">
							<div class="col-md-12">

								<label>Procedimento Clínico</label>
								<select class=" form-control" id="procedimento" name="procedimento" required>
									<option selected>Selecione o Procedimento</option>
									<?php
										$mysqli = new mysqli('localhost', 'root', '', 'tcc');
										$query = $mysqli->query("SELECT * FROM procedimento_clinico");

										while ($procedimento = mysqli_fetch_array($query)) {
											echo '<option value="' . $procedimento['nome_procedimento'] . '">' . $procedimento['nome_procedimento'] . '</option>';
										}
									?>
								</select>

								<input type="hidden" class="form-control" id="nome_procedimento" name="nome_procedimento" value="ajax">
								<input type="hidden" class="form-control" id="action" name="action" value="ajax">
							</div>

						</div>

						<div class="row">
							<div class="col-md-6">
								<label>Quantidade</label>
								<input type="text" class="form-control" id="cantidad" name="quantidade" required>
							</div>

							<div class="col-md-6">
								<label>Preço Unitário</label>
								<input type="text" class="form-control" id="precio" name="preco" required readonly value="<?php echo isset($preco) ? $preco : ''; ?>">
							</div>

						</div>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" style="background-color: red;color:white" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-info" style="background-color: black;">Guardar</button>

					</div>

				</div>
			</div>
		</div>
	</form>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>


<script type="text/javascript">

	$(document).ready(function() {
		$('#procedimento').change(function() {
			var selectedProcedure = $(this).val(); // Captura o nome do procedimento selecionado
			console.log(selectedProcedure); // Verifica se o nome foi capturado corretamente

			$.ajax({
				method: 'POST',
				url: 'buscar_preco.php',
				data: { nome_procedimento: selectedProcedure }, // Envia o nome do procedimento selecionado
				success: function(response) {
					$('#precio').val(response);
					console.log(response); // Exibe a resposta no console
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.error('Erro na requisição AJAX:', textStatus, errorThrown);
				}
			});
		});
	});

	$(document).ready(function() {
		$(".cliente").select2({
			ajax: {
				url: "ajax/clientes_json.php",
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term
					};
				},
				processResults: function(data) {
					return {
						results: data
					};
				},
				cache: true
			},

			minimumInputLength: 2
		}).on('change', function(e) {
			var email = $('.cliente').select2('data')[0].email;
			var telefone = $('.cliente').select2('data')[0].telefone;
			var cpf = $('.cliente').select2('data')[0].cpf;
			$('#email').html(email);
			$('#telefone').html(telefone);
			$('#cpf').html(cpf);

		})
	});

	function mostrar_items() {
		var parametros = {
			"action": "ajax"
		};
		$.ajax({
			url: 'ajax/items.php',
			data: parametros,
			beforeSend: function(objeto) {
				$('.items').html('Cargando...');
			},
			success: function(data) {
				$(".items").html(data).fadeIn('slow');
			}
		})
	}

	function eliminar_item(id) {
		$.ajax({
			type: "POST",
			url: "ajax/items.php",
			data: { action: 'ajax', id: id }, // Incluindo o parâmetro 'id' na requisição
			beforeSend: function(objeto) {
				$('.items').html('Excluindo item...');
			},
			success: function(data) {
				$(".items").html(data).fadeIn('slow');
			}
		});
	}

	let maxProcedimentos = 8; // Defina o número máximo de procedimentos permitidos

	$("#guardar_item").submit(function(event) {
    // Verifica se já existem 7 procedimentos adicionados
		if ($('.items tr').length > maxProcedimentos) {
			$('#mensagemAlerta').text('Você atingiu o número máximo de procedimentos (7) permitidos.').show();
			$('#myModal').modal('hide'); // Fecha o modal
			event.preventDefault(); // Impede o envio do formulário se o limite for alcançado
		} else {
			$('#mensagemAlerta').hide(); // Oculta a mensagem de aviso se estiver visível
			parametros = $(this).serialize();
			$.ajax({
				type: "POST",
				url: 'ajax/items.php',
				data: parametros,
				beforeSend: function(objeto) {
					$('.items').html('Cargando...');
				},
				success: function(data) {
					$(".items").html(data).fadeIn('slow');
					$("#myModal").modal('hide');
				}
			});
		}
	});

	$("#datos_presupuesto").submit(function() {
		var cliente = $("#cliente").val();
		var descripcion = $("#procedimento2").val();


		if (cliente > 0) {
			VentanaCentrada('./pdf/documentos/presupuesto.php?cliente=' + cliente + '&procedimento=' + descripcion, 'Presupuesto', '', '1024', '1024', 'true');
		} else {
			alert("Selecione o cliente");
			return false;
		}

	});


	mostrar_items();
</script>

</html>