<?php
    $correo=$_POST['correo'];
    $clave=$_POST['clave'];
    $ruta="./clientes/clientesActuales.txt";
    $archivoClientes = fopen($ruta,"r");
    $cadenaBuscada = "$correo-$clave";
    $stringClientes = fread($archivoClientes,filesize($ruta));
    fclose($archivoClientes);
    if (strpos($stringClientes, $cadenaBuscada) !== false)
    {
        echo "Cliente Logeado";
    }
    else
    {
        echo "Cliente Inexistente";
    }
?>