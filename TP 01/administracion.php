<?php
    include_once("fabrica.php");
    $empleado=new Empleado($_POST['txtApellido'],$_POST['txtNombre'],$_POST['txtDni'],$_POST['cboSexo'],$_POST['txtLegajo'],$_POST['txtSueldo'],$_POST['rdoTurno']);
    $rutaArchivo="archivos/empleados.txt";
    $archivo=fopen($rutaArchivo,"a");
    
    if(fwrite($archivo,$empleado->ToString()."\r\n")>0)
    {
        ?> <a href='mostrar.php'>Mostrar</a> <?php
    }
    else
    {
        ?> <a href='index.html'>Inicio</a> <?php
    }
    fclose($archivo);
?>
    