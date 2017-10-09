/*Curso JavaScript aprenderaprogramar.com */
var editando=false;
function trasformEditable(nodo) {

	//debugg
//El nodo recibido es SPAN
	if (editando == false) {
		var nodoContenedorForm = document.getElementById('contenedorForm'); //Nodo DIV

		var id = nodo.parentNode.parentNode.getElementsByTagName('td')[0].textContent; 
		var family = nodo.parentNode.parentNode.getElementsByTagName('td')[1].textContent;
		var subFamily = nodo.parentNode.parentNode.getElementsByTagName('td')[2].textContent; 
		var tribe = nodo.parentNode.parentNode.getElementsByTagName('td')[3].textContent;
		var genus = nodo.parentNode.parentNode.getElementsByTagName('td')[4].textContent; 
		var species = nodo.parentNode.parentNode.getElementsByTagName('td')[5].textContent;
		var locality_data = nodo.parentNode.parentNode.getElementsByTagName('td')[6].textContent;
		var deremination_label = nodo.parentNode.parentNode.getElementsByTagName('td')[7].textContent;
		var idz = nodo.parentNode.parentNode.getElementsByTagName('td')[8].textContent; 

		var nuevoCodigoHtml ='<td align="center"  width="50"><input disabled type="text" name="id" id="id" value="'+id+'" ></td>'+
		'<td align="center" width="80"><textarea name="family" id="family">'+family+'</textarea></td>'+
		'<td align="center" width="80"><textarea name="subFamily" id="subFamily">'+subFamily+'</textarea></td>'+
		'<td align="center" width="80"><textarea name="tribe" id="tribe">'+tribe+'</textarea></td>'+
		'<td align="center" width="80"><textarea name="genus" id="genus">'+genus+'</textarea></td> '+
		'<td align="center" width="80"><textarea name="species" id="species">'+species+'</textarea></td>'+
		'<td align="center" width="200"><textarea name="locality_data" id="locality_data">'+locality_data+'</textarea></td> '+
		'<td align="center" width="200"><textarea name="deremination_label" id="deremination_label">'+deremination_label+'</textarea></td> '+
		'<td align="center" width="200" hidden><textarea name="idz" id="idz">'+idz+'</textarea></td> '+
		'<td align="center" width="120" id="contenedorForm" ><input class="boton" type = "button" onclick="capturarEnvio()"  value="Modificar"> <input class="boton" type="button" value="Cancelar" onclick="anular()"></td> ';

		nodo.parentNode.parentNode.innerHTML = nuevoCodigoHtml;
 
		editando = "true";}
	else {
		alert ('Solo se puede editar una línea. Recargue la página para poder editar otra');}
}


function capturarEnvio() {
	
	var nodoContenedorForm = document.getElementById('contenedorForm'); //Nodo DIV
	nodoContenedorForm.innerHTML = 
	'<form name="formulario" action="edit_data.php" method="POST" onreset="anular()">'+
	'<input type="hidden" name="id" value="'+document.querySelector('#id').value+'">'+
	'<input type="hidden" name="family" value="'+document.querySelector('#family').value+'">'+
	'<input type="hidden" name="subFamily" value="'+document.querySelector('#subFamily').value+'">'+
	'<input type="hidden" name="tribe" value="'+document.querySelector('#tribe').value+'">'+
	'<input type="hidden" name="genus" value="'+document.querySelector('#genus').value+'">'+
	'<input type="hidden" name="species" value="'+document.querySelector('#species').value+'">'+
	'<input type="hidden" name="locality_data" value="'+document.querySelector('#locality_data').value+'">'+
	'<input type="hidden" name="deremination_label" value="'+document.querySelector('#deremination_label').value+'">'+
	'<input type="hidden" name="idz" value="'+document.querySelector('#idz').value+'">'+
	'<input class="boton" type = "submit" value="Aceptar"> <input class="boton" type="reset" value="Cancelar">';

	document.formulario.submit();
}
function anular() {
	window.location.reload();
} 

function htmlspecialchars(str) {
 if (typeof(str) == "string") {
  str = str.replace(/&/g, "&amp;"); /* must do &amp; first */
  str = str.replace(/"/g, "&quot;");
  str = str.replace(/'/g, "&#039;");
  str = str.replace(/</g, "&lt;");
  str = str.replace(/>/g, "&gt;");
  }
 return str;
 }