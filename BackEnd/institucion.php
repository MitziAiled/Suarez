<?php

require_once("base_de_datos.php");

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $instituciones = consulta_institucion();

        if(is_array($instituciones)){
            header ('Content-Type:application/json');
            
            $array_instituciones = [];
            foreach($instituciones as $item){
                $array_instituciones[] = $item;
            }

            $respuesta = [
                "mensaje" => "Consulta exitosa",
                "instituciones" => $array_instituciones
            ];
            echo json_encode($respuesta);
        }

    }else if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $datos_recibidos = json_decode(file_get_contents("php://input"));  
        
        $nombre_inst= $datos_recibidos->nombre_inst;
        $telefono = $datos_recibidos->telefono;
        $direccion = $datos_recibidos->direccion;
        $codigo_postal = $datos_recibidos->codigo_postal;
        $nombre_representante = $datos_recibidos->nombre_representante;
        $cargo_representante = $datos_recibidos->cargo_representante;
        $tipo_institucion = $datos_recibidos->tipo_institucion;
        $identificacion_tributaria = $datos_recibidos->identificacion_tributaria;
        $idcuentas = $datos_recibidos->idcuentas;

        $resultado = alta_institucion($nombre_inst, $telefono, $direccion, $codigo_postal, $nombre_representante, $cargo_representante, $tipo_institucion, $identificacion_tributaria, $idcuentas);

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
        //Contenido de proceso PUT
        $datos_recibidos = json_decode(file_get_contents("php://input"));

        $idinstituciones = $datos_recibidos->idinstituciones;
        $nombre_inst = $datos_recibidos->nombre_inst;
        $telefono = $datos_recibidos->telefono;
        $direccion = $datos_recibidos->direccion;
        $codigo_postal = $datos_recibidos->codigo_postal;
        $nombre_representante = $datos_recibidos->nombre_representante;
        $cargo_representante = $datos_recibidos->cargo_representante;
        $tipo_institucion = $datos_recibidos->tipo_institucion;
        $identificacion_tributaria = $datos_recibidos->identificacion_tributaria;
        
        $resultado = actualizar_institucion($idinstituciones, $nombre_inst, $telefono, $direccion, $codigo_postal, $nombre_representante, $cargo_representante, $tipo_institucion, $identificacion_tributaria);

        if($resultado != null) {
            //si se actualizó
            header ('Content-Type: application/json'); //La respuesta es en json
        
            $respuesta = [
                "mensaje" => "Actualización correcta. Para que se reflejen los cambios debe de volver a iniciar sesión."
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
        echo "Hubo un error";
    }
?>