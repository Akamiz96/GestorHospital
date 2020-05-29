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
                <th>Cama Número</th>
                <th>Asignar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once dirname(__FILE__) . '/../config/config.php';
            include_once dirname(__FILE__) . '/sqlqueries/beds.php';
            $beds = list_beds();
            while ($fila = mysqli_fetch_array($beds)) {
                if ($fila['PacienteId'] == null) {
                    echo '<tr>';
                    echo '<td>';
                    echo $fila['HabNumero'];
                    echo '</td>';
                    echo '<td>';
                    echo $fila['Numero'];
                    echo '</td>';
                    echo '<td><a href="infobed.php?bed=' . $fila['Numero'] . '">Asignar</a></td>';
                    echo '</tr>';
                }
            }
            ?>
        </tbody>
    </table>

</body>

</html>