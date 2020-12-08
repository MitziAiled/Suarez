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

	$("#login").click(function() {
		login();
    });
	
});

function alta_usuario() {
	// COMPLETAR - DEFINIR EL JSON A ENVIAR CON LOS DATOS DEL PRODUCTO
	let json_usuario = {
		nombre: $("#nombre").val(),
		apellidos: $("#apellidos").val(),
		genero: $("#genero").val(),
		telefono_usuario: $("#telefono_usuario").val(),
		direccion: $("#direccion").val(),
		codigo_postal: $("#codigo_postal").val(),
		email: $("#email").val(),
		idcuentas: $("#idcuentas").val()
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

function obtener_idcuentas() {
	// COMPLETAR - CONFIGURAR LA SOLICITUD AJAX
	$.ajax({
        url: '../BackEnd/usuario.php',//donde esta mi web service
        type: "GET", // MÉTODO DE ACCESO
        dataType: "JSON", // FORMATO DE LOS DATOS
        success: function (data) {
        	// COMPLETAR - VERIFICAR QUE EXISTAN LOS PRODUCTOS
            if (data.usuarios) {
            	// COMPLETAR - LOS DATOS EN LA TABLA
				//consulta_idcuentas(data.usuarios);
				var h = data.usuarios;
            }
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error! " + status);
            console.log(xhr);
        }
    });
}

function consulta_idcuentas(usuarios) {
	for (let index in usuarios) {
		usuarios[index].idusuarios;	
	}
}

function login(){
	$(document).on('submit', '#formlogin', function(event){
		event.preventDefault();

		$.ajax({
			url: '../BackEnd/validar_usuario.php',
			type: 'POST',
			dataType: 'json',
			data: $(this).serialize(),
			beforeSend: function(){
			}
		})
		.done(function(respuesta){
			console.log(respuesta);
			if(!respuesta.error){
				if(respuesta.rol == '1'){
					if(respuesta.idusuarios=='1'){
						window.location.href = 'http://localhost/Suarez/FrontEnd/registro_usuario.php';
					}else if(respuesta.idusuarios=='2'){
						window.location.href = 'http://localhost/Suarez/FrontEnd/bienvenida.html';}
					location.href = 'bienvenida.html';
					alert("Bienvenido Usuario! Verifica que tus datos de perfil esten registrados correctamente.");
				}else if(respuesta.rol == '2'){
					location.href = 'bienvenidaInstitucion.html';
					alert("Bienvenida Institucion! Verifique que sus datos esten registrados correctamente.");
				}
			}else{
	
			}
		})
		.fail(function(resp){
            console.log(resp.responseText);
		})
		.always(function(){
			console.log("Completado");
		});
    });
}