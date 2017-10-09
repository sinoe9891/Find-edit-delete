<?php
include_once('utilities.php');
include_once('db/database_utilities.php');

if( !isset( $_SESSION['uid'] ) )
{
  header('Location: login.php');
  die();
}elseif (isset( $_SESSION['uid'] )) {
	$id = isset( $_GET['idz'] ) ? $_GET['idz'] : 0;
	delete( $id );
	header('Location: admin.php');
	die();
}
