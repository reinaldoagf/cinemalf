$(document).ready(function(){
	var table=$("#data");
	var route="http://cinemalf.dev/gender";
	// var token=;
	$.get(route, function(res){
		var i=0;
		$(res).each(function(key,value){
			table.append("<tr><td>"+value.genre+"</td><td><button class='btn btn-primary'>Editar</button> &nbsp; <button class='btn btn-danger'>Eliminar</button></td></tr>");
		});
	});
});