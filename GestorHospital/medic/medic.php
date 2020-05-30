<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medic first page</title>
</head>

<body>
    <h1>Medic</h1>
    
    <table>
        <caption>Lista de Camas disponibles</caption>
        <thead>
            <tr>
                <th>Habitación número</th>
                <th>Asignar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once dirname(__FILE__) . '/../config/config.php';
            include_once dirname(__FILE__) . '/../admin/sqlqueries/habs.php';
            
            $habitaciones = list_habs();
            $str_pantalla ='';
            
            while ($fila = mysqli_fetch_array($habitaciones)) 
            {
                $str_pantalla.='<tr>';
                $str_pantalla.= "<td>".$fila['Numero']."</td>";
                $str_pantalla.= "<td><a href='choseBed.php?idHab=".$fila['Numero']."'>Ver camas</td>";
                $str_pantalla.= "</tr>";
                
            }

            echo $str_pantalla;
            ?>
        </tbody>
    </table>

</body>

</html>