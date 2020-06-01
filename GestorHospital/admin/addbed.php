<?php
    if(isset($_GET['idHab']))
    {
        echo "<h1> Cuantas camas desea para la habitacion ".$_GET['idHab']."</h1>";
    }
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Cantidad: <input type="number" id="cantidad" name="cantidad"><br>
    <input type="hidden" id="habitacion" name="habitacion" value="<?php echo $_GET['idHab']?>" ><br>
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
        $idHabitacion = $_POST['habitacion'];
        $cantidad = $_POST['cantidad'];

        $n = 0;
        while( $n < $cantidad ) 
        {
            $n++;
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( '.$idHabitacion.' , null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama ".$n." correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama ".$n." en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            
        }
    }

    $str_datos.="<a href='addHab.php'> volver </a>";

    echo $str_datos;
    mysqli_close($con);
?>
