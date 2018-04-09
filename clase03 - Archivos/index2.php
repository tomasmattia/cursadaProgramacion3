<?php 
    echo ("<form action=''><input type='text' name='archivo'><input type='submit' value='Enviar'></form>");
    var_dump($_GET['archivo']);
    if(isset($_GET['archivo']))
    { 
        copy("misArchivos/".$_GET['archivo'],"misArchivos/".date("Y")."_".date("m")."_".date("d")."_".date("H")."_".date("i")."_".date("s").".txt");
    }
    
?>