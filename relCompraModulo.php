<?php
include_once 'dbconfig.php';

if (!isset($_GET['consultaM'])) {
	header("Location: busca.php");
	exit;
}

$busca = $_GET['consultaM'];

$sql = "SELECT * FROM Compra WHERE id_Modulo_Compra LIKE '%" . $busca . "%' AND Status ='F'";
$query = $connection->query($sql);
$resultado = $query->fetchAll(PDO::FETCH_NUM);


if (! sizeof($resultado) > 0) {
	?>
	<script type="text/javascript">
		alert('NENHUM REGISTRO ENCONTRADO!');
		window.location.href = 'relatorioCompras.php';
	</script>
	<?php
} else {
	?>

	<!DOCTYPE html>
	<html xmlns="">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>RELATÓRIO DE COMPRAS</title>
		<link rel="stylesheet" href="style.css" type="text/css"/>
	<body>
	<center>
		<div id="header">
			<div id="content">
				<label id="titulo">RELATÓRIO DE COMPRAS POR MÓDULO</label>
			</div>
		</div>
		<div id="body">
			<div id="content">
				<table align="center">
					<tr>
						<th>ID</th>
						<th>MÓDULO</th>
						<th>DATA</th>
						<th>VALOR DA COMPRA</th>
						<th>FINALIZADO?</th>
					</tr>
					<?php

					foreach ($resultado as $data) {
						?>
						<tr>
							<td><?php echo $data[0]; ?></td>
							<td><?php echo $data[1]; ?></td>
							<td><?php echo $data[2]; ?></td>
							<td><?php echo $data[3]; ?></td>
							<td><?php echo $data[4]; ?></td>
						</tr>
						<?php
					}
					?>
					<tr>
						<th colspan="">
						<th colspan="4"><a href="relatorioCompras.php">VOLTAR</a></th>
					</tr>
				</table>
			</div>
		</div>
	</center>
	</body>
	</html>
<?php } ?>
