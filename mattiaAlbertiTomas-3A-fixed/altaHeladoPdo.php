<?php
    require_once "./helado.php";

    $sabor=$_POST['sabor'];
    $precio=$_POST['precio'];
    $foto=$_FILES['foto'];
    $rutaFoto=$sabor.date("H").date("i").date("s");
    try
    {
        $usuario='root';
        $clave='';
        $objetoPDO = new PDO('mysql:host=localhost;dbname=parcial;charset=utf8', $usuario, $clave);
        $sql=$objetoPDO->prepare('INSERT INTO `helados`(`sabor`, `precio`, `foto`) VALUES (:sabor, :precio, :foto)');
        
        $sql->execute(array(
            'sabor' => $sabor,
            'precio' => $precio,
            'foto' => $rutaFoto
        ));
    
        $rutaFoto="./heladosArchivo/heladosImagen/".$sabor.date("H").date("i").date("s").".jpg";
    
        move_uploaded_file($_FILES['foto']['tmp_name'],$rutaFoto);
    }
    catch(PDOException $e) 
    {
        echo "Error!\n" . $e->getMessage();
    }
    
    
?>