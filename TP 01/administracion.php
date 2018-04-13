<?php
    include_once("fabrica.php");
    $empleado=new Empleado($_POST['txtApellido'],$_POST['txtNombre'],$_POST['txtDni'],$_POST['cboSexo'],$_POST['txtLegajo'],$_POST['txtSueldo'],$_POST['rdoTurno']);
    $fabrica=new Fabrica("La pequenia fabrica del PHP",7);

    $fabrica->TraerDeArchivo("empleados.txt");

    if($fabrica->AgregarEmpleado($empleado)){
        if($fabrica->GuardarEnArchivo("empleados.txt"))
        {
            ?><a href=mostrar.php>Empleado cargado - Mostrar</a><?php          
        }
        else{
            ?><a href=index.php>Error al escribir archivo - Index</a><?php
        }
    }
    else{
            ?><a href=index.php>Error al agregar empleado fábrica llena - Index</a><?php      
    }
/*     $rutaArchivo="archivos/empleados.txt";
    $archivo=fopen($rutaArchivo,"a");
    
    
    if(fwrite($archivo,$empleado->ToString()."\r\n")>0)
    {
        ?> <a href='mostrar.php'>Mostrar</a> <?php
    }
    else
    {
        ?> <a href='index.html'>Inicio</a> <?php
    }
    fclose($archivo); */
?>
    