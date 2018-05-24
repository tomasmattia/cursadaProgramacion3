<?php
    require_once "cliente.php";
    
    $cliente = new Cliente($_GET['nombre'],$_GET['correo'],$_GET['clave']);

    Cliente::GuardarEnArchivo($cliente);
?>