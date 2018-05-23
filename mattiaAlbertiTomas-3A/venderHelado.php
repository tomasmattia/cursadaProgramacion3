<?php
    require_once "helado.php";
    $sabor=$_GET['sabor'];
    $cantidad=$_GET['cantidad'];

    $arrayHelado=Helado::RetornarArrayDeHelados();
    foreach($arrayHelado as $helado)
    {
        if($helado->$sabor==$sabor)
        {
            echo $helado->PrecioMasIva() * $cantidad;
        }
        else
        {
            echo "No se encuentra el sabor ingresado";
        }
    }

?>