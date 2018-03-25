<?php
    $fecha=date('r');
    $mes=date('m');
    $dia=date('d');
    
    echo $fecha;
    switch($mes)
    {
        case 12:
        case 01:
        case 02:
        echo "<br> Es verano";
        break;
        case 03:
        case 04:
        case 05:
        echo "<br> Es otoño";
        break;
        case 06:
        case 07:
        case 08:
        echo "<br> Es invierno";
        break;
        case 09:
        case 10:
        case 11:
        echo "<br> Es primavera";
        break;        
    }
?>