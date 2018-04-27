<?php
    for($i=1;$i<5;$i++)
    {
        echo ("Las potencias de $i :");
        echo ('<br>');
        for($k=1;$k<5;$k++)
        {
            echo ($i**$k);
            echo ('<br>'); 
        }
    }
?>