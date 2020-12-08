$(document).ready(function(){

	// accion de registro usuarios
	$("#registrar_cuenta").click(function() {
		alta_cuenta();
    });
	
	/*//accion de consultar para adoptar
    $("#btn_consulta_adoptar").click(function() {
		obtener_para_adoptar();
    });*/
	
});

function alta_cuenta() {
	// COMPLETAR - DEFINIR EL JSON A ENVIAR CON LOS DATOS DEL PRODUCTO
	let json_cuenta = {
		usuario: $("#usuario").val(),
		contrasena: $("#contrasena").val(),
		tipo_usuario: $("#tipo_usuario").val()
    };

	$.ajax({
        url: '/Suarez/BackEnd/cuenta.php',
        type: "POST",
        // COMPLETAR - ENVIAR EL JSON DEL PRODUCTO
        data: JSON.stringify(json_cuenta), // CONVERTIR EN STRING JSON
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