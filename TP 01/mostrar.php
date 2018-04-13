<?php
    include_once("fabrica.php");
    $rutaArchivo="archivos/empleados.txt";
    $elArchivo=fopen($rutaArchivo,"r");
    while(!feof($elArchivo)){
        $empleadoString=trim(fgets($elArchivo));
        if($empleadoString){
            $datoEmpleado=explode("-",$empleadoString);
            echo $empleadoString." - <a href='eliminar.php?id=".$datoEmpleado[4]."'>Eliminar</a><br>";
        }
    }
    fclose($elArchivo);

?> <a href='index.html'>Inicio</a>