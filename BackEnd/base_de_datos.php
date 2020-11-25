<?php 

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','perritos');

function conectar() {
	try {
		// Ejecutamos las variables y aplicamos UTF8
		return new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	} catch (PDOException $e) {
		exit("Error: " . $e->getMessage());
	}
}

// WEB SERVICE CALLEJEROS

function consulta_callejero() {
	$connect = conectar();
	$sql = "SELECT idcallejeros, calle, colonia, ciudad, estado, rasgos_fisicos, condicion FROM callejeros WHERE estatus='callejero'" ; 
	$query = $connect -> prepare($sql); 
	$query -> execute(); 
	$results = $query -> fetchAll(PDO::FETCH_OBJ); 
	
	if (is_array($results)) {
		return $results;
	} else {
		return false;
	}
}

function alta_callejero($calle, $colonia, $ciudad, $estado, $rasgos_fisicos, $condicion) {
	$connect = conectar();
	$sql="
		insert into callejeros(
			calle,
			colonia,
			ciudad,
			estado,
			rasgos_fisicos,
            condicion,
            estatus
		) values (
			:calle,
			:colonia,
			:ciudad,
			:estado,
			:rasgos_fisicos,
            :condicion,
            'callejero'
		)";

	$sql = $connect->prepare($sql);

	$sql->bindParam(':calle', $calle);
	$sql->bindParam(':colonia', $colonia);
	$sql->bindParam(':ciudad', $ciudad);
	$sql->bindParam(':estado', $estado);
	$sql->bindParam(':rasgos_fisicos', $rasgos_fisicos);
    $sql->bindParam(':condicion', $condicion);

	$sql->execute();

	$id_insertado = $connect->lastInsertId();

	$connect = null;

	return ($id_insertado) ? true : false;
}

function alta_adopcion($idcallejeros, $idusuarios, $idinstituciones, $nombre_mascota, $ocupacion_adoptante, $ingresos_adoptante){
    $connect = conectar();
	$sql="        
        insert into adopciones(
			idcallejeros,
			idusuarios,
			idinstituciones,
			nombre_mascota,
			ocupacion_adoptante,
            ingresos_adoptante
		) values (
			:idcallejeros,
			:idusuarios,
			:idinstituciones,
			:nombre_mascota,
			:ocupacion_adoptante,
            :ingresos_adoptante
		)
        "; 

    $sql = $connect->prepare($sql);

    $sql->bindParam(':idcallejeros', $idcallejeros);
    $sql->bindParam(':idusuarios', $idusuarios);
    $sql->bindParam(':idinstituciones', $idinstituciones);
    $sql->bindParam(':nombre_mascota', $nombre_mascota);
    $sql->bindParam(':ocupacion_adoptante', $ocupacion_adoptante);
    $sql->bindParam(':ingresos_adoptante', $ingresos_adoptante);

    $sql->execute();

    $connect = null;           
}

function modificar_estatus($idcallejeros) {
	$connect = conectar();
	$sql="
        update callejeros set 
			estatus = 'adoptado'
        where idcallejeros = :idcallejeros;
        ";        

	$sql = $connect->prepare($sql);

    $sql->bindParam(':idcallejeros', $idcallejeros);

    $sql->execute();

	$connect = null;

	return ($sql->rowCount() > 0) ? true : false;
}

/*
function eliminar($folio) {
	$connect = conectar();
	$sql="delete from productos where folio = :folio";

	$sql = $connect->prepare($sql);
	$sql->bindParam(':folio', $folio);

	$sql->execute();

	$connect = null;

	return ($sql->rowCount() > 0) ? true : false;
}*/

//WEB SERVICE INSTITUCION


//WEB SERVICE USUARIOS

?>