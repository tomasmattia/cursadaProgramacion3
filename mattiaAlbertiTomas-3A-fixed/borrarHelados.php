<?php
    require_once "helado.php";
    if(isset($_GET['sabor']))
    {
        $sabor=$_GET['sabor'];
        $ruta="./heladosArchivo/helados.txt";
        $archivoHelados = fopen($ruta,"r");
        $cadenaBuscada = $sabor;
        $stringHelados = fread($archivoHelados,filesize($ruta));
        fclose($archivoHelados);
        if (strpos($stringHelados, $cadenaBuscada) !== false)
        {
            echo "El sabor existe";
        }
        else
        {
            echo "El sabor no existe";
        }
    }
    else if(isset($_POST['sabor']))
    {
        $sabor=$_POST['sabor'];
        if($_POST['queDeboHacer']=="borrar")
        {
            $arrayViejo=Helado::TraerDeArchivo();
            $ruta="./heladosArchivo/helados.txt";
            $archivoDeHelados=fopen($ruta,"w");
            foreach($arrayViejo as $hel)
            {
                if($hel->GetSabor()!=$sabor)
                {
                    $auxEscritura = "";
                    $auxEscritura=$auxEscritura.$sabor."-".$precio."-".$hel->GetPathFoto()."\r\n";
                }
                else
                {
                    rename("./heladosArchivo/heladosImagen/".$hel->GetPathFoto().".jpg", "./heladosArchivo/heladosImagen/heladosBorrados/".$hel->GetSabor().".borrado.".$sabor.date("H").date("i").date("s").".jpg");
                }
            }
            fclose($archivoDeHelados); 
        }
    }
    

?>