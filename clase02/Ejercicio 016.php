<?php
    function Inversor($frase)
    {
        $auxFrasepila="";
        for($i=(strlen($frase)-1); $i>-1; $i--)
        {
            $auxFrasepila=$auxFrasepila.$frase[$i];
        }
        echo $auxFrasepila;
    }
    Inversor("HOLA");
?>