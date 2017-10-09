<HTML>
<HEAD>
<TITLE>Actualizar1.php</TITLE>
</HEAD>
<BODY>
<div align="center">
<h1>Actualizar un registro</h1>
<br>



<?php

//Conexion con la base
mysql_connect("localhost","root","");

//selección de la base de datos con la que vamos a trabajar 
mysql_select_db("curso_php"); 


$sql="UPDATE entomologia SET id='$_POST[nuevo]' WHERE id='$_POST[viejo]'";
mysqli_query($id,$sql);
echo "Actualizacion correcta";
?>


<html>
<head>
<title>
Actualizar bases de datos 
</title>
</head>
<body>
<form action="profile_update.php" method="post">
Dato viejo:
    <input type="text"  name="viejo"/> <br/>
    Dato nuevo:
	<input type="text"  name="nuevo"/> <br/>
	    <input type="submit"  value="actualizar"/> 
<form/>

</FORM>
</div>

</BODY>
</HTML>




<?php



