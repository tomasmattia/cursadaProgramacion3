<?php
    session_start();
    include_once('./backend/validarSesion.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <title>HTML 5 – Formulario Alta Empleado </title>
    <script src="javascript/funciones.js"></script>
</head>
<body>
    <h2 align="center">Alta Empleados</h2>
    <form enctype="multipart/from-data" method="post" action="backend/administracion.php" onsubmit="return AdministrarValidaciones()" >
        <table align="center">      
            <tr><td><h4>  Datos Personales</h4></td></tr>
            <tr><td colspan="2"><hr></td></tr>
        
            <tr>
                <td>DNI</td>
                <td>
                    <input type="number" name="txtDni" id="txtDni" min="1000000" max="55000000">
                    <span style="display:none">*</span>
                </td>
                
            </tr>
            <tr>
                <td>Apellido</td>
                <td>
                    <input type="text" name="txtApellido" id="txtApellido">
                    <span style="display:none">*</span>
                </td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td>
                    <input type="text" name="txtNombre" id="txtNombre">
                    <span style="display:none">*</span>
                </td>
            </tr>
            <tr>
                <td>Sexo</td>
                <td>
                    <select name="cboSexo" id="cboSexo">
                    <option value="default">Seleccione(---)</option>
                    <option value="masculino">Masculino(M)</option>
                    <option value="femenino">Femenino(F)</option>
                    </select>
                    <span style="display:none">*</span>
                </td>
            </tr>
            <tr><td><h4><br>Datos Laborales</h4></td></tr>
            <tr><td colspan="2"><hr></td></tr>
            <tr>
                <td>Legajo</td>
                <td>
                    <input type="number" name="txtLegajo" id="txtLegajo" min="100" max="550">
                    <span style="display:none">*</span>
                </td>
            </tr>
            <tr>
                <td>Sueldo</td>
                <td>
                    <input type="number" name="txtSueldo" id="txtSueldo" min="8000" step="500">
                    <span style="display:none">*</span>
                </td>
            </tr>
            <tr>
                <td>Turno</td>
            </tr>
            <tr>
                <td><input type="radio" name="rdoTurno" id="tManana" value="tManana">Mañana</td>
            </tr>
            <tr>
                <td><input type="radio" name="rdoTurno" id="tTarde" value="tTarde">Tarde</td>
            </tr>
            <tr>
                <td><input type="radio" name="rdoTurno" id="tNoche" value="tNoche">Noche</td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>
                    <input type="file" name="fotito" id="fotito">
                    <span style="display:none">*</span>
                </td>
            </tr>
            <tr>
                <td><input type="reset" name="btnLimpiar" value="Limpiar"></td>
                <td><input type="submit" name="btnEnviar" value="Enviar"></td>
            </tr>
            
        </table>
    </form>
    <a href="./backend/cerrarSesion.php">Desloguearse</a>
</body>
</html>