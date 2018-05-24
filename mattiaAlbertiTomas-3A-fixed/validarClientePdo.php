<?php
    require_once "cliente.php";
    $correo=$_POST['correo'];
    $claveCliente=$_POST['clave'];
    try
    {
        $bandera=0;
        $usuario='root';
        $clave='';
        $objetoPDO = new PDO('mysql:host=localhost;dbname=parcial;charset=utf8', $usuario, $clave);
        $sql=$objetoPDO->prepare('SELECT `nombre`,`correo`,`clave` FROM `clientes` WHERE `correo` = :correo AND `clave` = :clave');
        $sql->bindValue(':correo', $correo);
        $sql->bindValue(':clave', $claveCliente);
        $sql->execute();
        $result = $sql->rowCount();
        if($result)
        {
            echo "Cliente Logeado";
            $bandera=1;
        }

        if($bandera==0)
        {
            echo "Cliente Inexistente";
        }
    }
    catch(PDOException $e) 
    {
        echo "Error!\n" . $e->getMessage();
    }
?>