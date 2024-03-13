<?php
require_once('conectar.php');//se llama a la clase cado de conectar.php, es require once porq necesariamente se debe realizar la conexion

class Usuario{
	function listar(){
		$objCado= new cado();//se llama a la clase cado y se almacena ern una variable
		$sql="select u.id,u.nombre as Nombres,user as Usuario, pass as clave , u.estado,ug.nombre as Grupo,u.id_grupo_usu, u.user_activo from usuario u inner join usuario_grupo ug on (u.id_grupo_usu=ug.id) where user_activo=0;";
			$ejecutar=$objCado->ejecutar($sql);//se ejecuta la consulta
			return $ejecutar;
		} 
	
	function registrar($usuario,$login,$pass,$estado,$tipo,$activo){
		$objCado=new cado();
        $sql="insert into usuario(nombre,user,pass,estado,id_grupo_usu,user_activo) 
                values('$usuario','$login',MD5('$pass'),'$estado','$tipo','$estado')";
		$ejecutar=$objCado->ejecutar($sql);
		return $ejecutar;
        
		
	}
	function eliminar($id){
		$objCado=new cado();
		$sql="UPDATE usuario SET user_activo = 1 WHERE id = $id";
		$ejecutar=$objCado->ejecutar($sql);
		return $ejecutar;

	}
	function modificar($id,$usuario,$login,$pass,$estado,$id_grupo_usu,$activo){
		$objCado=new cado();
		$sql="update usuario set nombre = '$usuario',user='$login',pass='$pass', 			estado=$estado,id_grupo_usu='$id_grupo_usu',user_activo='$activo' where id = $id";
		$ejecutar=$objCado->ejecutar($sql);
		return $ejecutar;

	}
	function iniciarSesion($usuario,$clave){
		$objCado= new cado();//se llama a la clase cado y se almacena en una variable
		$sql="select u.id,u.nombre as Nombres,user as Usuario, pass as clave , u.estado,ug.nombre as Grupo,u.id_grupo_usu, u.user_activo from usuario u inner join usuario_grupo ug on (u.id_grupo_usu=ug.id) where user= '$usuario' and pass= '$clave';";
			$ejecutar=$objCado->ejecutar($sql);//se ejecuta la consulta
			return $ejecutar;
		} 
}
?>