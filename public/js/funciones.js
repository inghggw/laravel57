function deleteFila(id){
	//console.log(id);
	//console.log(window.laravel.url);
	$.ajax({
		url:window.laravel.url+'/usuario/'+id,
		type: 'POST',
		data: {_token:window.laravel.token,
			   _method:'DELETE'},
	})
	.done(function(res) {
		console.log(res);
		console.log("success");
		$('#fila'+res).remove();
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
}

/*$('.remove').on('click',function(){
		$(this).parents('tr').remove();
})*/