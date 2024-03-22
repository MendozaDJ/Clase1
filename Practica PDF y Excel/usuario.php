<?php session_start();
if (!isset($_SESSION["Usuario"])) {
	header('Location: index.php');
}
?>

<body>
	<link rel="stylesheet" href="css/nuevo.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


	<?php

	include('cado/clase_usuario.php'); //se llama al archivo de clase_usuario.php
	include('cado/clase_grupo_usuario.php');
	$objUsuario = new Usuario(); //se llama a la clase usuario
	$listar = $objUsuario->listar();

	$i = 0;


	?>

	<div class="container-fluid bg-primary text-white">
		<div class="container">
			<h5>BIENVENIDO: <?= $_SESSION["Usuario"]; ?></h5>
		</div>
	</div>
	<div class="container center">
		<h2>LISTA DE USUARIOS</h2>
		<button type="submit" id="btnNuevo" name="btnNuevo" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal"> <i class="material-icons md-18"> file_copy </i> <b>Nuevo Usuario </b></button>

		<button type="button" id="btnPDF" name="btnPDF" class="btn btn-warning btn-md" onClick="descargas()"> <i class="material-icons md-18"> picture_as_pdf </i> <b>Exportar a PDF</b></button>

		<button type="button" id="btnExcel" name="btnExcel" class="btn btn-success btn-md" onClick="excel()"> <i class="material-icons md-18"> insert_chart </i> <b>Exportar a Excel</b></button>
		<button type="button" id="btnCerrar" name="btnCerrar" class="btn btn-danger btn-md" onClick="cerrar()"> <i class="material-icons md-18"> close </i> <b>Cerrar Session </b></button>

		<br>
		<br>
		<table id="tabla" class="table table-bordered table-hover table-responsive table-fixed">
			<thead>
				<tr style="width:1000px;">
					<th style="width:45px">
						<center>N°</center>
					</th>
					<th style="width: 400px">
						<center>Nombre</center>
					</th>
					<th style="width: 250px">
						<center>Usuario</center>
					</th>
					<th style="width: 250px">
						<center>Grupo</center>
					</th>
					<th colspan="2" style="width: 150px">
						<center>Acciones</center>
					</th>

				</tr>
			</thead>
			<tbody>
				<?php

				while ($fila = $listar->fetch()) { //se recorre cada fila y se convierte en un array
					$i++;

				?>
					<tr style="width:1000px;">
						<td style="width:45px;">
							<center><?= $i ?></center>
						</td><!-- esto es igual a <?php // echo $fila[$i];
													?>-->
						<td style="width:400px;"><?= $fila[1] ?></td>
						<td style="width:250px;">
							<center><?= $fila[2] ?></center>
						</td>
						<td style="width:250px;">
							<center><?= $fila[5] ?></center>
						</td>
						<td style="width:75px;">
							<center><button type="button" id="btnEditar" name="btnEditar" class="btn-info btn-sm waves-effect" data-toggle="modal" data-target="#myModal" onClick="editar('<?= $fila[0] ?>','<?= $fila[1] ?>','<?= $fila[2] ?>','<?= $fila[3] ?>','<?= $fila[4] ?>','<?= $fila[6] ?>','<?= $fila[7] ?>')"> <i class="material-icons md-18"> create </i> <b></b></button></center>
						</td>
						<td style="width:75px;">
							<center><button type="button" id="btnEliminar" name="btnEliminar" class="btn-danger btn-sm waves-effect" data-toggle="modal" data-target="#eliminar" onClick="eliminar('<?= $fila[0] ?>')"> <i class="material-icons md-18"> delete </i> <b> </b></button> </center>
						</td>

					</tr>
				<?php
				}
				?>

			</tbody>
		</table>
	</div>

	<br>
	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog" style="width: 500px">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">

					<h4 class="modal-title" id="titulo">NUEVO USUARIO</h4>
				</div>
				<div class="modal-body">
					<form id=frmGrabar action="<?php echo htmlspecialchars('agregar_editar.php'); ?>" method="post">

						<div class="row">
							<div class="col-xs-3">
								<p>
									<input type="hidden" value="" id="txtTipoOperacion" name="txtTipoOperacion">

								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<p>
									<b>ID</b> <input type="text" name="txtID" id="txtID" required="" class="form-control input-md text-bold" readonly="">
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<p>
									<b>Nombre</b> <input type="text" name="txtNombre" id="txtNombre" required="" class="form-control input-md text-bold">
								</p>
							</div>


						</div>
						<div class="row">

							<div class="col-xs-12">
								<p>
									<b>Usuario</b> <input type="text" name="txtUsuario" id="txtUsuario" required="" class="form-control input-md text-bold">
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<p>
									<b>Contraseña</b> <input type="password" name="txtClave" id="txtClave" required="" class="form-control input-md text-bold">
								</p>
							</div>


						</div>

						<div class="row">



							<div class="col-xs-12">
								<p>
									<b>Estado</b>
									<select required name="cboEstado" id="cboEstado" class="form-control input-md" required="">
										<option value="0">Activo</option>
										<option value="1">Inactivo</option>
									</select>
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<p>
									<b>Grupo</b>
									<select required name="cboGrupo" id="cboGrupo" class="form-control input-md" required="">
										<option>Seleccione</option>
										<?php
										$objGrupo = new GrupoUsuario(); //se llama a la clase usuario
										$grupos = $objGrupo->listarGrupos();
										while ($fila2 = $grupos->fetch()) {
										?>
											<option value="<?= $fila2[0] ?>"><?= $fila2[1] ?></option>
										<?php
										}
										?>

									</select>
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<p>
									<b>Usuario Activo</b>
									<select required name="cboActivo" id="cboActivo" class="form-control input-md" required="">
										<option value="0">Sí</option>
										<option value="1">No</option>
									</select>
								</p>
							</div>
						</div>


				</div>
				<div class="modal-footer">

					<button type="submit" class="btn btn-success" id="btnGrabar" name="btnGrabar"><i class="material-icons md-18">save</i>Grabar</button>
					<button type="reset" class="btn btn-info"><i class="material-icons md-18">delete_sweep</i>Limpiar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal" id="btnCerrar"><i class="material-icons md-18">close</i>Cerrar</button>
				</div>
				</form>
			</div>

		</div>
	</div>

	<div class="modal fade" id="eliminar" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">CONFIRMACIÓN</h4>
				</div>
				<div class="modal-body">
					<form id=frmEliminar action="<?php echo htmlspecialchars('eliminar.php'); ?>" method="post">
						<h3>
							<center>¿Desea eliminar este registro?.</center>
						</h3>
						<input type="hidden" id="txtID2" name="txtID2">
				</div>
				<div class="modal-footer">
					<center>
						<button type="submit" class="btn btn-success" id="btnGrabar2" name="btnGrabar2"><i class="material-icons md-18">delete</i>Eliminar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</center>
				</div>
				</form>
			</div>

		</div>
	</div>

	<script>
		function editar(id, nombre, user, clave, estado, grupo, activo) {

			$("#txtTipoOperacion").val("editar");

			$("#txtID").val(id);
			$("#txtNombre").val(nombre);
			$("#txtUsuario").val(user);
			$("#txtClave").val(clave);
			$("#cboEstado").val(estado);
			$("#cboGrupo").val(grupo);
			$("#cboActivo").val(activo);

			$("#titulo").html("MODIFICAR USUARIO");
		}


		function eliminar(id) {
			$("#txtID2").val(id);


		}

		function excel() {
			window.location.href = "excel.php";


		}

		function descargas() {
			window.open("descargas.php", "_blank");


		}

		function cerrar(id) {
			window.location.href = "index.php";


		}

		function exportTableToExcel(tableID, filename = '') {
			var downloadLink;
			var dataType = 'application/vnd.ms-excel';
			var tableSelect = document.getElementById(tableID);
			var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

			// Specify file name
			filename = filename ? filename + '.xls' : 'excel_data.xls';

			// Create download link element
			downloadLink = document.createElement("a");

			document.body.appendChild(downloadLink);

			if (navigator.msSaveOrOpenBlob) {
				var blob = new Blob(['\ufeff', tableHTML], {
					type: dataType
				});
				navigator.msSaveOrOpenBlob(blob, filename);
			} else {
				// Create a link to the file
				downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

				// Setting the file name
				downloadLink.download = filename;

				//triggering the function
				downloadLink.click();
			}
		}

		function Acceder() {
			$user = $("#username").val()
			$pass = $("#password").val()
			if ($user == '') {
				swal("Ingrese Usuario ..", "Verifique sus Datos", "error");
				$("#username").focus();
				exit;
			}
			if ($pass == '') {
				swal("Ingrese Contraseña ..", "Verifique sus Datos", "error");
				$("#password").focus();
				exit;
			}
			$.post("controlador/Cusuario.php", {
				accion: 'ACCEDER',
				user: $user,
				pass: $pass
			}, function(data) {
				//alert(data)
				// $data=data.split('***')
				if (data == 0) {
					swal("Usuario o Contraseña Incorrecta", "Verifique sus Datos", "error");
					return false;
				} else {
					location.href = 'Panel.php';
					/*if($data[1]=='ADMIN'){location.href='Adm_Panel.php';}
					if($data[1]=='SIST'){location.href='Adm_Panel.php';}
					if($data[1]=='CAJA'){location.href='Adm_Cajero.php';}*/
				}
			})
		}

		$("#btnNuevo").click(function() {
			$("#txtTipoOperacion").val("agregar");
			$("#txtID").val("");
			$("#txtNombre").val("");
			$("#txtUsuario").val("");
			$("#txtClave").val("");
			$("#cboGrupo").val("Seleccione");

			$("#titulo").html("NUEVO USUARIO");
		});


		$("#btnPDF").click(function() {
			$("#txtOpciones").val("pdf");
		});


		$("#myModal").on("shown.bs.modal", function() {
			$("#txtNombre").focus();
		});
	</script>

</body>