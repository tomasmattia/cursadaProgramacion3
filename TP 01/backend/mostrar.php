<?php
    session_start();
    require_once "./fabrica.php";
    require_once "./validarSesion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 – Listado de Empleados</title>
</head>
<body>
    <?php
        $rutaArchivo="../archivos/empleados.txt";
        $elArchivo=fopen($rutaArchivo,"r");
        ?>
        <h2 align="center">Listado de Empleados</h2>
        <table align="center">
            <thead><h2 align="center">Info</h2></thead>
            <tr><td colspan="2"><hr></td></tr>           
            <?php
                while(!feof($elArchivo))
                {
                    $empleadoString=trim(fgets($elArchivo));
                    if($empleadoString)
                    {
                        $datoEmpleado=explode("-",$empleadoString);
                        echo "<tr><td>".$empleadoString."</td><td> - <a href='eliminar.php?id=".$datoEmpleado[4]."'>Eliminar</a></td></tr>";
                    }
                }
                fclose($elArchivo);
            ?> 
            <tr><td colspan="2"><hr></td></tr>
            <tr><td><a href='../index.html'>Inicio</a></td></tr>
        </table>
    <a href="./backend/cerrarSesion.php">Desloguearse</a>
</body>
</html>
