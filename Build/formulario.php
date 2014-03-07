<?php
if(isset($_POST['email'])) {
	
	// CHANGE THE TWO LINES BELOW
	$email_to = "reicker@me.com";
	
	$email_subject = "Email desde el website.";
	
	
	function died($error) {
		// your error code can go here
		echo "Lo sentimos, pero hay errores en el formulario que envi&oacute;.<br /><br />";
		echo $error."<br /><br />";
		echo "Por favor regrese y corrija estos errores.<br /><br />";
		die();
	}
	
	// validation expected data exists
	if(!isset($_POST['nombre']) ||
	if(!isset($_POST['ciudad']) ||
		!isset($_POST['email']) ||
		!isset($_POST['telefono']) ||
		!isset($_POST['mensaje'])) {
		died('Lo sentimos, pero hay errores en el formulario que envi&oacute;.');		
	}
	
	$first_name = $_POST['nombre']; // required
	$email_from = $_POST['email']; // required
	$ciudad = $_POST['ciudad']; // not required
	$telephone = $_POST['telephone']; // not required
	$comments = $_POST['comments']; // required
	
	$error_message = "";
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
  	$error_message .= 'El email que usted envi&oacute; parece no ser v&aacute;lido.<br />';
  }
	$string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
  	$error_message .= 'El nombre que usted envi&oacute; parece no ser v&aacute;lido.<br />';
  }
  if(strlen($comments) < 2) {
  	$error_message .= 'Los comentarios que usted envi&oacute; parecen no ser v&aacute;lidos.<br />';
  }
  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	$email_message = "Detalles del formulario abajo..\n\n";
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:","href");
	  return str_replace($bad,"",$string);
	}
	
	$email_message .= "Nombre: ".clean_string($first_name)."\n";
	$email_message .= "Ciudad: ".clean_string($ciudad)."\n";
	$email_message .= "Email: ".clean_string($email_from)."\n";
	$email_message .= "Teléfono: ".clean_string($telephone)."\n";
	$email_message .= "Comentarios: ".clean_string($comments)."\n";
	
	
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>



<!-- place your own success html below -->

<!DOCTYPE HTML>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
	<title>Sanadol</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	
	<link rel='stylesheet' href='css/normalize.css'>
<link rel='stylesheet' href='css/app.css'>
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<!--[if IE]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body class="gracias">
	
		<div class="bgwhite">
			<a href="index.html" target="_self"><img src="img/logo.jpg" alt="" /></a>
		</div>
		
		<div class="contGracias">
			
			<h2>GRACIAS POR CONTACTARNOS</h2>
			<h3>Nos pondremos en contacto con usted en la mayor brevedad posible</h3>
		</div>
	


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
	
	<script src='js/jquery.stellar.min.js'></script>
<script src='js/waypoints.min.js'></script>
<script src='js/jquery.easing.1.3.js'></script>

	<script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src='//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</body>
</html>



<?php
}
die();
?>