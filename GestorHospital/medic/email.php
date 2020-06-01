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
        $idMedico = $_GET['idMed'];
        echo "<h1>Correo del medico: ".$idMedico."</h1>";

        include_once dirname(__FILE__) . '/../config/config.php';
        $str_datos = "";
       
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        if (mysqli_connect_errno()) 
        {
            $str_datos.= "Error en la conexión: " . mysqli_connect_error();
        }
        
        $str_datos ='';

        $str_datos.='<table border="1" style="width:100%">';
        $str_datos.='<tr>';
            $str_datos.='<th>IdEmail</th>';
            $str_datos.='<th>Informe</th>';
        $str_datos.='</tr>';
        
        $str_datos.= "<h3>Mensajes<h3>";
    
        $sql = "SELECT * FROM Correos";
        $resultado = mysqli_query($con,$sql);
       
        while($fila = mysqli_fetch_array($resultado)) 
        {       
            if($fila['NombreMedico'] == $idMedico)
            { 
                $str_datos.='<tr>';
                    $str_datos.= "<td>".$fila['Id']."</td>";
                    $str_datos.= "<td>".$fila['Informe']."</td>";
                $str_datos.= "</tr>";
            }  
        }
        $str_datos.= "</table>";
        
        $str_datos.= "<a href='medic.php'>regresar<br><br>";

        echo $str_datos;
        mysqli_close($con);
        ?>
    </tbody>
</body>

</html>