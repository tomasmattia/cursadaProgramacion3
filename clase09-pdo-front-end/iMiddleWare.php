<?php

    interface IMiddleWare
    {
        function VerificarUsuario($request,$response,$next);
    }
?>