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
});

function obtener_id() {
	var x = location.search;

   //Mostramos los valores en consola:
   console.log(x);
   //document.getElementById("myURL").value = "8";
   //Creamos la instancia
   var urlParams = new URLSearchParams(x);

   //Accedemos a los valores
   var producto = urlParams.get('idCallejeros');
   console.log(producto);
   document.getElementById("idCallejero").value = producto;
} 

function actualizar_estatus() {
	// COMPLETAR - DEFINIR EL JSON A ENVIAR CON LOS DATOS DEL PRODUCTO
	let json_calljero = {
        idcallejeros: $("#idCallejero").val()
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