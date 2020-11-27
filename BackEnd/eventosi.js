$(document).ready(function(){
	
	// accion de registro callejero
	$("#btn_consultar_instituciones").click(function() {
		obtener_instituciones();
	});

	// accion de consultar callejero
	/*$("#btn_consultar").click(function() {
		obtener_callejeros();
    });
	
	//accion de consultar para adoptar
    $("#btn_consulta_adoptar").click(function() {
		obtener_para_adoptar();
    });*/

	/*prueba
    $("#btn_id").click(function() {
		obtener_id();
	});*/
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
				"<td>"+instituciones[index].nombre+"</td>" +
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