<?php

require_once("base_de_datos.php");

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        $usuarios = consulta_idcuentas();

        header ('Content-Type:application/json');
            
        $idcuentas = 0;
        foreach($usuarios as $item){
                $idcuentas = $item;
         }

        $respuesta = [
            "mensaje" => "Consulta exitosa",
            "usuarios" => $idcuentas
        ];
        echo json_encode($respuesta);

    }else if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $datos_recibidos = json_decode(file_get_contents("php://input"));  
        
        $nombre= $datos_recibidos->nombre;
        $apellidos = $datos_recibidos->apellidos;
        $genero = $datos_recibidos->genero;
        $telefono_usuario = $datos_recibidos->telefono_usuario;
        $direccion = $datos_recibidos->direccion;
        $codigo_postal = $datos_recibidos->codigo_postal;
        $email = $datos_recibidos->email;
        $idcuentas = $datos_recibidos->idcuentas;

        $resultado = alta_usuario($nombre, $apellidos, $genero, $telefono_usuario, $direccion, $codigo_postal, $email, $idcuentas);

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
		error_log(file_get_contents("php://input"));
		// contenido de proceso PUT
		$datos_recibidos = json_decode(
			file_get_contents("php://input")
		);

        $idusuarios = $datos_recibidos->idusuarios;
        $nombre = $datos_recibidos->nombre;
        $apellidos = $datos_recibidos->apellidos;
		$telefono_usuario = $datos_recibidos->telefono_usuario;
		$direccion = $datos_recibidos->direccion;
		$codigo_postal = $datos_recibidos->codigo_postal;
		$email = $datos_recibidos->email;
		// procesar algoritmo

		$resultado = actualizar_usuarios($idusuarios, $nombre, $apellidos ,$telefono_usuario, $direccion, $codigo_postal, $email);

		if ($resultado !=null ) {
			# sí se actualizó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "Actualización correcta. Para que se reflejen los cambios debe de volver a iniciar sesión."
			];

			echo json_encode($respuesta);
		} else {
			// no se actualizó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "No se pudo actualizar"
			];

			echo json_encode($respuesta);
		}

    }else{
        echo "Hubo un error";
    }
?>