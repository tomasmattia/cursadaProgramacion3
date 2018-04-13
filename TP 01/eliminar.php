<?php
    require "fabrica.php";
    $legajo = $_GET["id"];
    $rutaArchivo="archivos/empleados.txt";
    $elArchivo=fopen($rutaArchivo,"r");
    
    while(!feof($elArchivo))
    {
        $empleadoString=trim(fgets($elArchivo));
        if($empleadoString)
        {
            $datoEmpleado=explode("-",$empleadoString);
            if($datoEmpleado[4]==$legajo)
            {
                $empleado = new Empleado($datoEmpleado[0],$datoEmpleado[1],$datoEmpleado[2],$datoEmpleado[3],$datoEmpleado[4],$datoEmpleado[5],$datoEmpleado[6]);                                         
                break;
            }
        }
    }
    fclose($elArchivo);
    if($empleado)
    {
        $fabrica=new Fabrica("La pequenia fabrica del PHP",7);
        $fabrica->TraerDeArchivo("empleados.txt");
        if($fabrica->EliminarEmpleado($empleado))
        {
            $fabrica->GuardarEnArchivo("empleados.txt");
            echo "Empleado eliminado";
        }
        else
        {
            echo "Error";
        }
    }
    else
    {
        echo "El empleado no se encontro";
    }
?>