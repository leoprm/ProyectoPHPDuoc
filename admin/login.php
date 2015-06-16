<?php
	/*
	|--------------------------------------------------------------------------
	| Login
	|--------------------------------------------------------------------------
	|
	| Esta pagina es especial por que no se basa en los otros layouts, solo
	| importa el archivo de entorno para definicion de constantes
	|
	*/
	require './config/env.php';
?>

<!DOCTYPE html>
<html>
  	<head>
    	<meta charset="UTF-8">
    	<title>Login | Administración</title>
    	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    	<link href="<?= ROOT_URL ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    	<link href="<?= ROOT_URL ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    	<!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
  	</head>
  	<body class="login-page">
    	<div class="login-box">
      		<div class="login-logo">
        		<a href="<?= ROOT_URL ?>"><b>Administración
        		<br></b>Mira en tu Interior</a>
      		</div>
      		<div class="login-box-body">
        		<p class="login-box-msg">Para acceder inicia sesión</p>
        		<form action="dologin.php" method="post">
          			<div class="form-group has-feedback">
            			<input type="email" class="form-control" placeholder="Email" name="email" id="email"/>
            			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          			</div>
          			<div class="form-group has-feedback">
            			<input type="password" class="form-control" placeholder="Password" name="pass" id="pass"/>
            			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
          			</div>
          			<div class="row">
            			<div class="col-xs-4">
              				<button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
            			</div>
          			</div>
        		</form>
      		</div>
    	</div>

    	<script src="<?= ROOT_URL ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    	<script src="<?= ROOT_URL ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  	</body>
</html>