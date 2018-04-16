<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <?php
            $archivoImg=fopen("./archivos/imgList.txt","r");
            while(!feof($archivoImg))
            {
                $nombre=trim(fgets($archivoImg));
                if($nombre)
                {
                    ?><tr><td><a href="zoom.php?img=./fotos/<?php echo $nombre;?>"><img style='width:100px;height:100px;' src="<?php echo "./fotos/".$nombre ?>" alt=""></a></td></tr>
                    
                    <?php
                    
                }
            }
        ?>
    </table>
</body>
</html>