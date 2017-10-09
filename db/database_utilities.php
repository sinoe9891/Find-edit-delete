<?php
require_once('database_credentials.php');
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
$result = '';

if( $mysqli->connect_errno )
{
	echo 'Error en la conexión con la Base de Datos';
	exit;
}

function get_users()
{
	global $mysqli, $result;
	$sql = 'SELECT * FROM user_access';
	return $mysqli->query($sql);

}

function get_user_data_by_user( $user )
{
	global $mysqli, $result;
	$sql = "SELECT * FROM user_access WHERE user = '{$user}' ";
	$result = $mysqli->query($sql);

	return $result->fetch_assoc();

}
//Hala la información del USER
function get_user_data_by_id( $id )
{
	global $mysqli, $result;
	$sql = "SELECT * FROM user_access WHERE id = '{$id}' ";
	$result = $mysqli->query($sql);
	return $result->fetch_assoc();
}
//actualiza Información de Usuario
function update_user_address($id_user, $password )
{
	global $mysqli, $result;
	$sql = "UPDATE user_access SET password='{$password}' WHERE id = {$id_user}";
	$mysqli->query($sql);
}


//ESTO ES AGREGAR
function add( $id, $family, $subfamily, $tribe, $genus, $species, $order1, $synonyms, $locality_data, $deremination_label)
{
	global $mysqli;
	$sql = "INSERT INTO entomologia3 (idz, family, id, subfamily, tribe, genus, species, order1, synonyms, locality_data, deremination_label) VALUES (null, '$family','$id','$subfamily','$tribe','$genus','$species','$order1','$synonyms','$locality_data','$deremination_label')";
	$mysqli->query($sql);

}
//ESTO ELIMINAR
function delete( $id )
{
	global $mysqli;
	$sql = "DELETE FROM entomologia3 WHERE idz = {$id}";
	$mysqli->query($sql);
}

//ESTO ES PARA HALAR LOS DATOS DE LA BASE DE DATOS POR MEDIO DEL ID
function get_user_by_data( $idz )
{
	global $mysqli;
	$sql = "SELECT * FROM entomologia3 WHERE idz = {$idz}";
	$result = $mysqli->query($sql);
	if( $result->num_rows )
		return $result->fetch_assoc();
	return false;

}
//ESTO ES MODIFICAR REGISTRO
function update( $id, $idz, $family, $subfamily, $tribe, $genus, $species, $locality_data, $deremination_label )
{

	global $mysqli;
	$sql = "UPDATE entomologia3 SET family = '{$family}', subfamily = '{$subfamily}' , genus = '{$genus}', tribe = '{$tribe}', species = '{$species}', locality_data = '{$locality_data}', deremination_label = '{$deremination_label}' WHERE idz = '{$idz}'";
	$mysqli->query( $sql );
}

//ACTUALIZAR USUARIO

function validar_clave($clave,&$error_clave){
   if(strlen($clave) < 8){
      $error_clave = "La clave debe tener al menos 8 caracteres";
      return false;
   }
   if(strlen($clave) > 16){
      $error_clave = "La clave no puede tener más de 16 caracteres";
      return false;
   }
   if (!preg_match('`[a-z]`',$clave)){
      $error_clave = "La clave debe tener al menos una letra minúscula";
      return false;
   }
   if (!preg_match('`[A-Z]`',$clave)){
      $error_clave = "La clave debe tener al menos una letra mayúscula";
      return false;
   }
   if (!preg_match('`[0-9]`',$clave)){
      $error_clave = "La clave debe tener al menos un caracter numérico";
      return false;
   }
   $error_clave = "";
   return true;
} 


?>
