<?php

require_once("base_de_datos.php");

    //verificar si es método GET (CONSULTA)
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        //Consultar por id
        //Consultar todo
        $callejeros = consulta_callejero();

        if(is_array($callejeros)){ //si tiene elementos
            //si hay elementos
            header ('Content-Type:application/json'); //La respuesta es en json
            
            $array_callejeros = [];
            foreach($callejeros as $item){//obtener todo del resultado de la bd
                $array_callejeros[] = $item; //agrega cada callejero al arreglo de callejeros
            }

            $respuesta = [
                "mensaje" => "Consulta exitosa",
                "callejeros" => $array_callejeros
            ];
            echo json_encode($respuesta);
        }

        //Algoritmo o proceso

    }else if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $datos_recibidos = json_decode(file_get_contents("php://input"));  
        
        //Paso 1. Ontener valores de la solicitud
        $calle = $datos_recibidos->calle;
        $colonia = $datos_recibidos->colonia;
        $ciudad = $datos_recibidos->ciudad;
        $estado = $datos_recibidos->estado;
        $rasgos_fisicos = $datos_recibidos->rasgos_fisicos;
        $condicion = $datos_recibidos->condicion;
        /*$calle = $_POST['calle'];
        $colonia = $_POST['colonia'];
        $ciudad = $_POST['ciudad'];
        $estado = $_POST['estado'];
        $rasgos_fisicos = $_POST['rasgos'];
        $condicion = $_POST['condicion'];*/

        //registrar en la BD
        $resultado = alta_callejero($calle, $colonia, $ciudad, $estado, $rasgos_fisicos, $condicion);

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

    }else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        //Contenido de proceso PUT
        $datos_recibidos = json_decode(file_get_contents("php://input"));

        $idcallejeros = $datos_recibidos->idcallejeros;

        $resultado = modificar_estatus($idcallejeros);

        if($resultado != null) {
            //si se actualizó
            header ('Content-Type: application/json'); //La respuesta es en json
        
            $respuesta = [
                "mensaje" => "Actualización exitosa"
            ];
    
            echo json_encode($respuesta);
        }else{
            //no se actualizó
            header ('Content-Type: application/json'); //La respuesta es en json
        
            $respuesta = [
                "mensaje" => "No se pudo actualizar"
            ];
    
            echo json_encode($respuesta);
        }        

    }else{
        //Procesar error y responder
    }
?>