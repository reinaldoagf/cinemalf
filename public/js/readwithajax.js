$(document).ready(function(){
	load();
	console.log('Cargado');
});
function load(){
	var table=$("#data");
	var route="http://cinemalf.dev/gender";
	$("#data").empty();
	$.get(route, function(response){
		$(response).each(function(key,value){
			table.append("<tr><td>"+value.genre+"</td><td><button value="+value.id+" OnClick='showGender(this);' class='btn btn-primary'  data-toggle= 'modal' data-target='#myModal'﻿>Editar</button> &nbsp; <button class='btn btn-large btn-danger' value="+value.id+" OnClick='confirmAction(this);' ﻿>Eliminar</button></td></tr>");
		});
	});
}
function confirmAction(btn){
	var response =confirm("Pueden existir peliculas vinculadas a este genero. ¿Desea eliminar el genero y las peliculas vinculadas?");
	if (response == true) {
    	deleteGender(btn);
	} 
}
function deleteGender(btn){
	var route = "http://cinemalf.dev/gender/"+btn.value;
	var token = $("#token").val();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'DELETE',
		dataType: 'json',
		success: function(){
			console.log("eliminado");
			load();//cargar tabla
			$("#msj-danger").fadeIn();
		}
	});
	console.log("route:"+route);
}
function showGender(btn){
	var route="http://cinemalf.dev/gender/"+btn.value+"/edit";
	$.get(route,function(response){
		$("#genre").val(response.genre);
		$("#id").val(response.id);
	});
}

$("#update").click(function(){
	var value = $("#id").val();
	var data = $("#genre").val();
	var route = "http://cinemalf.dev/gender/"+value;
	var token = $("#token").val();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: {genre: data},
		success: function(){
			load();//cargar tabla
			$("#genre").val("");
			$("#myModal").modal('toggle');//ocultar modal
			$("#msj-success").fadeIn();
		}
	});
});