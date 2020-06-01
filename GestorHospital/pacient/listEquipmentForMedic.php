<?php
   include_once dirname(__FILE__) . '/../config/config.php';
   $str_datos = "";
  
   $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
   if (mysqli_connect_errno()) 
   {
       $str_datos.= "Error en la conexión: " . mysqli_connect_error();
   }

   if(isset($_GET['idPaciente']) && isset($_GET['nombre']))
   {
        $str_datos = "<h1>Lista de equipos asignados a ".$_GET['nombre']."<h1>";

        $str_datos.='<table border="1" style="width:100%">';
        $str_datos.='<tr>';
             $str_datos.='<th>IdDeEquipo</th>';
             $str_datos.='<th>Nombre</th>';
             $str_datos.='<th>Eliminar asignacion</th>';
        $str_datos.='</tr>';
     
         $sql = "SELECT * FROM Equipos WHERE IdPaciente = ".$_GET['idPaciente'];
         $respuesta = mysqli_query($con,$sql);

         $n = 0;
         while( $fila = mysqli_fetch_array($respuesta) )
         {
            $n++;
            $str_datos.='<tr>';
                $str_datos.= "<td>".$fila['Numero']."</td>";
                $str_datos.= "<td>".$fila['NombreDeEquipo']."</td>";
                $str_datos.= '  <td>
                                <form action="listEquipmentForMedic.php" method="post">
                                <input type="hidden" name="idEquipo'.$n.'"  value="'.$fila['Numero'].'">
                                <input type="hidden" name="nombreEquipo'.$n.'"  value="'.$fila['NombreDeEquipo'].'">
                                <input type="hidden" name="idDeFila"  value='.$n.'>
                                <input type="submit" value="eliminar asignacion">
                                </form>
                                </td>';
            $str_datos.= "</tr>";
         }
         $str_datos.= "</table>";
   }
   
   $str_datos.="<a href='../medic/medic.php'> volver </a>";
   echo $str_datos;
   mysqli_close($con);
?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if(isset($_POST['idDeFila']))
        {
            $n = $_POST['idDeFila'];
            if(isset($_POST['idEquipo'.$n]) && isset($_POST['nombreEquipo'.$n]))
            {
            
                include_once dirname(__FILE__) . '/../config/config.php';
                $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
                
                if (!$con) 
                {
                    echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
                } 
                else 
                {
                    $sql = 'UPDATE EQUIPOS SET Disponible = true, IdPaciente = null WHERE Numero ='.$_POST['idEquipo'.$n];
                    
                    if (mysqli_query($con, $sql)) 
                    {
                        echo "<br><div class=\"result_query success_text\"> la modificacion del equipo fue un exito </div>";
                    } 
                    else 
                    {
                        echo "<br><div class=\"result_query error_text\"> Error en la modificacion de equipo: " . mysqli_error($con) . "</div>";
                    }
                    mysqli_close($con);
                }
            }
        }
    }
?>