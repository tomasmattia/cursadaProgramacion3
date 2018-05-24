<?php
    require_once "cliente.php";

    try
    {
        $usuario='root';
        $clave='';
        $objetoPDO = new PDO('mysql:host=localhost;dbname=parcial;charset=utf8', $usuario, $clave);
        $sql=$objetoPDO->prepare('INSERT INTO `clientes`(`nombre`, `correo`, `clave`) VALUES (:nombre, :correo, :clave)');
        
        $sql->execute(array(
            'nombre' => $_GET['nombre'],
            'correo' => $_GET['correo'],
            'clave' => $_GET['clave']
        ));
        var_dump($sql);
    }
    catch(PDOException $e) 
    {
        echo "Error!\n" . $e->getMessage();
    }
?>