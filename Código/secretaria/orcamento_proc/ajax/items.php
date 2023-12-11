<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    require_once("../../../conexao.php");

    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $delete = mysqli_query($conexao, "DELETE FROM items WHERE id='$id'");
    }
	
	if (isset($_POST['procedimento'])){
		
		$descripcao=mysqli_real_escape_string($conexao,$_POST['procedimento']);
		$quantidade=intval($_POST['quantidade']);
		$preco=floatval($_POST['preco']);
		$sql="INSERT INTO `items` ( `descripcao_proc`, `quantidade`, `preco`) VALUES ( '$descripcao', '$quantidade', '$preco');";
		$insert=mysqli_query($conexao,$sql);
	}
	
	$query=mysqli_query($conexao,"SELECT * from items order by id");
	$items=1;
	$suma=0;
	while($row=mysqli_fetch_array($query)){
			$total=$row['quantidade']*$row['preco'];
			$total=number_format($total,2,'.','');
		?>
	<tr>
		<td class='text-center'><?php echo $items;?></td>
		<td><?php echo $row['descripcao_proc'];?></td>
		<td class='text-center'><?php echo $row['quantidade'];?></td>
		<td class='text-right'><?php echo $row['preco'];?></td>
		<td class='text-right'><?php echo $total;?></td>
		<td class='text-right'><a href="#" onclick="eliminar_item('<?php echo $row['id']; ?>')" ><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUAAADnTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDx+VWpeAAAAJ3RSTlMAAQIFCAkPERQYGi40TVRVVlhZaHR8g4WPl5qdtb7Hys7R19rr7e97kMnEAAAAaklEQVQYV7XOSQKCMBQE0UpQwfkrSJwCKmDf/4YuVOIF7F29VQOA897xs50k1aknmnmfPRfvWptdBjOz29Vs46B6aFx/cEBIEAEIamhWc3EcIRKXhQj/hX47nGvt7x8o07ETANP2210OvABwcxH233o1TgAAAABJRU5ErkJggg=="></a></td>
	</tr>	
		<?php
		$items++;
		$suma+=$total;
	}
	?>
	<tr>
		<td colspan='6'>
		
			<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" style="background-color: black;"><span class="glyphicon glyphicon-plus"></span> Adicionar Item</button>
		</td>
	</tr>
	<tr>
		<td colspan='4' class='text-right'>
			<h4>TOTAL R$</h4>
		</td>
		<th class='text-right'>
			<h4><?php echo number_format($suma,2);?></h4>
		</th>
		<td></td>
	</tr>
<?php

}