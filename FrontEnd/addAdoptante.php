<?php
    session_start();
?>
<html>
    <head>
        <title>Puppy Rescue: Registro de Mascota</title>
        <link href="assets/css/registro_adoptante.css" rel="stylesheet" type="text/css">
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
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="/Suarez/BackEnd/e_addadoptante.js"></script>

    </head>
    <body>
        <div id="menu">
			<ul class="nav">
                <li><a href="">CALLEJEROS</a>
                    <ul>
						<li><form action="consultarCallejero.html"><button>Consultar</button></form></li>
						<li><form action="adoptarCallejero.html"><button>Adoptar</button></form></li>
					</ul>
                </li>
				<li><a href="">INSTITUCI&Oacute;N</a>
                    <ul>
                        <li><form action="consultarInstitucion.html"><button>Consultar</button></form></li>
					</ul>
                </li>
                <li><a href="">USUARIO</a>
                    <ul>
                        <li>
                            <form action="perfil.php"><button>Perfil</button></form>
                        </li>
                        <li>
                            <form action="../BackEnd/logout.php" method="POST">
						        <button type="submit" value="Log out" onclick="return confirmLogout()">Cerrar Sesion</button>
					        </form>
                        </li>
                    </ul>
                </li>
			</ul>
		</div>
        <div id="rectangle">
            <form action="#" method="POST">
                <table>
                    <tr>
                        <td>
                            <label>ID Instituci&oacute;n:</label>
                            <input type="text" name="idinstituciones" id="idinstituciones" value=""/>         
                            <label>ID Usuario:</label>
                            <input type="text" name="idusuarios" id="idusuarios" value="<?php echo $_SESSION['idusuarios']?>" readonly/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Ocupaci&oacute;n:</label>
                            <input type="text" name="ocupacion_adoptante" id="ocupacion_adoptante" value=""/>
                            <label>Ingresos:</label>
                            <input type="text" name="ingresos_adoptante" id="ingresos_adoptante" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>ID del canino:</label>
                            <input type="text" name="idcallejeros" id="idcallejeros" value="asa" readonly/>
                            <label>Nombre de la Mascota:</label>
                            <input type="text" name="nombre_mascota" id="nombre_mascota" value=""/>
                        </td>
                    </tr>
                </table>
                <input id="btn_registrar_adopcion" type="submit" value="Enviar Datos"/>
                <input id="btn_modificar_estatus" type="submit" value="Modificar Estatus"/>
            </form>
            
        </div>
    </body>
</html>