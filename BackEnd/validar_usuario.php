<?php
require_once 'base_de_datos.php'; 

if( isset($_POST['usuario']) && isset($_POST['contrasena'])){
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    //Establecer conexion con BD
    $conexion = conectar();

    $query = $conexion->query("SELECT * FROM cuentas WHERE usuario = '$usuario' AND contrasena = '$contrasena'");
    
    if($query->rowCount() == 1){
        $datos = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['tipo_usuario'] = $datos['tipo_usuario'];
        $_SESSION['idcuentas']= $datos['idcuentas'];
        $idd = $_SESSION['idcuentas']; 
        if($datos['tipo_usuario'] == 1){
            //----------------------USUARIOS QUE SON NORMALES
            $query2 = $conexion->query("SELECT * from usuarios where idcuentas= '$idd'");    
            if($query2->rowCount() == 1){              
                $datos2 = $query2->fetch(PDO::FETCH_ASSOC);
                $_SESSION['idusuarios']= $datos2['idusuarios'];
                $_SESSION['nombre']= $datos2['nombre'];
                $_SESSION['apellidos']= $datos2['apellidos'];
                $_SESSION['telefono_usuario']= $datos2['telefono_usuario'];
                $_SESSION['direccion']= $datos2['direccion'];
                $_SESSION['codigo_postal']= $datos2['codigo_postal'];
                $_SESSION['email']= $datos2['email'];
                echo json_encode(array('error' => false, 'rol' => $_SESSION['tipo_usuario'], 'idcuentas' =>$_SESSION['idcuentas'], 'idusuarios' =>'1'));
            }else{
                echo json_encode(array('error' => false, 'rol' => $_SESSION['tipo_usuario'], 'idcuentas' =>$_SESSION['idcuentas'], 'idusuarios' =>'2'));
            }
        }else{    
            //----------------------USUARIOS QUE SON INSTITUCIONES
            $query3 = $conexion->query("SELECT idinstituciones from instituciones where idcuentas= '$idd'");    
            if($query3->rowCount() == 1){              
                $datos3 = $query3->fetch(PDO::FETCH_ASSOC);
                $_SESSION['idinstituciones']= $datos3['idinstituciones'];
                echo json_encode(array('error' => false, 'rol' => $_SESSION['tipo_usuario'], 'idcuentas' =>$_SESSION['idcuentas'], 'idinstituciones' =>'1'));
            }else{
                echo json_encode(array('error' => false, 'rol' => $_SESSION['tipo_usuario'], 'idcuentas' =>$_SESSION['idcuentas'], 'idinstituciones' =>'2'));
            }
        }
    }else{
        echo json_encode(array('error' => true));
    }     
}else{
    echo "Hubo un error";
}
?>