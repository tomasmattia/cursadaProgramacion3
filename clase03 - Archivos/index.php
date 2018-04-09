<?php 
    $archivo = fopen("misArchivos/palabras.txt","r");
    $let1=0;
    $let2=0;
    $let3=0;
    $let4=0;
    $let5=0;
    while(!feof($archivo))
    {
        $palabra = fgets($archivo);
        $cantidadLet= strlen(trim($palabra));
        switch ($cantidadLet)
        {
            case 1:
                $let1+=1;
                break;  
            case 2:
                $let2+=1;
                break;
            case 3:
                $let3+=1;
                break;
            case 4:
                $let4+=1;    
                break;  
            default:
                $let5+=1;
                break;
        }
    }
    echo("<table border='solid'>
    <tr><td>Una</td>
    <td>Dos</td>
    <td>Tres</td>
    <td>Cuatro</td>
    <td>Cinco</td>
    </tr>
    <tr>
        <td>$let1</td>
        <td>$let2</td>
        <td>$let3</td>
        <td>$let4</td>
        <td>$let5</td>
    </tr>
    /table>");
    fclose($archivo);
?>
