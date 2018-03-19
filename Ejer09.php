<?php 
    $contador=0;
    $array=array();
    for($i=0;$i<5;$i++)
    {
        $array[$i]=rand(1,10);
        $contador+=$array[$i];
    }
    echo $contador/5, "<br/>";
    if(($contador/5)>6)
    {
        echo "El promedio es mayor a 6";
    }
    else
    {
        if(($contador/5)<6)
        {
            echo "El promedio es menor a 6";
        }
        else
        {
            echo "El promedio es 6";
        }
    }
?>