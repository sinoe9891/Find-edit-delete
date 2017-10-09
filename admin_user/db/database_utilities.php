<?php
require_once('database_credentials.php');
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
$result = '';

if( $mysqli->connect_errno )
{
	echo 'Error en la conexión';
	exit;
}

function run_query_admin()
{
	global $mysqli, $result;
	$sql = 'SELECT * FROM user_admin';
	return $mysqli->query($sql);

}

function get_users()
{
	global $mysqli, $result;
	$sql = 'SELECT * FROM user_admin';
	return $mysqli->query($sql);

}
//conexión para Login
function get_user_data_by_usuario( $usuario )
{
	global $mysqli, $result;
	$sql = "SELECT * FROM user_admin WHERE usuario = '{$usuario}' ";
	$result = $mysqli->query($sql);
	return $result->fetch_assoc();

}

function get_user_data_by_user( $user )
{
	global $mysqli, $result;
	$sql = "SELECT * FROM user_admin WHERE user = '{$user}' ";
	$result = $mysqli->query($sql);
	return $result->fetch_assoc();

}
//Hala la información del USER
function get_user_data_by_id( $id )
{
	global $mysqli, $result;
	$sql = "SELECT * FROM user_admin WHERE id = '{$id}' ";
	$result = $mysqli->query($sql);
	return $result->fetch_assoc();
}

function get_user_user_id( $idu )
{
	global $mysqli;
	$sql = "SELECT * FROM user_admin WHERE id = {$idu}";
	$result = $mysqli->query($sql);
	if( $result->num_rows )
		return $result->fetch_assoc();
	return false;
}



//actualiza Información de Usuario
function update_user_address($id_user, $address)
{
	global $mysqli, $result;
	$sql = "UPDATE user_admin SET address='{$address}' WHERE id = {$id_user}";
	$mysqli->query($sql);
}

function add_super_usuario( $id, $usuario, $nombre, $email, $password, $cargo, $departamento )
{
	global $mysqli;
	$sql = "INSERT INTO user_admin (id, usuario, nombre, email, password, cargo, departamento) VALUES (null, '{$usuario}','{$nombre}','{$email}','{$password}','{$cargo}','{$departamento}')";
	$mysqli->query($sql);
}


function update_super( $id, $nombre, $email, $password, $cargo, $departamento)
{
	global $mysqli;
	$sql = "UPDATE user_admin SET nombre = '{$nombre}', email = '{$email}', password = '{$password}', cargo = '{$cargo}', departamento = '{$departamento}' WHERE id = {$id}";
	$mysqli->query( $sql );

}



//------------------------------------------------------------USER_ACCESS-------------------------------------------------------------------
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
function update( $id, $name, $email, $cargo, $password, $departamento)
{
	global $mysqli;
	$sql = "UPDATE user_access SET name = '{$name}', email = '{$email}', cargo = '{$cargo}', password = '{$password}', departamento = '{$departamento}' WHERE id = {$id}";
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
	global $mysqli;
	$sql = "SELECT * FROM user_access WHERE id = {$id}";
	$result = $mysqli->query($sql);
	if( $result->num_rows )
		return $result->fetch_assoc();
	return false;
}
