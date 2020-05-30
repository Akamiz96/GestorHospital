<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/titles.css">
    <link rel="stylesheet" type="text/css" href="css/back.css">
    <title>Creacion de base de datos</title>
</head>

<body>
    <h1>Creación de base de datos</h1>
    <h2>Proyecto Programación web</h2>
    <h3>Mayo 2020</h3>
    <div>
    </div>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Usuarios ( UserName, Email, Contrasenia, Rol, Activo) 
            VALUES (\'admin\', \'admin@admin.com\', \'' . password_hash('admin', PASSWORD_DEFAULT) . '\', \'ADMIN\',false)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de administrador correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de administrador en la tabla usuarios: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Usuarios ( UserName, Email, Contrasenia, Rol, Activo) 
            VALUES (\'medico1\', \'medico1@medico1.com\', \'' . password_hash('medico1', PASSWORD_DEFAULT) . '\', \'MEDICO\',false)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de medico1 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de medico1 en la tabla usuarios: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Usuarios ( UserName, Email, Contrasenia, Rol, Activo) 
            VALUES (\'medico2\', \'medico2@medico2.com\', \'' . password_hash('medico2', PASSWORD_DEFAULT) . '\', \'MEDICO\',false)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de medico2 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de medico2 en la tabla usuarios: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Usuarios ( UserName, Email, Contrasenia, Rol, Activo) 
            VALUES (\'medico3\', \'medico3@medico3.com\', \'' . password_hash('medico3', PASSWORD_DEFAULT) . '\', \'MEDICO\',false)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de medico3 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de medico3 en la tabla usuarios: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Habitaciones () 
            VALUES ()';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de habitacion1 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de habitacion1 en la tabla Habitaciones: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Habitaciones () 
            VALUES ()';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de habitacion2 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de habitacion2 en la tabla Habitaciones: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Habitaciones () 
            VALUES ()';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de habitacion3 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de habitacion3 en la tabla Habitaciones: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Habitaciones () 
            VALUES ()';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de habitacion4 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de habitacion4 en la tabla Habitaciones: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Habitaciones () 
            VALUES ()';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de habitacion5 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de habitacion5 en la tabla Habitaciones: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( 1, null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama1 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama1 en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( 1, null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama2 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama2 en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( 1, null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama3 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama3 en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( 1, null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama4 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama4 en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( 2, null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama5 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama5 en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( 2, null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama6 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama6 en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( 2, null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama7 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama7 en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'alcohol\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso1 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso1 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'alcohol\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso2 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso2 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'alcohol\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso3 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso3 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'alcohol\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso4 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso4 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'alcohol\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso5 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso5 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'alcohol\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso6 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso6 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'alcohol\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso7 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso7 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'alcohol\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso8 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso8 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'tapa bocas\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso9 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso9 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'tapa bocas\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso10 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso10 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'tapa bocas\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso11 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso11 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'tapa bocas\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso12 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso12 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'tapa bocas\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso13 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso13 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'tapa bocas\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso14 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso14 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'tapa bocas\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso15 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso15 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'suero\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso16 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso16 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'suero\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso17 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso17 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'suero\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso18 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso18 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'suero\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso19 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso19 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'suero\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso20 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso20 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'suero\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso21 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso21 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'suero\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso22 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso22 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'suero\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso23 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso23 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'suero\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso24 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso24 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'anestecia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso25 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso25 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'anestecia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso26 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso26 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'anestecia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso27 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso27 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'anestecia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso28 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso28 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'anestecia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso29 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso29 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'anestecia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso30 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso30 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'anestecia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso31 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso31 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'anestecia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso32 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso32 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'anestecia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso33 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso33 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'anestecia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso34 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso34 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'anestecia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso35 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso35 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'anestecia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso36 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso36 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente) 
            VALUES ( \'anestecia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso37 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso37 en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'ventilador\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'ventilador\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'ventilador\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'ventilador\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'ventilador\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'ventilador\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'ventilador\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'ventilador\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'ventilador\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'ventilador\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'ventilador\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de resonancia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de resonancia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de resonancia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de resonancia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de resonancia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de resonancia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de resonancia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de resonancia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de resonancia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de resonancia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de ecografia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de ecografia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de ecografia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de ecografia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de ecografia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de ecografia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de ecografia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de ecografia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de ecografia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de ecografia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de ecografia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente) 
            VALUES ( \'maquina de ecografia\', true , null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Pacientes (Identificacion, Nombre, Apellido, Prioridad, Diagnostico, FechaDeIngreso, DuracionEnDias, IdCama, NombreMedico) 
            VALUES ( 1127342601 ,\'paciente1\', \'enfermo1\' , null, null, null, null, null, null )';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de paciente1 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de paciente1 en la tabla Pacientes: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Pacientes (Identificacion, Nombre, Apellido, Prioridad, Diagnostico, FechaDeIngreso, DuracionEnDias, IdCama, NombreMedico) 
            VALUES ( 1127342602 ,\'paciente2\', \'enfermo2\' , null, null, null, null, null, null )';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de paciente2 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de paciente2 en la tabla Pacientes: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Pacientes (Identificacion, Nombre, Apellido, Prioridad, Diagnostico, FechaDeIngreso, DuracionEnDias, IdCama, NombreMedico) 
            VALUES ( 1127342603 ,\'paciente3\', \'enfermo3\' , null, null, null, null, null, null )';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de paciente3 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de paciente3 en la tabla Pacientes: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Pacientes (Identificacion, Nombre, Apellido, Prioridad, Diagnostico, FechaDeIngreso, DuracionEnDias, IdCama, NombreMedico) 
            VALUES ( 1127342600 ,\'paciente0\', \'enfermo0\' , null, null, null, null, null, null )';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de paciente0 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de paciente0 en la tabla Pacientes: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Pacientes (Identificacion, Nombre, Apellido, Prioridad, Diagnostico, FechaDeIngreso, DuracionEnDias, IdCama, NombreMedico) 
            VALUES ( 1127342605 ,\'paciente5\', \'enfermo5\' , null, null, null, null, null, null )';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de paciente5 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de paciente5 en la tabla Pacientes: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <div>
        <a class="back" href="index.php">Regresar</a>
    </div>
</body>
</html>