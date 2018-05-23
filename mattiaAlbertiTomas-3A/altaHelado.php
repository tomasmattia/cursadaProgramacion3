<?php
    require_once "./helado.php";
    $sabor=$_POST['sabor'];
    $precio=$_POST['precio'];
    $foto=$_POST['foto'];
    $ruta="./heladosArchivo/helados.txt";
    $rutaFoto="./heladosArchivo/heladosImagen/".$sabor.date("H").date("i").date("s")."jpg";
    $archivoDeHelados=fopen($ruta,"w");
    $auxEscritura = "";
    $auxEscritura=$auxEscritura.$sabor."-".$precio."-".$sabor.date("H").date("i").date("s")."\r\n";
    if(!(fwrite($archivoDeHelados, $auxEscritura)))
    {
        fclose($archivoDeHelados);            
        echo "Error en la carga";
    }
    move_uploaded_file($_FILES['foto']['tmp_name'],$rutaFoto);
    fclose($archivoDeHelados);        
    echo "Carga Exitosa";
?>