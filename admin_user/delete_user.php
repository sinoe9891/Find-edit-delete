<?php
include_once('utilities.php');
include_once('db/database_utilities.php');

header('Location: admin_user.php');
$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;
delete( $id );