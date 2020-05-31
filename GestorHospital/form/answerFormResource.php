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

        $str_datos.='<form action="answerFormResource.php" method="post">';
        $str_datos.='<table border="1" style="width:100%">';
        $str_datos.='<tr>';
            $str_datos.='<th>Recurso</th>';
            $str_datos.='<th>Cantidad solicitada</th>';
            $str_datos.='<th>Aceptar</th>';
            $str_datos.='<th>Rechazar</th>';
        $str_datos.='</tr>';
        
        $sql = "SELECT * FROM Formularios WHERE Id = ".$idFormulario;
        $resultado = mysqli_query($con,$sql);

        while( $fila = mysqli_fetch_array($resultado) )
        {
            $str_datos.= "<h2>Pedido del medico: ".$fila['NombreMedico']."<h2>";
            
            $sql_1 ="   SELECT NombreDeRecurso , count(NombreDeRecurso) as Cantidad
                        FROM Recursos 
                        WHERE IdFormulario = ".$idFormulario." 
                        GROUP BY NombreDeRecurso";
            
            $n = 0;
            $resultado_1 = mysqli_query($con,$sql_1);
            while( $fila_1 = mysqli_fetch_array($resultado_1) )
            {
                $n++;
                $str_datos.='<tr>';
                    $str_datos.= "<td>".$fila_1['NombreDeRecurso']."</td>";
                    $str_datos.= "<td>".$fila_1['Cantidad']."</td>";

                    $str_datos.= "<input type='hidden' name='nombre".$n."' value='".$fila_1['NombreDeRecurso']."'/>";
                    $str_datos.= "<input type='hidden' name='numero".$n."' value='".$fila_1['Cantidad']."'/>";
                   

                    $str_datos.= "<td><input type='radio'  name='opcion".$n."' value='Aceptado'/></td>";  
                    $str_datos.= "<td><input type='radio'  name='opcion".$n."' value='Rechazado'/></td>";           
                $str_datos.= "</tr>";
            }
            $str_datos.= "<input type='hidden' id='numeroDeRecursos' name='numeroDeRecursos' value=".$n."/>"; 
            $str_datos.= "<input type='hidden' name='idPaciente' value='".$fila['IdPaciente']."'/>";
            $str_datos.= "<input type='hidden' name='idFormulario' value='".$fila['Id']."'/>";
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $numeroDeOpciones = $_POST['numeroDeRecursos'];
            $n = 0;
            while($n < $numeroDeOpciones)
            {
                $n++;
                if (isset($_POST['opcion'.$n]) && isset($_POST['nombre'.$n]) && isset($_POST['numero'.$n]) && isset($_POST['idPaciente']) && isset($_POST['idFormulario'])) 
                {
                    if($_POST['opcion'.$n] == "Aceptado")
                    {
                        $sql = "SELECT * FROM Recursos WHERE IdFormulario =".$_POST['idFormulario']." and NombreDeRecurso = '".$_POST['nombre'.$n]."'";
                        $resultado = mysqli_query($con,$sql);

                        while( $fila = mysqli_fetch_array($resultado) )
                        {
                            $sql_1 = "  UPDATE Recursos
                                        SET IdFormulario = null,
                                            IdPaciente =".$_POST['idPaciente']."
                                        WHERE Numero = ".$fila['Numero'];
                    
                            if(mysqli_query($con,$sql_1))
                            {
                                echo "Se ha actualizado el cama: ".$fila['NombreDeRecurso']."<br>";
                            }
                            else
                            {
                                echo "Error actualizado al cama: ".mysqli_error($con)."<br>";
                            }
                        }

                        $sql = "UPDATE Formularios SET Aprobado = true WHERE Id =".$_POST['idFormulario'];

                        if(mysqli_query($con,$sql))
                        {
                            echo "Se ha actualizado el formulario: ".$_POST['idFormulario']."<br>";
                        }
                        else
                        {
                            echo "Error actualizado al cama: ".mysqli_error($con)."<br>";
                        }

                    } 
                    else if($_POST['opcion'.$n] == "Rechazado")
                    {
                        $sql = "SELECT * FROM Recursos WHERE IdFormulario =".$_POST['idFormulario']." and NombreDeRecurso = '".$_POST['nombre'.$n]."'";
                        $resultado = mysqli_query($con,$sql);

                        while( $fila = mysqli_fetch_array($resultado) )
                        {
                            $sql_1 = "  UPDATE Recursos
                                        SET IdFormulario = null,
                                            Disponible = true
                                        WHERE Numero = ".$fila['Numero'];
                         
                            if(mysqli_query($con,$sql_1))
                            {
                                echo "Se ha actualizado el cama: ".$fila['NombreDeRecurso']."<br>";
                            }
                            else
                            {
                                echo "Error actualizado al cama: ".mysqli_error($con)."<br>";
                            }
                        }
                    }
                }
                else
                {
                    $str_datos.= "Al parecer algunos campos del formulario no fueron llenados<br>";
                }
            }
        }
    }

    echo $str_datos;
    mysqli_close($con);
?>