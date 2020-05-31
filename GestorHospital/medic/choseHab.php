<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medic first page</title>
</head>

<body>
    
    
    <?php
        $varf = $_GET['idMed'];
        echo "<h1>Bienvenido ".$varf."</h1>";
    ?>

    <table border="1" style="width:100%">
        <caption>Lista de Habitaciones disponibles</caption>
        <thead>
            <tr>
                <th>Habitación número</th>
                <th>Asignar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $varf = $_GET['idMed'];

            include_once dirname(__FILE__) . '/../config/config.php';
            include_once dirname(__FILE__) . '/../admin/sqlqueries/habs.php';
            
            $habitaciones = list_habs();
            $str_pantalla ='';
            
            while ($fila = mysqli_fetch_array($habitaciones)) 
            {
                $str_pantalla.='<tr>';
                $str_pantalla.= "<td>".$fila['Numero']."</td>";
                $str_pantalla.= "<td><a href='choseBed.php?idHab=".$fila['Numero']."&idMedico=".$varf."'>Ver camas</td>";
                $str_pantalla.= "</tr>";
                
            }

            $str_pantalla.= "<a href='medic.php'>Volver</td>";
               
            echo $str_pantalla;
            ?>
        </tbody>
    </table>

</body>

</html>