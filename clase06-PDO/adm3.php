<?php
    include_once "cd.php";

    try 
    {
        //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
        $usuario='root';
        $clave='';

        $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $clave);
        $sql=$objetoPDO->query('SELECT titel AS titulo, interpret AS interprete, jahr AS anio from cds');
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