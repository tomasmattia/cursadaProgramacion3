<?php
    require_once "./helado.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Helados</title>
</head>
<body>
    <?php
        $listaHelados=Helado::TraerDB();
        ?>
        <h2 align="center">Listado de Helados</h2>
        <table align="center">
            <thead><h2 align="center">Info</h2></thead>
            <tr><td colspan="4"><hr></td></tr>           
            <?php
                foreach($listaHelados as $hel)
                {
                    echo "<tr><td>".$hel->GetSabor()." ".$hel->PrecioMasIva()."</td>"."<td><img src='".$hel->GetPathFoto().".jpg' alt='".$hel->GetSabor()."' style='width:90px;height:90px;'></td><td>"; 
                }
            ?> 
            <tr><td colspan="4"><hr></td></tr>
        </table>
</body>
</html>