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
            foreach($arrayViejo as $hel)
            {
                if($hel->$sabor!=$sabor)
                {
                    $archivoDeHelados=fopen($ruta,"w");
                    $auxEscritura = "";
                    $auxEscritura=$auxEscritura.$sabor."-".$precio."-".$hel->GetPathFoto()."\r\n";
                    fclose($archivoDeHelados);
                }
                else
                {
                    copy("./heladosArchivo/heladosImagen/".$hel->GetPathFoto().".jpg", "./heladosArchivo/heladosImagen/heladosBorrados/".$hel->$sabor.".borrado.".$sabor.date("H").date("i").date("s").".jpg");
                }
            }
            
            
        }
    }
    

?>