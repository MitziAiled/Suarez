<?php

require_once("base_de_datos.php");

    //verificar si es método GET (CONSULTA)
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        //Consultar por id
        //isset()-> determinar si existe una variable o valor
       /* if(isset($_GET['idcallejeros'])){
            //Buscar callejero
            $idcallejeros = $_GET['idcallejeros'];
            header ('Content-Type:application/json'); //La respuesta es en json
            //Va a guardar toda la definición del json
            $respuesta = [
                "mensaje" => "Proceso exitoso",
                "productos" => [
                    (object)[
                        "idcallejeros" => "001",
                        "calle" => "San Edmundo",
                        "colonia" => "San Manuel",
                        "ciudad" => "León",
                        "estado" => "Guanajuato",
                        "rasgos_fisicos" => "blanco con manchas negras",
                        "estatus" => "adoptado"
                    ], (object)[
                        "idcallejeros" => "002",
                        "calle" => "Emperador",
                        "colonia" => "Real Providencia",
                        "ciudad" => "León",
                        "estado" => "Guanajuato",
                        "rasgos" => "cafe con rastas",
                        "estatus" => "adoptado"
                    ]
                ]
            ];
            echo json_encode($respuesta);
        }else{*/
            //Consultar todo
            $callejeros = consulta_callejero();

            header ('Content-Type:application/json'); //La respuesta es en json
            //Va a guardar toda la definición del json
            $respuesta = [
                "mensaje" => "Consulta exitosa",
                "callejeros" => [
                    (object)[
                        "idcallejeros" => "001",
                        "calle" => "San Edmundo",
                        "colonia" => "San Manuel",
                        "ciudad" => "León",
                        "estado" => "Guanajuato",
                        "rasgos_fisicos" => "blanco con manchas negras",
                        "estatus" => "adoptado"
                    ], (object)[
                        "idcallejeros" => "002",
                        "calle" => "Emperador",
                        "colonia" => "Real Providencia",
                        "ciudad" => "León",
                        "estado" => "Guanajuato",
                        "rasgos_fisicos" => "cafe con rastas",
                        "estatus" => "adoptado"
                    ]
                ]
            ];
            echo json_encode($respuesta);
        //}

        //Algoritmo o proceso

    }else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Contenido de proceo POST
        //Paso 1. Ontener valores de la solicitud
        /*$idcallejeros = $_POST['idcallejeros']; 
        $calle = $_POST['calle'];
        $colonia = $_POST['colonia'];
        $ciudad = $_POST['ciudad'];
        $estado = $_POST['estado'];
        $rasgos = $_POST['rasgos'];
        $condicion = $_POST['condicion'];*/

        $resultado = alta_callejero($calle, $colonia, $ciudad, $estado, $rasgos_fisicos, $condicion);

        //Algoritmo o proceso
        header ('Content-Type:application/json'); //La respuesta es en json
        
        $respuesta = [
            "mensaje" => "Registro exitoso"
        ];

        echo json_encode($respuesta);

    }else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        //Contenido de proceso PUT
        /*$datos_recibidos = json_decode(file_get_contents("php://input"));

        $idcallejeros = $datos_recibidos->idcallejeros;
        $calle = $datos_recibidos->calle;
        $colonia = $datos_recibidos->colonia;
        $estado = $datos_recibidos->estado;
        $rasgos = $datos_recibidos->rasgos;
        $condicion = $datos_recibidos->condicion;
        $estatus = $datos_recibidos->estatus;*/

        $resultado = adoptar_callejero($idcallejeros);

        header ('Content-Type:application/json'); //La respuesta es en json
        
        $respuesta = [
            "mensaje" => "Actualización exitosa"
        ];

        echo json_encode($respuesta);

    }else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        //Contenido de proceso DELETE
        $idcallejeros = $_GET['idcallejeros'];

        header ('Content-Type:application/json'); //La respuesta es en json
        
        $respuesta = [
            "mensaje" => "Eliminado " . $idcallejeros
        ];

        echo json_encode($respuesta);

    }else{
        //Procesar error y responder
    }




?>