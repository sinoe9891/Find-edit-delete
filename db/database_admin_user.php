<?php
require_once('database_credentials.php');
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
$result = '';

if( $mysqli->connect_errno )
{
	echo 'Error en la conexión';
	exit;
}
function get_users()
{
	global $mysqli, $result;
	$sql = 'SELECT * FROM user_admin';
	return $mysqli->query($sql);

}
//conexión para Login
function get_user_data_by_email( $email )
{
	global $mysqli, $result;
	$sql = "SELECT * FROM user_admin WHERE email = '{$email}' ";
	$result = $mysqli->query($sql);
	return $result->fetch_assoc();

}

function get_user_data_by_id( $id )
{
	global $mysqli, $result;
	$sql = "SELECT * FROM user_admin WHERE id = '{$id}' ";
	$result = $mysqli->query($sql);
	return $result->fetch_assoc();
}

//Para ver los resultados de los usarios existentes en index.php
function run_query()
{
	global $mysqli, $result;
	$sql = 'SELECT * FROM user_access';
	return $mysqli->query($sql);

}

//AGREGA USUARIO NUEVO
function add( $email, $password )
{
	global $mysqli;
	$sql = "INSERT INTO user_access (id, email, password) VALUES (null, '{$email}','{$password}')";
	$mysqli->query($sql);

}

//Actualizar USUARIO Y CONTRASEÑA
function update( $id, $nombre, $password )
{
	global $mysqli;
	$sql = "UPDATE user_access SET nombre = '{$nombre}', password = '{$password}' WHERE id = {$id}";
	$mysqli->query( $sql );

}
//ELIMINAR USUARIO
function delete( $id )
{
	global $mysqli;
	$sql = "DELETE FROM user_access WHERE id = {$id}";
	$mysqli->query($sql);
}

//HALA LA INFORMACIÓN POR MEDIO DE LA ID

function get_user_by_id( $id )
{
	global $mysqli, $result;
	$sql = "SELECT * FROM user_access WHERE id = '{$id}' ";
	$result = $mysqli->query($sql);
	return $result->fetch_assoc();
}