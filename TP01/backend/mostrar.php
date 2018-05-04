<?php
    session_start();
    require_once "./fabrica.php";
    require_once "./validarSesion.php";
    $fabrica= new fabrica("La pequenia fabrica del PHP",7);
    $fabrica->TraerDeArchivo();
    $empleados = $fabrica->GetEmpleados();
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
            <tr><td colspan="4"><hr></td></tr>           
            <?php
                foreach($empleados as $emp)
                {
                    echo "<tr><td>".$emp->ToString()."</td>"."<td><img src='".$emp->GetPathFoto().".jpg' alt='".$emp->GetApellido()."' style='width:90px;height:90px;'></td><td> - <a href='eliminar.php?id=".$emp->GetLegajo()."'>Eliminar</a></td><td> - <a href='eliminar.php?id=".$emp->GetLegajo()."'>Modificar</a></td></tr>"; 
                }
            ?> 
            <tr><td colspan="4"><hr></td></tr>
            <tr><td><a href='../index.php'>Inicio</a></td></tr>
        </table>
    <a href="./cerrarSesion.php">Desloguearse</a>
</body>
</html>
