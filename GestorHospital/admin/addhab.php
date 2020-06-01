<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <table border="1" style="width:100%">
        <caption>Lista de Habitaciones</caption>
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
                $str_pantalla.= "<td><a href='addbed.php?idHab=".$fila['Numero']."'>insertar camas en habitacion ".$fila['Numero']."</td>";
                $str_pantalla.= "</tr>";
            }

            $str_pantalla.= '<form action="addhab.php" method="post"><input type="submit" value="nueva habitacion"></form>';
            $str_pantalla.= "<a href='admin.php'>Volver</a><br>";
               
            echo $str_pantalla;
            ?>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                {
                    include_once dirname(__FILE__) . '/../config/config.php';
                    $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
                    
                    if (!$con) 
                    {
                        echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
                    } 
                    else 
                    {
                        $sqlInsertAdmin = 'INSERT INTO Habitaciones () 
                        VALUES ()';
                        
                        if (mysqli_query($con, $sqlInsertAdmin)) 
                        {
                            echo "<br><div class=\"result_query success_text\"> Inserción de habitacion correcta. </div>";
                        } else {
                            echo "<br><div class=\"result_query error_text\"> Error en la inserción de habitacion en la tabla Habitaciones: " . mysqli_error($con) . "</div>";
                        }
                        mysqli_close($con);
                    }
                }
            ?>
        </tbody>
    </table>

</body>

</html>