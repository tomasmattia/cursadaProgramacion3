<?php
    include_once "cd.php";

    try 
    {
        //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
        $usuario='root';
        $clave='';
        $id = 5;
        $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $clave);
        $sql=$objetoPDO->prepare('SELECT titel AS titulo, interpret AS interprete, jahr AS anio from cds WHERE id = ?');
        $sql->bindParam(1,$id,PDO::PARAM_INT);
        $sql->execute();
        while($obj=$sql->fetchObject("cd"))
        {
           // echo $obj->ToString();
           echo json_encode($obj);
        }
    } 
    catch (PDOException $e) 
    {
        echo "Error!!!\n" . $e->getMessage();
    }
    
?>  