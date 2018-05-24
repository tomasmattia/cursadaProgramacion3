<?php
    require_once "helado.php";

    $sabor=$_POST['sabor'];
    $precio=$_POST['precio'];
    $foto=$_FILES['foto'];
    
    if(isset($_POST['sabor']))
    {
        $sabor=$_POST['sabor'];
        try
        {
            $usuario='root';
            $clave='';
            $objetoPDO = new PDO('mysql:host=localhost;dbname=parcial;charset=utf8', $usuario, $clave);
            $sql=$objetoPDO->prepare('UPDATE `helados` SET `precio` = :precio ,`foto` = :foto WHERE `sabor`= :sabor');

            $arrayHelados= Helado::TraerDB();
            foreach($arrayHelados as $heladito)
            {
                if($heladito->GetSabor()==$sabor)
                {
                    $rutaFoto=$sabor.date("H").date("i").date("s");
                    $sql->execute(array(
                        'precio' => $precio,
                        'foto' => $rutaFoto,
                        'sabor' => $sabor));
                        move_uploaded_file($_FILES['foto']['tmp_name'],"./heladosArchivo/heladosImagen/".$rutaFoto.".jpg");
                        unlink($heladito->GetPathFoto().".jpg");
                    exit;
                }
            }
        }
        catch(PDOException $e) 
        {
            echo "Error!\n" . $e->getMessage();
        }
    }
?>