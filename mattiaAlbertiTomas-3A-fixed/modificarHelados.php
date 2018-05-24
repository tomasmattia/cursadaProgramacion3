<?php
    require_once "helado.php";

    $sabor=$_POST['sabor'];
    $precio=$_POST['precio'];
    $foto=$_FILES['foto'];
    
    if(isset($_POST['sabor']))
    {
        $ruta="./heladosArchivo/helados.txt";
        $archivoHelados = fopen($ruta,"r");
        $cadenaBuscada = $sabor;
        $stringHelados = fread($archivoHelados,filesize($ruta));
        fclose($archivoHelados);
        if (strpos($stringHelados, $cadenaBuscada) !== false)
        {
            $arrayHelados=Helado::TraerDeArchivo();
            $archivoDeHelados=fopen($ruta,"w");
            $auxEscritura="";
            foreach($arrayHelados as $hel)
            {
                if($hel->GetSabor()!=$sabor)
                {
                    $auxEscritura=$auxEscritura.$hel->GetSabor()."-".$hel->GetPrecio()."-".$hel->GetPathFoto()."\r\n";
                }
                else
                {
                    $rutaFoto="./heladosArchivo/heladosImagen/".$sabor.date("H").date("i").date("s").".jpg";
                    unlink("./heladosArchivo/heladosImagen/".$hel->GetPathFoto().".jpg");
                    $auxEscritura=$auxEscritura.$sabor."-".$precio."-".$sabor.date("H").date("i").date("s")."\r\n";
                    move_uploaded_file($_FILES['foto']['tmp_name'],$rutaFoto);
                }
            }
            if(!(fwrite($archivoDeHelados, $auxEscritura)))
            {
                fclose($archivoDeHelados);            
                echo "Error en la carga";
            }
            fclose($archivoDeHelados);
        }
        else
        {
            echo "El sabor no existe";
        }
    }
?>