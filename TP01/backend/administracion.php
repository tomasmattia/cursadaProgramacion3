<?php
    include_once("fabrica.php");
    $foto=pathinfo($_FILES['pathFoto']['name']);
    $rutaFoto="../fotos/".$_POST['txtDni']."-".$_POST['txtApellido'].".".$foto['extension'];
    if($foto['extension']!='jpg' && $foto['extension']!='png' && $foto['extension']!='jpeg' && $foto['extension']!='gif' && $foto['extension']!='bmp')
    {
        echo "Extension invalida";
    }
    else if($foto['size']>1024)
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
                move_uploaded_file($_FILES['foto']['tmp_name'],$rutaFoto);
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
    