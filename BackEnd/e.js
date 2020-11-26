$(document).ready(function(){
    obtener_id();
});

function obtener_id() {
	var x = location.search;

   //Mostramos los valores en consola:
   console.log(x);
   //document.getElementById("myURL").value = "8";
   //Creamos la instancia
   var urlParams = new URLSearchParams(x);

   //Accedemos a los valores
   var producto = urlParams.get('idcallejeros');
   console.log(producto);
   document.getElementById("idCallejero").value = producto;
} 
