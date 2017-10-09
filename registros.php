<?php
include_once('utilities.php');
include_once('db/database_utilities.php');
if( !isset( $_SESSION['uid'] ) )
{
  header('Location: index.php');
  die();

}
$user_id = $_SESSION['uid'];


if( $_POST )
{
  $address = isset( $_POST['address'] ) ? $_POST['address'] : '';
  update_user_address($user_id, $address);
}

$user_data = get_user_data_by_id( $user_id );
$result = get_articles();

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Entomology | Zamorano University</title>
    <link rel="icon" href="./img/favicon.png" type="image/x-icon" />


  <link rel="stylesheet" href="css/style.css">
  
  <!--[if !IE]><!-->
  <style>
  
  /* 
  Max width before this PARTICULAR table gets nasty
  This query will take effect for any screen smaller than 760px
  and also iPads specifically.
  */
  @media only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {
    .title {display: none;}
    /* Force table to not be like tables anymore */
    table, thead, tbody, th, td, tr { 
      display: block; 
    }
    
    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr { 
      position: absolute;
      top: -9999px;
      left: -9999px;
    }
    
    tr { 
      border: 1px solid #ccc; }
    
    td { 
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee; 
      position: relative;
      padding-left: 50%; 
    }
    
    td:before { 
      /* Now like a table header */
      position: absolute;
      /* Top/left values mimic padding */
      top: 6px;
      left: 6px;
      width: 50%; 
      padding-right: 10px; 
      white-space: nowrap;
    }
    
    /*
    Label the data
    */
    td:nth-of-type(1):before { content: "Family";}
    td:nth-of-type(2):before { content: "Subfamily"; }
    td:nth-of-type(3):before { content: "Tribe"; }
    td:nth-of-type(4):before { content: "Genus"; }
    td:nth-of-type(5):before { content: "Species"; }
    td:nth-of-type(6):before { content: "Locality Data"; }
    td:nth-of-type(7):before { content: "Determination Label"; }
  }
  
  /* Smartphones (portrait and landscape) ----------- */
  @media only screen
  and (min-device-width : 320px)
  and (max-device-width : 480px) {
    body { 
      padding: 0; 
      margin: 0; 
      width: 500px; }
    }
  
  /* iPads (portrait and landscape) ----------- */
  @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    body { 
      width: 495px; 
    }
  }
  
  </style>
  <!--<![endif]-->
</head>
<body>
    <?php require_once('header.php'); ?>

<div align="center">

<form name="form1" method="post" action="registros.php" id="cdr" aling="center" >
  
  <h1 align="center">ENTOMOLOGY <br>EAPZ DATABASE</h1> 
  <p>Search by ID (e.g. 20.237EAPZ).</p>
      <p>
       <input class="buscar" id="busca" name="busca" type="search" placeholder="Search" autofocus>
       <input type="submit" name="buscador" class="boton peque aceptar" value="Search">
        </p>
      </p>
</form>
 <p>
  <style type="text/css">
input{outline:none;border:0px;}
.buscar {width:170px;background:#fff;border: 30px}
#busqueda{background:#0081C3;color:#fff; border-radius:10px 0px 0px 10px;}
#cdr{padding:5px;background:white;width:400px; border-radius:10px 0px 0px 10px;}
#tab{background:#fff;;border-radius:10px 10px 10px 10px;}

</style>
</div>
  <?php  
//*

$busca=NULL;
$busca=$_POST['busca'];
$registros = '';


if(empty($busca))
{
      ?>
      <div align="center"> 
      <?php
  echo '<h3><p><strong>ENTER TO SEARCH</strong></p></h3>';;
}

mysql_connect("localhost","root","");// si haces conexion desde internnet usa 3 parametros si es a nivel local solo 2
mysql_select_db("curso_php");//nombre de la base de datos
function conectar(){
  global $conexion;  //Definición global para poder utilizar en todo el contexto
  $conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB)
  or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS');
  mysql_select_db(NAME_DB)
  or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB);
}
function desconectar(){
  global $conexion;
  mysql_close($conexion);
}

if($busca!=""){
$busqueda="SELECT * FROM entomologia3 WHERE id LIKE '%".$busca."%'  OR deremination_label LIKE '%".$busca."%'";
//cambiar nombre de la tabla de busqueda
 $resultado = mysql_query($busqueda); 
 //Ejecución de la consulta
      //Si hay resultados...
    if (mysql_num_rows($resultado) > 0){ 
      $registros = '<h3><p><strong>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' REGISTROS </strong></p></h3>'; 
      ?>
      <div align="center">

<?php
echo $registros;
echo $texto
?>
<table width="500" border="3" id="tab">
   <tr class="title">
     <td width="61"><strong>Family</strong></td>
     <td width="70"><strong>Subfamily</strong></td>
     <td width="50"><strong>Tribe</strong></td>
     <td width="50"><strong>Genus</strong></td>
     <td width="73"><strong>Species</strong></td>
     <td width="80"><strong>Locality Data</strong></td>
     <td width="80"><strong>Determination Label</strong></td>
     <td width="80"><strong>UPDATE</strong>                          
   </tr>
 </div>
<?php

while($f=mysql_fetch_array($resultado)){


echo '<tr>';
echo '<td align="center" width="61">'.$f['family'].'</td>';
echo '<td align="center" width="70">'.$f['subfamily'].'</td>';
echo '<td align="center" width="50">'.$f['tribe'].'</td>';
echo '<td align="center" width="50">'.$f['genus'].'</td>';
echo '<td align="center" width="73">'.$f['species'].'</td>';
echo '<td align="center" width="300">'.$f['locality_data'].'</td>';
echo '<td align="center" width="350">'.$f['deremination_label'].'</td>';

                          while($user = $result->fetch_assoc())
                          
?>
                            <td align="center" width="100">
                            <?php echo utf8_decode($user['ideap']); ?>
                            <?php echo utf8_decode($user['text']); ?>
                              <?php if( $user['owner'] == $user_id ){ ?>
                              <a href="./article_details.php?id=<?php echo $user['id']; ?>" class="button tiny">Ver detalles</a>
                              <a href="./delete.php?id=<?php echo $user['id']; ?>" class="button tiny alert">Delete</a>
                              <?php }else{ ?>
                              Sin acción
                              <?php } ?>
                                </td>
                          </tr>
                          <?php 


echo '</tr>';



//onclick="return confirm('¿Realmente deseas eliminar este articulo?')";
//cambiar los nombres de los campos de busqueda
}
    }else{
      $registros = '<h3><p><strong>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' REGISTROS </strong></p></h3>';
      ?>
      <div align="center"> 
      <?php
      echo $registros;
  
    }

}

?>

</body>
</html>