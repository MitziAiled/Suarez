<?php

require_once("base_de_datos.php");

    /*if($_SERVER['REQUEST_METHOD'] == 'GET'){

        $usuarios = consulta_idcuentas();

        header ('Content-Type:application/json'); //La respuesta es en json
            
        $idcuentas = 0;
        foreach($usuarios as $item){//obtener todo del resultado de la bd
                $idcuentas = $item; //agrega cada callejero al arreglo de callejeros
         }

        $respuesta = [
            "mensaje" => "Consulta exitosa",
            "usuarios" => $idcuentas
        ];
        echo json_encode($respuesta);

        //Algoritmo o proceso

    }else*/ 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $datos_recibidos = json_decode(file_get_contents("php://input"));  
        
        //Paso 1. Obtener valores de la solicitud
        $usuario= $datos_recibidos->usuario;
        $contrasena = $datos_recibidos->contrasena;
        $tipo_usuario = $datos_recibidos->tipo_usuario;

        //registrar en la BD
        $resultado = registrar_cuenta($usuario, $contrasena, $tipo_usuario);

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