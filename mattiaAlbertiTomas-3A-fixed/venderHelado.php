<?php
    require_once "helado.php";

    $sabor=$_GET['sabor'];
    $cantidad=$_GET['cantidad'];

    $arrayHelado=Helado::RetornarArrayDeHelados();
    $bandera=0;
    foreach($arrayHelado as $helado)
    {
        if($helado->GetSabor()==$sabor)
        {
            echo $helado->PrecioMasIva() * $cantidad;
            $bandera=1;
        }
    }
    if($bandera!=1)
    {
        echo "No se encuentra el sabor ingresado";
    }

?>