<?php 
require_once "base_de_datos.php";
session_start();

if( isset($_POST['usuario']) && isset($_POST['contrasena'])){
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    //Establecer conexion con BD
    $conexion = conectar();

    $query = $conexion->query("SELECT id, usuario, contrasena FROM cuentas WHERE usuario = '$usuario' AND contrasena = '$contrasena'");

    if($query->rowCount() == 1):
        $datos = $query->fetch(PDO::FETCH_ASSOC);
        echo json_encode(array('error' => false, 'rol' => $datos['id']));
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol']= $datos['id'];
    else:
        echo json_encode(array('error' => true));
    endif;  

}else{
    echo "Hubo un error";
}
?>