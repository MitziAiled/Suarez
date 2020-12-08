<?php

require_once("base_de_datos.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $datos_recibidos = json_decode(file_get_contents("php://input"));  

        $idcallejeros = $datos_recibidos->idcallejeros;
        $idusuarios = $datos_recibidos->idusuarios;
        $idinstituciones = $datos_recibidos->idinstituciones;
        $nombre_mascota = $datos_recibidos->nombre_mascota;
        $ocupacion_adoptante = $datos_recibidos->ocupacion_adoptante;
        $ingresos_adoptante = $datos_recibidos->ingresos_adoptante;

        $resultado = alta_adopcion($idcallejeros, $idusuarios, $idinstituciones, $nombre_mascota, $ocupacion_adoptante, $ingresos_adoptante);

        if ($resultado != null){
            header ('Content-Type:application/json');
        
            $respuesta = [
                "mensaje" => "Registro exitoso"
            ];

            echo json_encode($respuesta);
        }else{
            header ('Content-Type:application/json');
        
            $respuesta = [
                "mensaje" => "No se pudo registrar"
            ];
            echo json_encode($respuesta);
        }

    }else if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $adopciones = consulta_adopcion();
        
        if(is_array($adopciones)){
            header ('Content-Type:application/json');
            
            $array_adopciones = [];
            foreach($adopciones as $item){
                $array_adopciones[] = $item;
            }

            $respuesta = [
                "mensaje" => "Consulta exitosa",
                "adopciones" => $array_adopciones
            ];
            echo json_encode($respuesta);
        }
    }else{
        echo "Hubo un error";
    }
?>