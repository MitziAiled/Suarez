<?php

require_once("base_de_datos.php");
 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $datos_recibidos = json_decode(file_get_contents("php://input"));  
        
        $usuario= $datos_recibidos->usuario;
        $contrasena = $datos_recibidos->contrasena;
        $tipo_usuario = $datos_recibidos->tipo_usuario;

        $resultado = registrar_cuenta($usuario, $contrasena, $tipo_usuario);

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

    }else{
        echo "Hubo un error";
    }
?>