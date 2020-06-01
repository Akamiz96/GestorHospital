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
        session_start();
        $varf = session_id();
        echo "<h1>Bienvenido ".$varf."</h1>";

        include_once dirname(__FILE__) . '/../config/config.php';
        include_once dirname(__FILE__) . '/../admin/sqlqueries/habs.php';
        
        $str_pantalla ='';
        
        $str_pantalla.= "<a href='choseHab.php?idMed=".$varf."'>ver las habitaciones<br><br>";
        $str_pantalla.= "<a href='petitionPacients.php?idMed=".$varf."'>ver a los pacientes<br><br>";
        $str_pantalla.= "<a href='email.php?idMed=".$varf."'>email<br><br>";

        echo $str_pantalla;
        ?>
    </tbody>
</body>

</html>