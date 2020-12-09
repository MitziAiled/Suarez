<?php
    session_start();
?>
<html>
    <head>
        <title>Puppy Rescue: Registro de Usuario</title>
        <link href="assets/css/registro_usuario.css" rel="stylesheet" type="text/css">
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/Suarez/BackEnd/eventos_usuario.js"></script>
    <body>
        <div id="rectangle">
            <form action="bienvenida.html" method="POST">
                <table>
                    <tr>
                        <td>
                            <label>Nombre(s):</label>
                            <input type="text" class="nomUs" name="nombre" id="nombre" autocomplete="off" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Apellido(s):</label>
                            <input type="text" class="apellUs" name="apellidos" id="apellidos" autocomplete="off" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tel&eacute;fono:</label>
                            <input type="text" class="telUs" name="telefono_usuario" id="telefono_usuario" autocomplete="off" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Direcci&oacute;n:</label>
                            <input type="text" class="dirUs" name="direccion" id="direccion" autocomplete="off" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>C.P:</label>
                            <input type="text" class="cpUs" name="codigo_postal" id="codigo_postal" autocomplete="off" required/>
                            <label>Correo Electr&oacute;nico:</label>
                            <input type="text" class="emailUs" name="email" id="email" autocomplete="off" required/>
                       </td> 
                    </tr>
                    <tr>
                        <td>
                            <label>G&eacute;nero:</label>
                            <select class="Us" name="genero" id="genero" required>
                                <option>Femenino</option>
                                <option>Masculino</option>
                            </select>
                            <input type="hidden" class="cpUs" name="idcuentas" id="idcuentas" autocomplete="off" value="<?php echo $_SESSION['idcuentas']?>" readonly/>
                        </td>
                    </tr>
                </table>
                <input type="submit" id="enviar_formulario" value="Guardar" />
            </form>
        </div>
    </body>
</html>