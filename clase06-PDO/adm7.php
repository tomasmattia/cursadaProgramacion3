<?php
    include_once "cd.php";

    try 
    {
        //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
        $usuario='root';
        $clave='';
        $id = 5;
        $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $clave);
        $sql=$objetoPDO->prepare('SELECT titel AS titulo, interpret AS interprete, jahr AS anio, id from cds WHERE id = ?');
        $sql->bindValue(1,$id,PDO::PARAM_INT);
        $sql->bindColumn(4,$colId,PDO::PARAM_INT,8);
        $sql->bindColumn(1,$colTitle,PDO::PARAM_STR,256);
        $sql->bindColumn(2,$colIntr,PDO::PARAM_STR,256);
        $sql->bindColumn(3,$colYear,PDO::PARAM_INT,8);
        $sql->execute();
        while($obj=$sql->fetch(PDO::FETCH_BOUND))
        {
           echo "$colId - $colIntr - $colTitle - $colYear";
        }
    } 
    catch (PDOException $e) 
    {
        echo "Error!!!\n" . $e->getMessage();
    }
    
?>  