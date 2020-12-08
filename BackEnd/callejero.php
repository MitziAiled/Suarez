<?php

require_once("base_de_datos.php");

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $callejeros = consulta_callejero();

        if(is_array($callejeros)){
            header ('Content-Type:application/json');
            
            $array_callejeros = [];
            foreach($callejeros as $item){
                $array_callejeros[] = $item;
            }

            $respuesta = [
                "mensaje" => "Consulta exitosa",
                "callejeros" => $array_callejeros
            ];
            echo json_encode($respuesta);
        }

    }else if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $datos_recibidos = json_decode(file_get_contents("php://input"));  
        
        $calle = $datos_recibidos->calle;
        $colonia = $datos_recibidos->colonia;
        $ciudad = $datos_recibidos->ciudad;
        $estado = $datos_recibidos->estado;
        $rasgos_fisicos = $datos_recibidos->rasgos_fisicos;
        $condicion = $datos_recibidos->condicion;

        $resultado = alta_callejero($calle, $colonia, $ciudad, $estado, $rasgos_fisicos, $condicion);

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

    }else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        $datos_recibidos = json_decode(file_get_contents("php://input"));

        $idcallejeros = $datos_recibidos->idcallejeros;

        $resultado = modificar_estatus($idcallejeros);

        if($resultado != null) {
            header ('Content-Type: application/json');
        
            $respuesta = [
                "mensaje" => "Actualización exitosa"
            ];
    
            echo json_encode($respuesta);
        }else{
            header ('Content-Type: application/json');
        
            $respuesta = [
                "mensaje" => "No se pudo actualizar"
            ];
    
            echo json_encode($respuesta);
        }        

    }else{
        echo "Hubo un error";
    }
?>