<?php
    session_start();
    if(!isset($_SESSION['dniEmpleado']))
    {
        header("Location:http://localhost/cursadaProgramacion3/TP%2001/login.html");
    }
?>