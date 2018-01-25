$(document).ready(function(){
	loadGenders();
});
function loadGenders(){
	var table=$("#data");
	var route=$("#genderIndex").attr("href")
	//var route="http://cinemalf.dev/gender";
	console.log('route: '+route);
	$("#data").empty();
	$.get(route, function(response){
		console.log(response);
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
function deleteGender(btn,routeNumber=1){
	if (routeNumber==1) {		
		var route = "http://cinemalf.dev/gender/"+btn.value;
	}else{
		var route='http://192.168.1.3/cinemalf/public/gender/'+btn.value
	}
	var token = $("#token").val();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'DELETE',
		dataType: 'json',
		success: function(){
			console.log("eliminado");
			loadGenders();//cargar tabla
			$("#msj-danger").fadeIn();
		},
		error: function(){		
			deleteGender(btn,2)
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
		route='http://192.168.1.3/cinemalf/public/gender/'+btn.value+"/edit";
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
			loadGenders();//cargar tabla
			$("#genre").val("");
			$("#myModal").modal('toggle');//ocultar modal
			$("#msj-success").fadeIn();
		}
	});
});