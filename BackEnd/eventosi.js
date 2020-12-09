$(document).ready(function(){
	
	// accion de consultar instituciones
	$("#btn_consultar_instituciones").click(function() {
		obtener_instituciones();
	});

	// accion de registro instituciones
	$("#enviar_formulario").click(function() {
		alta_institucion();
    });
	
	// accion de edición 
	$("#btn_editar").click(function() {
		actualiza_institucion();
	});
});

function obtener_instituciones() {
	// COMPLETAR - CONFIGURAR LA SOLICITUD AJAX
	$.ajax({
        url: '../BackEnd/institucion.php',//donde esta mi web service
        type: "GET", // MÉTODO DE ACCESO
        dataType: "JSON", // FORMATO DE LOS DATOS
        success: function (data) {
        	// COMPLETAR - VERIFICAR QUE EXISTAN LOS PRODUCTOS
            if (data.instituciones) {
            	// COMPLETAR - LOS DATOS EN LA TABLA
                consulta_institucion(data.instituciones);
            }
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error! " + status);
            console.log(xhr);
        }
    });
}

function consulta_institucion(instituciones) {
	let html = '';
	for (let index in instituciones) {
		html += "<tr class='text-center'>" +
				"<td>"+instituciones[index].idinstituciones+"</td>" +
				"<td>"+instituciones[index].nombre_inst+"</td>" +
				"<td>"+instituciones[index].telefono+"</td>" +
				"<td>"+instituciones[index].direccion+"</td>" +
				"<td>"+instituciones[index].codigo_postal+"</td>" +
				"<td>"+instituciones[index].nombre_representante+"</td>" +
                "<td>"+instituciones[index].cargo_representante+"</td>" +
                "<td>"+instituciones[index].tipo_institucion+"</td>" +
                "<td>"+instituciones[index].identificacion_tributaria+"</td>" +
			"</tr>";
	}

	$("#tabla_consultainstitucion").html(html);
}

function alta_institucion() {
	// COMPLETAR - DEFINIR EL JSON A ENVIAR CON LOS DATOS DEL PRODUCTO
	let json_institucion = {
		nombre_inst: $("#nombre_inst").val(),
		telefono: $("#telefono").val(),
		direccion: $("#direccion").val(),
		codigo_postal: $("#codigo_postal").val(),
		nombre_representante: $("#nombre_representante").val(),
		cargo_representante: $("#cargo_representante").val(),
		tipo_institucion: $("#tipo_institucion").val(),
		identificacion_tributaria: $("#identificacion_tributaria").val(),
		idcuentas: $("#idcuentas").val()
    };

	$.ajax({
        url: '../BackEnd/institucion.php',
        type: "POST",
        // COMPLETAR - ENVIAR EL JSON DEL PRODUCTO
        data: JSON.stringify(json_institucion), // CONVERTIR EN STRING JSON
        success: function (data) {
        	// COMPLETAR - PROCESAR RESPUESTA
            alert(data.mensaje);
            //cargar de nuevo la página
            location.reload();
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error! " + status);
            console.log(xhr);
        }
    });
}

function actualiza_institucion() {
	// COMPLETAR - DEFINIR EL JSON A ENVIAR CON LOS DATOS DEL PRODUCTO
	let json_institucion = {
		idinstituciones: $("#idinstituciones").val(),
		nombre_inst: $("#nombre_inst").val(),
		telefono: $("#telefono").val(),
		direccion: $("#direccion").val(),
        codigo_postal: $("#codigo_postal").val(),
        nombre_representante: $("#nombre_representante").val(),
		cargo_representante: $("#cargo_representante").val(),
		tipo_institucion: $("#tipo_institucion").val(),
		identificacion_tributaria: $("#identificacion_tributaria").val(),
    };

	$.ajax({
        url: '../BackEnd/institucion.php',
        type: "PUT",
        // COMPLETAR - ENVIAR EL JSON DEL PRODUCTO
        data: JSON.stringify(json_institucion), // CONVERTIR EN STRING JSON
        success: function (data) {
        	// COMPLETAR - PROCESAR RESPUESTA
            alert(data.mensaje);

            location.reload();
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error! " + status);
            console.log(xhr);
        }
    });
}