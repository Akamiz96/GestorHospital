<h1> Add. a la base de datos (Recursos) </h1>

<?php
    include_once dirname(__FILE__) . '/../config/config.php';
    $str_datos = "";
   
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (mysqli_connect_errno()) 
    {
        $str_datos.= "Error en la conexión: " . mysqli_connect_error();
    }

    $nombre = $_GET['nombre'];
    $cantidad = $_GET['cantidad'];

    $n = 0;
    while( $n < $cantidad ) 
    {
        $sql = "INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente)"; 
        $sql.= " VALUES ( '".$nombre."' , true , null)";

        if (mysqli_query($con, $sql)) 
        {
            echo "<br><div class=\"result_query success_text\"> Inserción de recurso ".$n." correcta. </div>";
        } else {
            echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso ".$n." en la tabla Recursos: " . mysqli_error($con) . "</div>";
        }
        $n++;
    }

    $str_datos.="<a href='../admin/adresource.php'> volver a lista de recursos</a>";

    echo $str_datos;
    mysqli_close($con);
?>
