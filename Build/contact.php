<?php
/* Set e-mail recipient */
$myemail  = "hectorob91@gmail.com";
$subject = "Nueva orden, confirma la orden por telefono por favor";
/* Check all form inputs using check_input function */
$nombre = check_input($_POST['nombre'], "Ingresa tu nombre");
$direccion  = check_input($_POST['direccion'], "direccion completa");
$email    = check_input($_POST['email']);
$telefono  = check_input($_POST['telefono']);
$pizzas = check_input($_POST['pizzas']);
$complementos = check_input($_POST['complementos']);
$comments = check_input($_POST['bebida'], "Escribe tu bebida");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("La direcci&oacute;n de correo no es valida");
}

/* If URL is not valid set $website to empty */
if (!preg_match("/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i", $telefono))
{
    $telefono = '';
}

/* Let's prepare the message for the e-mail */
$message = "LA ORDEN ES LA SIGUIENTE:

Nombre: $nombre
Direccion: $direccion
E-mail: $email
Telefono: $telefono

La pizza que ordeno es: $pizzas
y el complemento es: $complementos

Bebida:
$comments

Porfavor confirma por telefono la orden.
 Gracias.
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: gracias.htm');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>