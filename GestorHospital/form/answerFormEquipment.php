<?php
    include_once dirname(__FILE__) . '/../config/config.php';
    $str_datos = "";
   
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (mysqli_connect_errno()) 
    {
        $str_datos.= "Error en la conexión: " . mysqli_connect_error();
    }

    if(isset($_GET['idFormulario']))
    {
        $idFormulario = $_GET['idFormulario'];
        $str_datos.='<form action="answerFormEquipment.php" method="post">';
        $str_datos.='<table border="1" style="width:100%">';
        $str_datos.='<tr>';
            $str_datos.='<th>Equipo</th>';
            $str_datos.='<th>Cantidad solicitada</th>';
            $str_datos.='<th>Aceptar</th>';
            $str_datos.='<th>Rechazar</th>';
        $str_datos.='</tr>';
        
        $sql = "SELECT * FROM Formularios WHERE Id = ".$idFormulario;
        $resultado = mysqli_query($con,$sql);

        while($fila = mysqli_fetch_array($resultado))
        {
            $str_datos.= "<h2>Pedido del medico: ".$fila['NombreMedico']."<h2>";
            
            $sql_1 ="   SELECT NombreDeEquipo , count(NombreDeEquipo) as Cantidad
                        FROM Equipos 
                        WHERE IdFormulario = ".$idFormulario." 
                        GROUP BY NombreDeEquipo";
            
            $n = 0;
            $resultado_1 = mysqli_query($con,$sql_1);
            while( $fila_1 = mysqli_fetch_array($resultado_1) )
            {
                $n++;
                $str_datos.='<tr>';
                    $str_datos.= "<td>".$fila_1['NombreDeEquipo']."</td>";
                    $str_datos.= "<td>".$fila_1['Cantidad']."</td>";

                    $str_datos.= "<input type='hidden' name='nombre".$n."' value='".$fila_1['NombreDeEquipo']."'/>";
                    $str_datos.= "<input type='hidden' name='numero".$n."' value='".$fila_1['Cantidad']."'/>";
                   

                    $str_datos.= "<td><input type='radio'  name='opcion".$n."' value='Aceptado'/></td>";  
                    $str_datos.= "<td><input type='radio'  name='opcion".$n."' value='Rechazado'/></td>";           
                $str_datos.= "</tr>";
            }
            $str_datos.= "<input type='hidden' id='numeroDeEquipos' name='numeroDeEquipos' value=".$n."/>"; 
            $str_datos.= "<input type='hidden' name='idPaciente' value='".$fila['IdPaciente']."'/>";
            $str_datos.= "<input type='hidden' name='idFormulario' value='".$fila['Id']."'/>";
            $str_datos.= "<input type='hidden' name='nombreMedico' value='".$fila['NombreMedico']."'/>";
        }
        $str_datos.='<input type="submit" value="Enviar">';
        $str_datos.='</form>';
    }

    $str_datos.="<a href='../admin/listForm.php'> volver </a><br>";
    echo $str_datos;
    mysqli_close($con);
?>

<?php

    include_once dirname(__FILE__) . '/../config/config.php';
    $str_datos = "";
   
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (mysqli_connect_errno()) 
    {
        $str_datos.= "Error en la conexión: " . mysqli_connect_error();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $numeroDeOpciones = $_POST['numeroDeEquipos'];
        $n = 0;
        $correo ='';

        while($n < $numeroDeOpciones)
        {
            $n++;
            if (isset($_POST['opcion'.$n]) && isset($_POST['nombre'.$n]) && isset($_POST['numero'.$n]) && isset($_POST['idPaciente']) && isset($_POST['idFormulario']) && isset($_POST['nombreMedico'])) 
            {
                if($_POST['opcion'.$n] == "Aceptado")
                {
                    $sql = "SELECT * FROM Equipos WHERE IdFormulario =".$_POST['idFormulario']." and NombreDeEquipo = '".$_POST['nombre'.$n]."'";
                    $resultado = mysqli_query($con,$sql);

                    while( $fila = mysqli_fetch_array($resultado) )
                    {
                        $sql_1 = "  UPDATE Equipos
                                    SET IdFormulario = null,
                                        IdPaciente =".$_POST['idPaciente']."
                                    WHERE Numero = ".$fila['Numero'];
                
                        if(mysqli_query($con,$sql_1))
                        {
                            $correo.="Se ha asinado el equipo: ".$fila['NombreDeEquipo']." al paciente con la cedula ".$_POST['idPaciente'].".<br>";
                        }
                        else
                        {
                            echo "Error actualizado al equipo: ".mysqli_error($con)."<br>";
                        }
                    }
                } 
                else if($_POST['opcion'.$n] == "Rechazado")
                {
                    $sql = "SELECT * FROM Equipos WHERE IdFormulario =".$_POST['idFormulario']." and NombreDeEquipo = '".$_POST['nombre'.$n]."'";
                    $resultado = mysqli_query($con,$sql);

                    while( $fila = mysqli_fetch_array($resultado) )
                    {
                        $sql_1 = "  UPDATE Equipos
                                    SET IdFormulario = null,
                                        Disponible = true
                                    WHERE Numero = ".$fila['Numero'];
                        
                        if(mysqli_query($con,$sql_1))
                        {
                            $correo.="Se ha liberado el equipo: ".$fila['NombreDeEquipo']." no se asigno al paciente con la cedula ".$_POST['idPaciente'].".<br>";
                        }
                        else
                        {
                            echo "Error actualizado al equipo: ".mysqli_error($con)."<br>";
                        }
                    }
                }

                if($n == $numeroDeOpciones)
                {
                    $sql = "UPDATE Formularios SET Aprobado = true WHERE Id =".$_POST['idFormulario'];

                    if(mysqli_query($con,$sql))
                    {
                        $correo.= "Por ultimo hay que informar que el formulario con el id ".$_POST['idFormulario']." ya se respondio satisfactoriamente.<br>";
                    }
                    else
                    {
                        echo "Error actualizado al formulario: ".mysqli_error($con)."<br>";
                    }

                    $sqlInsertEmail = "INSERT INTO Correos (Informe, NombreMedico)"; 
                    $sqlInsertEmail.= " VALUES ( '".$correo."','".$_POST['nombreMedico']."')";        
                    if (mysqli_query($con, $sqlInsertEmail)) 
                    {
                        $sql_email = "SELECT Email FROM USUARIOS WHERE Username='" . $_POST['nombreMedico'] . "'";
                        if ($result = mysqli_query($con, $sql_email)) {
                            $fila_1 = mysqli_fetch_array($result);
                            $email_to = $fila_1['Email'];
                            echo $_POST['nombreMedico'] . " mensaje: " . $correo . "<br><br>";
                            echo "<br><div class=\"result_query success_text\"> Inserción del correo y envio exitoso. </div>";
                            mail($email_to, 'Solicitud SaludSis', $correo);
                        }else{
                        echo "<br><div class=\"result_query error_text\"> Correo no enviado." . mysqli_error($con) . "</div>";
                        }
                    } 
                    else 
                    {
                        echo "<br><div class=\"result_query error_text\"> Error en la inserción del correo: " . mysqli_error($con) . "</div>";
                    }       
                }
            }
            else
            {
                $str_datos.= "Al parecer algunos campos del formulario no fueron llenados<br>";
            }
        }  
    }

    echo $str_datos;
    mysqli_close($con);
?>