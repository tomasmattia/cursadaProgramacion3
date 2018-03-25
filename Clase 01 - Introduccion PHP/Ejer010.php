<?php
    $array=array();
    $i=0;
    for($k=0;count($array)<10;$k++)
    {
        if($k%2!=0)
        {
            array_push($array,$k);
        }
    }
    
    while($i<10)
    {
        echo $array[$i], "<br/>";
        $i+=1;
    }
    echo "<br/>";
    foreach($array as $num)
    {
        echo $num, "<br/>";
    }
?>