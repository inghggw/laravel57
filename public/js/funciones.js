function deleteFila(id){
	//console.log(id);
	//console.log(window.laravel.url);

	bootbox.confirm({
    message: "¿Está seguro de eliminar el registro?",
    buttons: {
        confirm: {
            label: 'Si',
            className: 'btn-danger'
        },
        cancel: {
            label: 'No',
            className: 'btn-info'
        }
    },
	callback: function (result) {
	        console.log(result);
	        //Si oprime "si", devuelve true, entonces entra al if para hacer el ajax
	        if(result){
	        	$.ajax({
					url:window.laravel.url+'/usuario/'+id,
					type: 'POST',
					data: {_token:window.laravel.token,
						   _method:'DELETE'},
				})
				.done(function(res) {
					console.log(res);//Ver en la consola lo que devuelve el metodo del controller consultado∫
					console.log("Ajax ok.");
					//Si el status es TRUE, elimina la fila
					if(res.status){
						$('#fila'+res.id).remove();	
					}else{
						alert(res.msj);
					}
				}).fail(function(res) {
					console.log("error:");
					console.log(res);
				});
	        }
	    }
	});	
}

/*FORMA SIN ESPERAR LA RESPUESTA DEL AJAX
$('.remove').on('click',function(){
		$(this).parents('tr').remove();
})*/