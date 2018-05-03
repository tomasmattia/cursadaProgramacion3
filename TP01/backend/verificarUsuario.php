<?php
session_start();
if(isset($_POST['apellido']) && isset($_POST['dni']))
{
    $elArchivo=fopen("../archivos/empleados.txt","r");
    while(!feof($elArchivo))
    {
        $datoEmpleado=explode("-",fgets($elArchivo));
        if(trim($datoEmpleado[0]!=""))
        {
            if($_POST['apellido']==$datoEmpleado[0] && $_POST['dni']==$datoEmpleado[2])
            {
                $_SESSION['dniEmpleado']=$_POST['dni'];
                header("Location:./mostrar.php");
            }
        }
    }
    echo "No se encontro el usuario.";
    fclose($elArchivo);
    echo "</br><a href='../login.html'>Volver</a>";
}
?>