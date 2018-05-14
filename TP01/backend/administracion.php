<?php
    define('KB', 1024);
    include_once("fabrica.php");
    $hdnModificar = $_POST['hdnModificar'];
    
    if(isset($_POST['hdnModificar'])) 
    {
        $ruta = "../archivos/empleados.txt";
        $archivoDeEmpleados = fopen($ruta, "r");
        while (!feof($archivoDeEmpleados)) 
        {
            $lineaDeTexto = trim(fgets($archivoDeEmpleados));
            if ($lineaDeTexto) 
            {
                $datoEmpleado = explode("-", $lineaDeTexto);
                if ($datoEmpleado[2] == $_POST['txtDni']) 
                {
                    $unEmpleado = new Empleado($datoEmpleado[0], $datoEmpleado[1], $datoEmpleado[2], $datoEmpleado[3], $datoEmpleado[4], $datoEmpleado[5], $datoEmpleado[6]);
                    $unEmpleado->SetPathFoto(trim("../fotos/".$datoEmpleado[2]."-".$datoEmpleado[0]));
                    break;
                    echo "encontrado";
                }
            }
        }
        fclose($archivoDeEmpleados);
        $laFabrica = new Fabrica("La pequenia fabrica del PHP", 7);
        $laFabrica->TraerDeArchivo("empleados.txt");
        if ($laFabrica->EliminarEmpleado($unEmpleado)) 
        {
            $laFabrica->GuardarEnArchivo("empleados.txt");
            if (!unlink($unEmpleado->GetPathFoto().".jpg")) 
            {
                echo "Hubo un error al eliminar el empleado";
            }
            echo "eliminado";
        }
    }

    $foto=pathinfo($_FILES['imagen']['name']);
    var_dump($_POST);
    var_dump($foto);
    $rutaFoto="../fotos/".$_POST['txtDni']."-".$_POST['txtApellido'].".jpg";
    var_dump($rutaFoto);
    if($foto['extension']!='jpg' && $foto['extension']!='png' && $foto['extension']!='jpeg' && $foto['extension']!='gif' && $foto['extension']!='bmp')
    {
        echo "Extension invalida";
    }
    else if(filesize($_FILES['imagen']['size'])>5*KB)
    {
        echo "Foto demasiado pesada";
    }
    else if(file_exists($rutaFoto))
    {
        echo "Ya existe una foto con ese nombre";
    }
    else
    {
        $empleado=new Empleado($_POST['txtApellido'],$_POST['txtNombre'],$_POST['txtDni'],$_POST['cboSexo'],$_POST['txtLegajo'],$_POST['txtSueldo'],$_POST['rdoTurno']);
        $fabrica=new Fabrica("La pequenia fabrica del PHP",7);
        $fabrica->TraerDeArchivo("empleados.txt");

        if($fabrica->AgregarEmpleado($empleado))
        {
            if($fabrica->GuardarEnArchivo("empleados.txt"))
            {
                move_uploaded_file($_FILES['imagen']['tmp_name'],$rutaFoto);
                ?><a href=./mostrar.php>Empleado cargado - Mostrar</a><?php          
            }
            else
            {
                ?><a href=index.php>Error al escribir archivo - Index</a><?php
            }
        }
        else
        {
            ?><a href=index.php>Error al agregar empleado fábrica llena - Index</a><?php      
        }
    }

    
    
?>
    