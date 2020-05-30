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

    $sql = "SELECT * FROM Equipos"; 
    $resultado = mysqli_query($con,$sql);

    $numeroDeEquipos = 1;

    while($fila = mysqli_fetch_array($resultado)) 
    {
        $numeroDeEquipos++;
    }
    
    
    $sql = "INSERT INTO Equipos (Numero , nombreDeEquipo, Disponible) VALUES ($numeroDeEquipos,'$nombre',true)";

    if(mysqli_query($con,$sql))
    {
    echo "Se ha insertado el nuevo equipo exitosamente.";
    }
    else
    {
    echo "Error insertando el nuevo equipo";
    }

    $str_datos.="<a href='../admin/adEquipment.php'> lista de Equipos</a>";

    echo $str_datos;
    mysqli_close($con);
?>
