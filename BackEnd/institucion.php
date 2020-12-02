<?php

require_once("base_de_datos.php");//FALTA HACER LO DE AQUI

    //verificar si es método GET (CONSULTA)
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        //Consultar por id
        //Consultar todo
        $instituciones = consulta_institucion();

        if(is_array($instituciones)){ //si tiene elementos
            //si hay elementos
            header ('Content-Type:application/json'); //La respuesta es en json
            
            $array_instituciones = [];
            foreach($instituciones as $item){//obtener todo del resultado de la bd
                $array_instituciones[] = $item; //agrega cada callejero al arreglo de callejeros
            }

            $respuesta = [
                "mensaje" => "Consulta exitosa",
                "instituciones" => $array_instituciones
            ];
            echo json_encode($respuesta);
        }

        //Algoritmo o proceso

    }else if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $datos_recibidos = json_decode(file_get_contents("php://input"));  
        
        //Paso 1. Obtener valores de la solicitud
        $nombre_inst= $datos_recibidos->nombre_inst;
        $telefono = $datos_recibidos->telefono;
        $direccion = $datos_recibidos->direccion;
        $codigo_postal = $datos_recibidos->codigo_postal;
        $nombre_representante = $datos_recibidos->nombre_representante;
        $cargo_representante = $datos_recibidos->cargo_representante;
        $tipo_institucion = $datos_recibidos->tipo_institucion;
        $identificacion_tributaria = $datos_recibidos->identificacion_tributaria;

        //registrar en la BD
        $resultado = alta_institucion($nombre_inst, $telefono, $direccion, $codigo_postal, $nombre_representante, $cargo_representante, $tipo_institucion, $identificacion_tributaria);

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

    }/*else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
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

    }*/else{
        //Procesar error y responder
    }
?>