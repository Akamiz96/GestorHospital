
<h1> Comprar recurso </h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Cantidad: <input type="number" id="cantidad" name="cantidad"><br>
    Id: <input type="number" id="id" name="id" value="<?php echo $_GET['id']?>"  > se recomienda no editar este campo<br>
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
        $id = $_POST['id'];
        $cantidad = $_POST['cantidad'];

        $sql = "SELECT * FROM Recursos"; 
        $resultado = mysqli_query($con,$sql);

        while($fila = mysqli_fetch_array($resultado)) 
        {
            if( $fila['Numero'] === $id )
            {
                $cantidadVieja = $fila['Cantidad'];
                $cantidadNueva = $cantidadVieja + $cantidad;

                $sql = "UPDATE Recursos SET Cantidad = '$cantidadNueva' WHERE Numero = $id";
                
                if(mysqli_query($con,$sql))
                {
                    echo "Se ha actualizado la tupla de ".$id."<br>";
                }
                else
                {
                    echo "Error actualizando la tupla de ".$id."<br>";
                }
            }
        }
    }

    $str_datos.="<a href='../admin/adresource.php'> lista de recursos</a>";

    echo $str_datos;
    mysqli_close($con);
?>


