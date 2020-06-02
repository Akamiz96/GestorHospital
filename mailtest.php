<h2>Correo </h2>
<?php 
// El mensaje
$mensaje = "Te amo demasiado\r\nEstare a tu lado por siempre\r\nDisculpame\r\n\n\n\nEres lo mejor que me ha pasado";

// Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
$mensaje = wordwrap($mensaje, 70, "\r\n");

// Enviamos el email
if(mail('majo.56987@gmail.com', 'Probando email PHP', $mensaje))
{
    echo "EMAIL ENVIADO...";
}else{
    echo "EMAIL NO ENVIADO..."; 
}


?>