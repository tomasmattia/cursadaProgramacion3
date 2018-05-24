<?php
    require_once "helado.php";

    $sabor=$_GET['sabor'];
    $cantidad=$_GET['cantidad'];

    try
    {
        $bandera=0;
        $usuario='root';
        $clave='';
        $objetoPDO = new PDO('mysql:host=localhost;dbname=parcial;charset=utf8', $usuario, $clave);
        $sql=$objetoPDO->prepare('SELECT `precio` FROM `helados` WHERE `sabor` = :sabor');
        $sql->bindValue(':sabor', $sabor);
        $sql->execute();
        while($result = $sql->fetchObject())
        {
            echo($result->precio)*1.21;
            $bandera=1;
        }

        if($bandera==0)
        {
            echo "No se encontro el sabor";
        }
    }
    catch(PDOException $e) 
    {
        echo "Error!\n" . $e->getMessage();
    }

?>