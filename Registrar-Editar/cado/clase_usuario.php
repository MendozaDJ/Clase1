<?php
require_once('conectar.php'); //se llama a la clase cado de conectar.php, es require once porq necesariamente se debe realizar la conexion

class Usuario
{

	function iniciarSesion($usuario, $clave)
	{
		$objCado = new cado(); //se llama a la clase cado y se almacena en una variable
		$sql = "select u.id_user, u.nombres, u.apellidos, u.dni, u.codigo from usuario u where u.user= '$usuario' and u.pass= '$clave';";
		$ejecutar = $objCado->ejecutar($sql); //se ejecuta la consulta
		return $ejecutar;
	}

    function registrarUsuario($nombres, $apellidos, $dni, $escuela, $codigo, $categoria, $pass, $user)
    {
        $objCado = new cado();
        $pass = md5($pass); // Aquí estás utilizando MD5 para encriptar la contraseña. Recuerda que MD5 es una función de hash obsoleta y no se recomienda para almacenar contraseñas seguras en producción.
        $sql = "INSERT INTO usuario (nombres, apellidos, dni, escuela, codigo, categoria, pass, user) VALUES ('$nombres', '$apellidos', '$dni', '$escuela', '$codigo', '$categoria', '$pass', '$user')";
        $ejecutar = $objCado->ejecutar($sql);
        return $ejecutar;
    }

    function editarUsuario($id_user, $nombres, $apellidos, $dni, $escuela, $codigo, $categoria, $pass, $user)
    {
        $objCado = new cado();
        $pass = md5($pass); // Igualmente, aquí se está utilizando MD5 para encriptar la contraseña.
        $sql = "UPDATE usuario SET nombres = '$nombres', apellidos = '$apellidos', dni = '$dni', escuela = '$escuela', codigo = '$codigo', categoria = '$categoria', pass = '$pass', user = '$user' WHERE id_user = $id_user";
        $ejecutar = $objCado->ejecutar($sql);
        return $ejecutar;
    }

	function listarUsuario()
	{
		$objCado = new cado(); //se llama a la clase cado y se almacena en una variable
		$sql = "select u.id_user, u.nombres, u.apellidos, u.dni, u.codigo from usuario u;";
		$ejecutar = $objCado->ejecutar($sql); //se ejecuta la consulta
		return $ejecutar;
	}
}
?>
