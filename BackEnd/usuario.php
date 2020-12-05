<?php

require_once("base_de_datos.php");//FALTA HACER LO DE AQUI

    //verificar si es método POST (ALTA)
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $datos_recibidos = json_decode(file_get_contents("php://input"));  
        
        //Paso 1. Obtener valores de la solicitud
        $nombre= $datos_recibidos->nombre;
        $apellidos = $datos_recibidos->apellidos;
        $genero = $datos_recibidos->genero;
        $telefono_usuario = $datos_recibidos->telefono_usuario;
        $direccion = $datos_recibidos->direccion;
        $codigo_postal = $datos_recibidos->codigo_postal;
        $email = $datos_recibidos->email;
        $idcuentas = $datos_recibidos->idcuentas;

        //registrar en la BD
        $resultado = alta_usuario($nombre, $apellidos, $genero, $telefono_usuario, $direccion, $codigo_postal, $email, $idcuentas);

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