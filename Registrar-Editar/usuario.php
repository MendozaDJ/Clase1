<?php session_start();
if (!isset($_SESSION["Nombres"])) {
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
    $listar = $objUsuario->listarUsuario();

    $i = 0;


    ?>

    <div class="container-fluid bg-primary text-white">
        <div class="container">
            <h5>BIENVENIDO: <?= $_SESSION["Nombres"]; ?></h5>
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
                        <center>Apellidos</center>
                    </th>
                    <th style="width: 250px">
                        <center>Dni</center>
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
                        </td>
                        <td style="width:400px;"><?= $fila[1] ?></td>
                        <td style="width:250px;">
                            <center><?= $fila[2] ?></center>
                        </td>
                        <td style="width:250px;">
                            <center><?= $fila[3] ?></center>
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
                <form id="frmGrabar" action="agregar_editar.php" method="post">
                    <input type="hidden" value="" id="txtTipoOperacion" name="txtTipoOperacion">

                    <div class="form-group">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtApellidos">Apellidos</label>
                        <input type="text" name="txtApellidos" id="txtApellidos" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtDNI">DNI</label>
                        <input type="text" name="txtDNI" id="txtDNI" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtEscuela">Escuela</label>
                        <input type="text" name="txtEscuela" id="txtEscuela" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtCodigo">Código</label>
                        <input type="text" name="txtCodigo" id="txtCodigo" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtCategoria">Categoría</label>
                        <input type="text" name="txtCategoria" id="txtCategoria" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtPass">Contraseña</label>
                        <input type="password" name="txtPass" id="txtPass" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtUser">Usuario</label>
                        <input type="text" name="txtUser" id="txtUser" required class="form-control">
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="material-icons md-18">save</i>Grabar</button>
                <button type="reset" class="btn btn-info"><i class="material-icons md-18">delete_sweep</i>Limpiar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="material-icons md-18">close</i>Cerrar</button>
            </div>
        </div>
    </div>
</div>

    <script>
    function editar(id, nombre, user, clave, estado) {
    $("#txtTipoOperacion").val("editar");

    $("#txtID").val(id); 
    $("#txtNombre").val(nombre); 
    $("#txtUsuario").val(user); 
    $("#txtClave").val(clave); 
    $("#cboEstado").val(estado); 



    $("#titulo").html("MODIFICAR USUARIO");
}
    function cerrar(id) {
         window.location.href="index.php";
					
					
    }
    $("#btnNuevo").click(function() {
    $("#txtTipoOperacion").val("agregar");
    $("#txtID").val("");
    $("#txtNombre").val("");
    $("#txtUsuario").val("");
    $("#txtClave").val("");

    $("#titulo").html("NUEVO USUARIO");
});

    </script>
</body>