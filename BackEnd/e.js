$(document).ready(function(){
    obtener_id();

    //accion de modificar estatus callejero
    $("#btn_modificar_estatus").click(function() {
		actualizar_estatus();
    });
    
    //accion de registro adopcion
    $("#btn_registrar_adopcion").click(function() {
		alta_adopcion();
    });
    
    //accion de registro adopcion
    $("#btn_consulta_adopciones").click(function() {
		obtener_adopciones();
	});
});

function obtener_id() {
	var x = location.search;

   //Mostramos los valores en consola:
   console.log(x);
   //document.getElementById("myURL").value = "8";
   //Creamos la instancia
   var urlParams = new URLSearchParams(x);

   //Accedemos a los valores
   var producto = urlParams.get('id');
   console.log(producto);
   document.getElementById("idcallejeros").value = producto;
} 

function actualizar_estatus() {
	// COMPLETAR - DEFINIR EL JSON A ENVIAR CON LOS DATOS DEL PRODUCTO
	let json_calljero = {
        idcallejeros: $("#idcallejeros").val()
    };

	$.ajax({
        url: '../BackEnd/callejero.php',
        type: "PUT",
        // COMPLETAR - ENVIAR EL JSON DEL PRODUCTO
        data: JSON.stringify(json_calljero), // CONVERTIR EN STRING JSON
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

function alta_adopcion() {
	// COMPLETAR - DEFINIR EL JSON A ENVIAR CON LOS DATOS DEL PRODUCTO
	let json_adoptante = {
        idcallejeros: $("#idcallejeros").val(),
        idusuarios:$("#idusuarios").val(),
        idinstituciones:$("#idinstituciones").val(),
        nombre_mascota:$("#nombre_mascota").val(),
        ocupacion_adoptante:$("#ocupacion_adoptante").val(),
        ingresos_adoptante:$("#ingresos_adoptante").val()
    };

	$.ajax({
        url: '/Suarez/BackEnd/adoptante.php',
        type: "POST",
        // COMPLETAR - ENVIAR EL JSON DEL PRODUCTO
        data: JSON.stringify(json_adoptante), // CONVERTIR EN STRING JSON
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

    
    function obtener_adopciones() {
        // COMPLETAR - CONFIGURAR LA SOLICITUD AJAX
        $.ajax({
            url: '../BackEnd/adoptante.php',//donde esta mi web service
            type: "GET", // MÉTODO DE ACCESO
            dataType: "JSON", // FORMATO DE LOS DATOS
            success: function (data) {
                // COMPLETAR - VERIFICAR QUE EXISTAN LOS PRODUCTOS
                if (data.adopciones) {
                    // COMPLETAR - LOS DATOS EN LA TABLA
                    consulta_adopcion(data.adopciones);
                }
            },
            error: function (xhr, status) {
                alert("Ha ocurrido un error! " + status);
                console.log(xhr);
            }
        });
    }
    
    function consulta_adopcion(adopciones) {
        let html = '';
        for (let index in adopciones) {
            html += "<tr class='text-center'>" +
                    "<td>"+adopciones[index].idadopciones+"</td>" +
                    "<td>"+adopciones[index].nombre+"</td>" +
                    "<td>"+adopciones[index].apellidos+"</td>" +
                    "<td>"+adopciones[index].direccion+"</td>" +
                    "<td>"+adopciones[index].codigo_postal+"</td>" +
                    "<td>"+adopciones[index].telefono+"</td>" +
                    "<td>"+adopciones[index].genero+"</td>" +
                    "<td>"+adopciones[index].email+"</td>" +
                    "<td>"+adopciones[index].ocupacion_adoptante+"</td>" +
                    "<td>"+adopciones[index].ingresos_adoptante+"</td>" +
                    "<td>"+adopciones[index].nombre_mascota+"</td>" +
                    "<td>"+adopciones[index].nombre+"</td>" +
                "</tr>";
        }
    
        $("#tabla_consulta_adoptados").html(html);
    }
}