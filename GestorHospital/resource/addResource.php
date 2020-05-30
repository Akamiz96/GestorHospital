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

    $sql = "SELECT * FROM Recursos"; 
    $resultado = mysqli_query($con,$sql);

    $numeroDeRecursos = 1;

    while($fila = mysqli_fetch_array($resultado)) 
    {
        $numeroDeRecursos++;
    }
    
    $sql = "INSERT INTO Recursos (Numero, NombreDeRecurso, Cantidad) 
    VALUES ($numeroDeRecursos,'$nombre',$cantidad)";

    if(mysqli_query($con,$sql))
    {
    echo "Se ha insertado el nuevo recurso exitosamente.";
    }
    else
    {
    echo "Error insertando el nuevo recurso";
    }

    $str_datos.="<a href='../admin/adresource.php'> lista de recursos</a>";

    echo $str_datos;
    mysqli_close($con);
?>
