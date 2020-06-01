<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medic first page</title>
</head>

<body>
    <tbody>
        <?php
        echo "<h1>Bienvenido administrador</h1>";

        include_once dirname(__FILE__) . '/../config/config.php';
        include_once dirname(__FILE__) . '/../admin/sqlqueries/habs.php';
        
        $str_pantalla ='';

        $str_pantalla.="<br><a href='addhab.php'>Visualizar habitaciones</a>";
        $str_pantalla.="<br><a href='adPacient.php'>Visualizar pacientes</a>";           
        $str_pantalla.="<br><a href='adresource.php'>Visualizar recursos</a>";
        $str_pantalla.="<br><a href='adEquipment.php'>Visualizar equipos</a>";
        $str_pantalla.="<br><a href='listForm.php'>Visualizar solicitudes</a>";
        echo $str_pantalla;
        ?>
    </tbody>
</body>
</html>