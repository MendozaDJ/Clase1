  <?php
	session_start();
if(!isset($_SESSION["Usuario"])) {
	header('Location: index.php');
}
	include 'cado/clase_usuario.php';
	$filename = "libros.xls";
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=".$filename);

	$obj= new Usuario();
	$listar= $obj->listar();
	
	$excel=$listar->fetch();
	$i=0;
	?>
	<h4 align="center">LISTADO DE USUARIOS</h4>
	 <table  class="table table-bordered table-hover table-responsive "  >
    <thead>
      <tr align="center">
        <th><center>N&deg</center></th>
		<th><center>NOMBRE</center></th>
		<th><center>USUARIO</center></th>
		<th><center>GRUPO</center></th>
                
      </tr>
    </thead>
    <tbody>
      <?php
	
	while($fila=$listar->fetch()){//se recorre cada fila y se convierte en un array
		$i++;

	?>
		<tr>
			<td><center><?=$i?></center></td>
			<td><?=utf8_decode($fila[1])?></td>
			<td><center><?=$fila[2]?></center></td>
			<td><center><?=$fila[5]?></center></td>
			
		</tr>
	<?php	
	}
	?>
      
    </tbody>
  </table>