<?php
    require_once "helado.php";

    $sabor=$_POST['sabor'];
    $precio=$_POST['precio'];
    $foto=$_POST['foto'];
    
    if(isset($_POST['sabor']))
    {
        $ruta="./heladosArchivo/helados.txt";
        $archivoHelados = fopen($ruta,"r");
        $cadenaBuscada = $sabor;
        $stringHelados = fread($archivoHelados,filesize($ruta));
        fclose($archivoHelados);
        if (strpos($stringHelados, $cadenaBuscada) !== false)
        {
            $arrayNuevo=array();
            $arrayViejo=Helado::TraerDeArchivo();
            $ruta="./heladosArchivo/helados.txt";
            foreach($arrayViejo as $hel)
            {
                $archivoDeHelados=fopen($ruta,"w");
                if($hel->$sabor!=$sabor)
                {
                    array_push($arrayNuevo,$hel);
                    $auxEscritura = "";
                    $auxEscritura=$auxEscritura.$hel->GetPathFoto()."\r\n";
                }
                else
                {
                    $rutaFoto="./heladosArchivo/heladosImagen/".$sabor.date("H").date("i").date("s")."jpg";
                    $auxEscritura = "";
                    unlink("./heladosArchivo/heladosImagen/".$hel->GetPathFoto().".jpg");
                    $auxEscritura=$auxEscritura.$sabor."-".$precio."-".$sabor.date("H").date("i").date("s")."\r\n";
                    move_uploaded_file($_FILES['foto']['tmp_name'],$rutaFoto);
                }
            }
            fclose($archivoDeHelados);
        }
        else
        {
            echo "El sabor no existe";
        }
    }

?>