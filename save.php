<?php
	/*
	|--------------------------------------------------------------------------
	| Save
	|--------------------------------------------------------------------------
	|
	| Este archivo se encarga de guardar un nuevo contacto en el sistema y
	| enviar email de confirmacion al admin del sistema y el cliente.
	|
	*/
	require __DIR__.'/./config/env.php';
	require __DIR__.'/./clases/Contacto.php';
	
	if( !empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['comentario']) && !empty($_POST['asunto']) ){
		$email   = $_POST['email'];
		$nombre  = $_POST['nombre'];
		$mensaje = $_POST['comentario'];
		$asunto  = $_POST['asunto'];
		$contacto = new Contacto($email,$nombre,$mensaje,$asunto);
		if($contacto->guardar()){
	    	$_SESSION['success_contact'] = true;
	    	enviaEmail($email,$nombre,$mensaje);
		}
		else{
			$_SESSION['error_tmp'] = "Credenciales de acceso incorrectas";
		}		
	}
	else{
		$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
	}
	header('Location: contacto.php');

	function enviaEmail($email,$nombre,$mensaje){
		require __DIR__.'/./libs/PHPMailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;
		$mail->isSMTP();

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		$mail->Debugoutput = 'html';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;

		$mail->Username = USER_EMAIL;
		$mail->Password = PASSWORD_EMAIL;

		$mail->setFrom(USER_EMAIL, 'Mira en tu Interior');
		$mail->addAddress($email, $nombre);

		$template = file_get_contents(__DIR__.'/./templates/email-contacto.html');
		$template = str_replace('__NOMBRE__', $nombre, $template);
		$template = str_replace('__COMENTARIO__', utf8_decode($mensaje), $template);
		$template = str_replace('__URL__', $_SERVER['SERVER_NAME'].ROOT_URL.'productos.php', $template);

		$mail->Subject = utf8_decode('Confirmación de Contacto');
		$mail->msgHTML($template);

		return $mail->send();
	}
?>
