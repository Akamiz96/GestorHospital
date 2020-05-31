<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin first page</title>
</head>

<body>
    <h1>Administrador</h1>
    <a href="addhab.php">Adicionar nueva habitación</a>
    <table>
        <caption>Lista de habitaciones</caption>
        <thead>
            <tr>
                <th>Habitación número</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once dirname(__FILE__) . '/../config/config.php';
            include_once dirname(__FILE__) . '/sqlqueries/habs.php';
            $beds = list_habs();
            while ($fila = mysqli_fetch_array($beds)) {
                echo '<tr>';
                echo '<td>';
                echo $fila['Numero'];
                echo '</td>';
                echo '<td><a href="admin.php">Editar</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

    <a href="addbed.php">Adicionar nueva cama</a>
    <table>
        <caption>Lista de Camas</caption>
        <thead>
            <tr>
                <th>Habitación número</th>
                <th>Cama Número</th>
                <th>Ocupada</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once dirname(__FILE__) . '/../config/config.php';
            include_once dirname(__FILE__) . '/sqlqueries/beds.php';
            $beds = list_beds();
            while ($fila = mysqli_fetch_array($beds)) {
                echo '<tr>';
                echo '<td>';
                echo $fila['HabNumero'];
                echo '</td>';
                echo '<td>';
                echo $fila['Numero'];
                echo '</td>';
                echo '<td>';
                if ($fila['PacienteId'] != null)
                    echo 'Ocupada';
                else
                    echo 'Desocupada';
                echo '</td>';
                echo '<td><a href="admin.php">Editar</a></td>';
                echo '</tr>';
            }
            ?>
    <!--
        Pedro estuvo aqui.
    -->
     <a href="adresource.php">Visualizar recursos</a>
    <!--
        Fin de la edicion de pedro.
    -->

    <!--
        Pedro estuvo aqui.
    -->
    <br><a href="adEquipment.php">Visualizar Equipos</a>
    <!--
        Fin de la edicion de pedro.
    -->

    <!--
        Pedro estuvo aqui.
    -->
    <br><a href="listForm.php">Visualizar solicitudes</a>
    <!--
        Fin de la edicion de pedro.
    -->

        </tbody>
    </table>

</body>

</html>