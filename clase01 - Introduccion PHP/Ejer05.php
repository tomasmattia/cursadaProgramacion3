<?php 
    $a=rand(1,10);
    $b=rand(1,10);
    $c=rand(1,10);
    echo $a, "<br>", $b ,"<br>",$c ,"<br>";
    if($a==$b || $a==$c || $b==$c)
    {
        echo "No hay valor del medio";
    }
    else
    {
        if($a>$b && $a<$c || $a<$b && $a>$c)
        {
            echo "El valor del medio es: ", $a;
        }
        else
        {
            if($c>$a && $c<$b || $c<$a && $c>$b)
            {
                echo "El valor del medio es: ", $c;
            }
            else
            {
                echo "El valor del medio es: ",$b;
            }
        }
    }
?>