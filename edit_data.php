<?php
include_once('utilities.php');
include_once('db/database_utilities.php');
if(!isset($_SESSION['uid'])){
  header('Location: login.php');
}

if( $_POST )
{
echo $_POST['locality_data'];
  $id = isset( $_POST['id'] ) ? $_POST['id'] : '';
  $idz = isset( $_POST['idz'] ) ? $_POST['idz'] : '';
  $family = isset( $_POST['family'] ) ? $_POST['family'] : '';
  $subfamily = isset( $_POST['subFamily'] ) ? $_POST['subFamily'] : '';
  $tribe = isset( $_POST['tribe'] ) ? $_POST['tribe'] : '';
  $genus = isset( $_POST['genus'] ) ? $_POST['genus'] : '';
  $species = isset( $_POST['species'] ) ? $_POST['species'] : '';
  $locality_data = isset( $_POST['locality_data'] ) ? $_POST['locality_data'] : '';
  $deremination_label = isset( $_POST['deremination_label'] ) ? $_POST['deremination_label'] : '';

update( $id, $idz, $family, $subfamily,$tribe, $genus,  $species, addslashes( $locality_data), $deremination_label );
echo '<form name="form1" method="post" action="admin.php" hidden><input hidden class="buscar" id="busca" name="busca" type="search"  value="'.$id.'"></form><script>  document.form1.submit();</script>';

}

