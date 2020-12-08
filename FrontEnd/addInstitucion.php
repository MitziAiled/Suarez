<?php
    session_start();
?>
<html>
    <head>
        <title>Puppy Rescue: Registro de Mascota</title>
        <link href="assets/css/add_institucion.css" rel="stylesheet" type="text/css">
        <LINK href="assets/css/menu.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">
			function confirmLogout() {
				if(confirm('¿Deseas cerrar sesion?')) {
					return true;
				}
				else {
					return false;
				}
			}

        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="/Suarez/BackEnd/eventosi.js"></script>
    </head>
    <body>
        <div id="rectangle1">
            <form action="bienvenidaInstitucion.html" method="POST">
                <label>INSTITUCI&Oacute;N:</label>
                <br><br>
                <label>Nombre:</label>
                <input type="text" name="nombre_inst" id="nombre_inst" value=""/>
                <br>
                <label>Direcci&oacute;n:</label>
                <input type="text" name="direccion" id="direccion" value=""/>
                <br>
                <label>Tel&eacute;fono:</label>
                <input type="text" name="telefono" id="telefono" value=""/>
                <br>
                <label>C&oacute;digo Postal:</label>
                <input type="text" name="codigo_postal" id="codigo_postal" value=""/>
        </div>
        <div id="rectangle2">
                <label>REPRESENTANTE:</label>
                <br><br>
                <label>Nombre Completo:</label>
                <input type="text" name="nombre_representante" id="nombre_representante" value=""/>
                <br>
                <label>Cargo:</label>
                <input type="text" name="cargo_representante" id="cargo_representante" value=""/>
                <br>
                <label>Tipo de Instituci&oacute;n:</label>
                <input type="text" name="tipo_institucion" id="tipo_institucion" value=""/>
                <br>
                <label>Ident. Tributaria:</label>
                <input type="text" name="identificacion_tributaria" id="identificacion_tributaria" value=""/>
                <input type="hidden" class="cpUs" name="idcuentas" id="idcuentas" autocomplete="off" value="<?php echo $_SESSION['idcuentas']?>" readonly/>
        </div>
                <input id="enviar_formulario" type="submit" value="Siguiente"/>
            </form>
            <button id="volver">
                <a href="login.html">Volver</a> <!--Verificar si esto es correcto ya que antes era "../"-->
            </button>
    </body>
</html>