<?php
    session_start();
    include_once('./validarSesion.php');
    include_once('./fabrica.php');
    if(isset($_POST['hidModificar']))
    {
        $dni = $_POST['hidModificar'];
        $fabrica= new fabrica("La pequenia fabrica del PHP",7);
        $fabrica->TraerDeArchivo();
        $arrayEmpleados = $fabrica->GetEmpleados();
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <title>HTML 5 – Formulario Alta Empleado </title>
    <script src="../javascript/funciones.js"></script>
</head>
<body>
    <h2 align="center" id="tituloForm">Alta Empleados</h2>
    <form enctype="multipart/form-data" method="post" action="administracion.php" onsubmit="return AdministrarValidaciones()" >
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
                <td><input type="radio" name="rdoTurno" id="tManana" value="tManana"><label for="tManana">Mañana</label></td>
            </tr>
            <tr>
                <td><input type="radio" name="rdoTurno" id="tTarde" value="tTarde"><label for="tTarde">Tarde</label></td>
            </tr>
            <tr>
                <td><input type="radio" name="rdoTurno" id="tNoche" value="tNoche"><label for="tNoche">Noche</label></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>
                    <input type="file" name="imagen" id="imagen">
                    <span style="display:none">*</span>
                </td>
            </tr>
            <tr>
                <td><input type="reset" name="btnLimpiar" value="Limpiar"></td>
                <td><input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar"></td>
                <input type="hidden" id="hdnModificar" name="hdnModificar" value="1">
            </tr>
            
        </table>
    </form>
    <?php
        if(isset($_POST['hidModificar']))
        {
            foreach ($arrayEmpleados as $empleado) 
            {
                if ($empleado->GetDni() == $dni) 
                {
                    $apellido = $empleado->GetApellido();
                    $nombre = $empleado->GetNombre();
                    $sexo = $empleado->GetSexo();
                    $legajo = $empleado->GetLegajo();
                    $sueldo = $empleado->GetSueldo();
                    $turno = $empleado->GetTurno();
                    $pathFoto = $empleado->GetPathFoto();
                    var_dump($empleado);
                }
            }
            echo '<script type="text/javascript">',
            'ModificarEmpleado('.$dni.',"'.$apellido.'","'.$nombre.'","'.$sexo.'",'.$legajo.','.$sueldo.',"'.$turno.'","'.$pathFoto.'.jpg");',
            '</script>';
            echo '';
        }
    ?>
    <a href="./cerrarSesion.php">Desloguearse</a>
</body>
</html>