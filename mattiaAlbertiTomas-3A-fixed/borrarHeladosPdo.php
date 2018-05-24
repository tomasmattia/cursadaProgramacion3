<?php
    require_once "helado.php";
    if(isset($_GET['sabor']))
    {
        $bandera=0;
        $sabor=$_GET['sabor'];
        $arrayHelados= Helado::TraerDB();
        foreach($arrayHelados as $heladito)
        {
            if($heladito->GetSabor()==$sabor)
            {
                echo "El sabor existe";
                $bandera=1;
                exit;
            }
        }
        if($bandera==0)
        {
            echo "El sabor no existe";
        }
    }
    else if(isset($_POST['sabor']))
    {
        $sabor=$_POST['sabor'];
        if($_POST['queDeboHacer']=="borrar")
        {
            try
            {
                $usuario='root';
                $clave='';
                $objetoPDO = new PDO('mysql:host=localhost;dbname=parcial;charset=utf8', $usuario, $clave);
                $sql=$objetoPDO->prepare('DELETE FROM `helados` WHERE `sabor`= :sabor');

                $arrayHelados= Helado::TraerDB();
                foreach($arrayHelados as $heladito)
                {
                    if($heladito->GetSabor()==$sabor)
                    {
                        $sql->execute(array('sabor' => $sabor));
                        exit;
                    }
                }
            }
            catch(PDOException $e) 
            {
                echo "Error!\n" . $e->getMessage();
            }
        }
    }
    

?>