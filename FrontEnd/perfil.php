<?php
    session_start();
?>
<html>
    <head>
        <title>Puppy Rescue: Perfil</title>
        <link href="assets/css/perfil.css" rel="stylesheet" type="text/css">
        <LINK href="assets/css/menu.css" rel="stylesheet" type="text/css"/>
    </head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/Suarez/BackEnd/eventos_usuario.js"></script>

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
                            <input type="hidden" class="nomUs" name="idusuarios" id="idusuarios" value="<?php echo $_SESSION['idusuarios']?>" readonly/>
                            <label>Nombre(s):</label>
                            <input type="text" class="nomUs" name="nombre" id="nombre" value="<?php echo $_SESSION['nombre']?>" readonly/>
                            <label>Apellido(s):</label>
                            <input type="text" class="apellUs" name="apellidos" id="apellidos" value="<?php echo $_SESSION['apellidos']?>" readonly/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tel&eacute;fono:</label>
                            <input type="text" class="telUs" name="telefono_usuario" id="telefono_usuario" value="<?php echo $_SESSION['telefono_usuario']?>" autocomplete="off" required/>
                            <label>Direcci&oacute;n:</label>
                            <input type="text" class="dirUs" name="direccion" id="direccion" value="<?php echo $_SESSION['direccion']?>" autocomplete="off" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>C.P:</label>
                            <input type="text" class="cpUs" name="codigo_postal" id="codigo_postal" value="<?php echo $_SESSION['codigo_postal']?>" autocomplete="off" required/>
                            <label>Correo Electr&oacute;nico:</label>
                            <input type="text" class="emailUs" name="email" id="email" value="<?php echo $_SESSION['email']?>" autocomplete="off" required/>
                       </td> 
                    </tr>
                </table>
                <input type="submit" id="btn_editar" value="Actualizar" />
            </form>
        </div>
    </body>
</html>