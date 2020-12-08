$(document).ready(function(){
	
	// accion de registro callejero
	$("#enviar_formulario").click(function() {
		alta_callejero();
	});

	// accion de consultar callejero
	$("#btn_consultar").click(function() {
		obtener_callejeros();
    });
	
	//accion de consultar para adoptar
    $("#btn_consulta_adoptar").click(function() {
		obtener_para_adoptar();
	});
	
});

function obtener_callejeros() {
	// COMPLETAR - CONFIGURAR LA SOLICITUD AJAX
	$.ajax({
        url: '../BackEnd/callejero.php',//donde esta mi web service
        type: "GET", // MÉTODO DE ACCESO
        dataType: "JSON", // FORMATO DE LOS DATOS
        success: function (data) {
        	// COMPLETAR - VERIFICAR QUE EXISTAN CALLEJEROS
            if (data.callejeros) {
            	// COMPLETAR - LOS DATOS EN LA TABLA
                consulta_callejero(data.callejeros);
            }
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error! " + status);
            console.log(xhr);
        }
    });
}

function consulta_callejero(callejeros) {
	let html = '';
	for (let index in callejeros) {
		html += "<tr class='text-center'>" +
				"<td>"+callejeros[index].idcallejeros+"</td>" +
				"<td>"+callejeros[index].calle+"</td>" +
				"<td>"+callejeros[index].colonia+"</td>" +
				"<td>"+callejeros[index].ciudad+"</td>" +
				"<td>"+callejeros[index].estado+"</td>" +
				"<td>"+callejeros[index].rasgos_fisicos+"</td>" +
				"<td>"+callejeros[index].condicion+"</td>" +
			"</tr>";
	}

	$("#tabla_consultacallejero").html(html);
}

function alta_callejero() {
	// COMPLETAR - DEFINIR EL JSON A ENVIAR CON LOS DATOS DE LOS CALLEJEROS
	let json_callejero = {
		calle: $("#calle").val(),
		colonia: $("#colonia").val(),
		ciudad: $("#ciudad").val(),
		estado: $("#estado").val(),
		rasgos_fisicos: $("#rasgos_fisicos").val(),
		condicion: $("#condicion").val()
    };

	$.ajax({
        url: '/Suarez/BackEnd/callejero.php',
        type: "POST",
        // COMPLETAR - ENVIAR EL JSON DEL CALLEJERO
        data: JSON.stringify(json_callejero), // CONVERTIR EN STRING JSON
        success: function (data) {
        	// COMPLETAR - PROCESAR RESPUESTA
            alert(data.mensaje);
            //CARGAR DE NUEVO LA PÁGINA
            location.reload();
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error! " + status);
            console.log(xhr);
        }
    });
}

function obtener_para_adoptar() {
	// COMPLETAR - CONFIGURAR LA SOLICITUD AJAX
	$.ajax({
        url: '../BackEnd/callejero.php',//donde esta mi web service
        type: "GET", // MÉTODO DE ACCESO
        dataType: "JSON", // FORMATO DE LOS DATOS
        success: function (data) {
        	// COMPLETAR - VERIFICAR QUE EXISTAN CALLEJEROS
            if (data.callejeros) {
            	// COMPLETAR - LOS DATOS EN LA TABLA
                consulta_para_adoptar(data.callejeros);
            }
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error! " + status);
            console.log(xhr);
        }
    });
}

function consulta_para_adoptar(callejeros) {
	let html = '';
	for (let index in callejeros) {
		html += "<tr class='text-center'>" +
				"<td>"+callejeros[index].idcallejeros+"</td>" +
				"<td>"+callejeros[index].calle+"</td>" +
				"<td>"+callejeros[index].colonia+"</td>" +
				"<td>"+callejeros[index].ciudad+"</td>" +
				"<td>"+callejeros[index].estado+"</td>" +
				"<td>"+callejeros[index].rasgos_fisicos+"</td>" +
				"<td>"+callejeros[index].condicion+"</td>" +
				"<td><a href=addAdoptante.html?id="+callejeros[index].idcallejeros+">Adoptar</a></td"+
			"</tr>";
	}

	$("#tabla_consulta_adoptar").html(html);
}