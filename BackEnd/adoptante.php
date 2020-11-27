<?php

require_once("base_de_datos.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $datos_recibidos = json_decode(file_get_contents("php://input"));  
        
        //Paso 1. Obtener valores de la solicitud
        $idcallejeros = $datos_recibidos->idcallejeros;
        $idusuarios = $datos_recibidos->idusuarios;
        $idinstituciones = $datos_recibidos->idinstituciones;
        $nombre_mascota = $datos_recibidos->nombre_mascota;
        $ocupacion_adoptante = $datos_recibidos->ocupacion_adoptante;
        $ingresos_adoptante = $datos_recibidos->ingresos_adoptante;

        //registrar en la BD
        $resultado = alta_adopcion($idcallejeros, $idusuarios, $idinstituciones, $nombre_mascota, $ocupacion_adoptante, $ingresos_adoptante);

        if ($resultado != null){
            //Si se realizo
            header ('Content-Type:application/json'); //La respuesta es en json
        
            $respuesta = [
                "mensaje" => "Registro exitoso"
            ];

            echo json_encode($respuesta);
        }else{
            //no se realizo
            header ('Content-Type:application/json'); //La respuesta es en json
        
            $respuesta = [
                "mensaje" => "No se pudo registrar"
            ];

            echo json_encode($respuesta);
        }

    }else{
        //Procesar error y responder
    }
?>