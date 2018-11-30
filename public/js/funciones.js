//Documento esté cargado totalmente
$(function(){

	//Aplicar a la tabla, la libreria
	$('#tUsuarios').DataTable({
		processing: true,
        serverSide: true,
        aaSorting: [],/*Evita ordenar por defecto primer columna*/
        language:{
        		url: window.laravel.url+"/js/data-table-spanish.json",
        		searchPlaceholder: "Buscar..."
    	},
        ajax: {
            url: $('#tUsuarios').data('route'),
            type: "POST",
            data: {"_token":window.laravel.token}
        },
        columns: [
            { data: 'id', name: 'usuario.id' },
            { data: 'id', name: 'usuario.id' },
            { data: 'primer_nombre', name: 'usuario.primer_nombre' },
            { data: 'segundo_nombre', name: 'usuario.segundo_nombre' },
            { data: 'primer_apellido', name: 'usuario.primer_apellido' },
            { data: 'segundo_apellido', name: 'usuario.segundo_apellido' },
            { data: 'correo', name: 'usuario.correo' },
            { data: 'fecha_nacimiento', name: 'usuario.fecha_nacimiento' },
            //{ data: 'estado_id', name: 'estado_id' } //Sin enviar el nombre del Estado, solo id
            { data: 'estado.nombre', name: 'estado.nombre' }
        ],
        columnDefs: [
		    {	//Celda botones
		        targets: 0,
		        orderable:false,
		        createdCell: function (td, cellData, rowData, row, col){
		        	//Mostrar botones con los id de cada registro
		        	var html = '<a href="'+window.laravel.url+'/usuario/'+cellData+'/edit">'
					  		  +'<img src="'+window.laravel.url+'/svg/edit.svg" class="h-25"></a>'
					          +'<img src="'+window.laravel.url+'/svg/delete.svg" class="h-75 remove" '
					          +'onclick="deleteFila('+cellData+')" style="cursor:pointer;">';
					$(td).html(html);
		        }
		    },
		    {	//Celda Consecutivo Número de Registro, OJO NO ES EL ID
		        targets: 1,
		        orderable:false,
		        createdCell: function (td, cellData, rowData, row, col) {
		        	//Como row inicia desde 0, se le incrementa 1
		            $(td).html(++row);
		        }
		    }
	    ]
	});
	
});

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
					
					//Si el status es TRUE, se eliminó correctamente
					if(res.status){
						/*APLICA PARA CUANDO NO SE UTILIZABA DATATABLE
						$('#fila'+res.id).remove();*/

						//Con DATATABLE, se debe recargar la tabla
						$('#tUsuarios').DataTable().ajax.reload();
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