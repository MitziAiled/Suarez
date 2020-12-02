$(document).ready(function(){
	
	// accion de consultar instituciones
	/*$("#btn_consultar_instituciones").click(function() {
		obtener_instituciones();
	});*/

	// accion de registro usuarios
	$("#enviar_formulario").click(function() {
		alta_usuario();
    });
	
	/*//accion de consultar para adoptar
    $("#btn_consulta_adoptar").click(function() {
		obtener_para_adoptar();
    });*/

	/*prueba
    $("#btn_id").click(function() {
		obtener_id();
	});*/
});

function alta_usuario() {
	// COMPLETAR - DEFINIR EL JSON A ENVIAR CON LOS DATOS DEL PRODUCTO
	let json_usuario = {
		nombre: $("#nombre").val(),
		apellidos: $("#apellidos").val(),
		genero: $("#genero").val(),
		telefono: $("#telefono").val(),
		direccion: $("#direccion").val(),
		codigo_postal: $("#codigo_postal").val(),
		email: $("#email").val()
    };

	$.ajax({
        url: '/Suarez/BackEnd/usuario.php',
        type: "POST",
        // COMPLETAR - ENVIAR EL JSON DEL PRODUCTO
        data: JSON.stringify(json_usuario), // CONVERTIR EN STRING JSON
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