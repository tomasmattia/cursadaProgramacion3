<?php
    try {

        //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
        $usuario='root';
        $clave='';

        $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $clave);
        echo "conexion establecida";
        
    } catch (PDOException $e) {

        echo "Error!!!\n" . $e->getMessage();
    }
    
?>  