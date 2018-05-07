<?php
    require_once "cliente.php";

    $nombre=$_GET['nombre'];
    $correo=$_GET['correo'];
    $clave=$_GET['clave'];

    $cliente = new Cliente($nombre,$correo,$clave);

    Cliente::GuardarEnArchivo($cliente);
?>