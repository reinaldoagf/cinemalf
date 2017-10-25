$("#registro").click(function(){
	var dataGenre=$("#genre").val();
	var route="http://cinemalf.dev/gender";
	var token=$("#token").val();
	console.log("Valor de data:"+dataGenre);	
	console.log("Valor de token:"+token);
	console.log("Valor de route:"+route);
	$.ajax({
		url: route,
		headers:{
			'X-CSRF-TOKEN':token
		},
		type: 'POST',
		dataType: 'json',
		data:{
			genre: dataGenre
		},
		 success:function(){ 
		 	$('#msj-success').fadeIn(); 
		 	$('#genre').val(''); 
		 }
	});
});