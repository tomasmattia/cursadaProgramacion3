<?php
    include_once("fabrica.php");
    $rutaArchivo="archivos/empleados.txt";
    $archivo=fopen($rutaArchivo,"r");
    $listaEmpleados=array();
    while(!feof($archivo))
    {
        $empClean=explode("-",fgets($archivo));
        if(trim($empClean[0])!="")
        {
            $nEmp= new Empleado($empClean[0],$empClean[1],$empClean[2],$empClean[3],$empClean[4],$empClean[5],$empClean[6]);
            foreach($empClean as $param)
            {
                echo $param."-";
            }
            array_push($listaEmpleados,$nEmp);    
        }
    }
    fclose($archivo);
    foreach($listaEmpleados as $empleadito)
    {
        echo "<br>".$empleadito->ToString();
    }
    ?> <a href='index.html'>Inicio</a>