<?php
    try 
    {
        //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
        $usuario='root';
        $clave='';

        $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $clave);
        $sql=$objetoPDO->query('SELECT * from cds');
        $result=$sql->fetchAll();
        foreach($result as $resultado)
        {
            echo var_dump($resultado);
        }
        
    } 
    catch (PDOException $e) 
    {
        echo "Error!!!\n" . $e->getMessage();
    }
    
?>  