<?php
require_once 'base_de_datos.php'; 

if( isset($_POST['usuario']) && isset($_POST['contrasena'])){
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    //Establecer conexion con BD
    $conexion = conectar();

    $query = $conexion->query("SELECT * FROM cuentas WHERE usuario = '$usuario' AND contrasena = '$contrasena'");
    
    //echo json_encode(array('idusuarios' =>$_SESSION['idusuarios']));


    /*while( $row = mysql_fetch_assoc($resultado)) {
        $row2 = mysql_fetch_assoc($resultado2);
 }*/
    if($query->rowCount() == 1){
        $datos = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['tipo_usuario'] = $datos['tipo_usuario'];
        $_SESSION['idcuentas']= $datos['idcuentas'];
        $idd = $_SESSION['idcuentas']; 
        $query2 = $conexion->query("SELECT idusuarios from usuarios where idcuentas= '$idd'");    
        if($query2->rowCount() == 1){              
            $datos2 = $query2->fetch(PDO::FETCH_ASSOC);
            $_SESSION['idusuarios']= $datos2['idusuarios'];
            echo json_encode(array('error' => false, 'rol' => $_SESSION['tipo_usuario'], 'idcuentas' =>$_SESSION['idcuentas'], 'idusuarios' =>'1'));
        }else{
            echo json_encode(array('idusuarios' =>'2'));
        }
    }else{
        echo json_encode(array('error' => true));
    }
    
    
        
}else{
    echo "Hubo un error";
}
?>