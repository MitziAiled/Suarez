<?php
    session_start();
?>
<html>
    <head>
        <title>Puppy Rescue: Consulta de Mascotas</title>
        <link href="assets/css/modificar_institucion.css" rel="stylesheet" type="text/css">
        <LINK href="assets/css/menu.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">
			function confirmLogout() {
				if(confirm('Deseas cerrar sesion?')) {
					return true;
				}
				else {
					return false;
				}
			}

		</script>
    </head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/Suarez/BackEnd/eventosi.js"></script>

    <body>
    <div id="menu">
			<ul class="nav">
                <li>
                    <a href="">ADOPCIONES</a>
                    <ul>
						<li><form action="consultarAdopcion.html"><button>Consultar</button></form></li>
					</ul>
                </li>
                <li><a href="">CALLEJEROS</a>
                    <ul>
						<li><form action="addCallejero.html"><button>Registrar</button></form></li>
						<li><form action="consultarCallejeroInstitucion.html"> <button>Consultar</button></form></li>
					</ul>
                </li>
				<li><a href="">INSTITUCI&Oacute;N</a>
                    <ul>
						<li><form action="datosInstitucion.php"><button>Mis Datos</button></form></li>
					</ul>
                </li>
                <li>
                    <form action="../BackEnd/logout.php" method="POST">
                        <button type="submit" value="Log out" onclick="return confirmLogout()">Cerrar Sesion</button>
                    </form>
                </li>
			</ul>
		</div>
        <div id="rectangle1">
            <form action="#" method="POST">
                <label>INSTITUCI&Oacute;N:</label> 
                <br><br>
                <input type="hidden" name="idinstituciones" id="idinstituciones" value="<?php echo $_SESSION['idinstituciones']?>">
                <label>Nombre:</label>
                <input type="text" name="nombre_inst" id="nombre_inst" value="<?php echo $_SESSION['nombre_inst']?>" readonly/>
                <br>
                <label>Direcci&oacute;n:</label>
                <input type="text" name="direccion" id="direccion" value="<?php echo $_SESSION['direccion']?>" autocomplete="off" required/>
                <br>
                <label>Tel&eacute;fono:</label>
                <input type="text" name="telefono" id="telefono" value="<?php echo $_SESSION['telefono']?>" autocomplete="off" required/>
                <br>
                <label>C&oacute;digo Postal:</label>
                <input type="text" name="codigo_postal" id="codigo_postal" value="<?php echo $_SESSION['codigo_postal']?>" autocomplete="off" required/>
        <div id="rectangle2">
                <label>REPRESENTANTE:</label>
                <br><br>
                <label>Nombre Completo:</label>
                <input type="text" name="nombre_representante" id="nombre_representante" value="<?php echo $_SESSION['nombre_representante']?>" autocomplete="off" required/>
                <br>
                <label>Cargo:</label>
                <input type="text" name="cargo_representante" id="cargo_representante" value="<?php echo $_SESSION['cargo_representante']?>" autocomplete="off" required/>
                <br>
                <label>Tipo de Instituci&oacute;n:</label>
                <input type="text" name="tipo_institucion" id="tipo_institucion" value="<?php echo $_SESSION['tipo_institucion']?>" readonly/>
                <br>
                <label>Ident. Tributaria:</label>
                <input type="text" name="identificacion_tributaria" id="identificacion_tributaria" value="<?php echo $_SESSION['identificacion_tributaria']?>" readonly/>
        </div>
            <input id="btn_editar" type="submit" value="Modificar Datos"/>
            </form>
    </body>
</html>