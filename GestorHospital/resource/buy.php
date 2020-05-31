
<?php
    if(isset($_GET['nombre']))
    {
        echo "<h1> Cuantas unidades de ".$_GET['nombre']." desea comprar recurso </h1>";
    }
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Cantidad: <input type="number" id="cantidad" name="cantidad"><br>
    <input type="hidden" id="nombre" name="nombre" value="<?php echo $_GET['nombre']?>" ><br>
    <input type="submit" name="submit">
</form>

<?php
    include_once dirname(__FILE__) . '/../config/config.php';
    $str_datos = "";
   
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (mysqli_connect_errno()) 
    {
        $str_datos.= "Error en la conexión: " . mysqli_connect_error();
    }

    if(isset($_POST['submit'])) 
    {
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];

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
    }

    $str_datos.="<a href='../admin/adresource.php'> volver a lista de recursos </a>";

    echo $str_datos;
    mysqli_close($con);
?>


