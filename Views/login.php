
<!DOCTYPE html>
<html lang="es">

	<head>
                <meta charset="utf-8" />
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

                <!-- Optional theme -->
                <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
                <link href="/Hub_politico_test/css/dashboard.css" rel="stylesheet">

                <link rel="stylesheet" href="/Hub_politico_test/font-awesome-4.3.0/css/font-awesome.min.css">
                <link rel="stylesheet" type="text/css" href="../css/style/login.css" />

                <title>THP</title>

                <!---<link class="include" rel="stylesheet" type="text/css" href="css/styles/jquery.jqplot.min.css" />---->
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


		<!------Data Tables------------>
                <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" />
                <script src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

		<link class="include" rel="stylesheet" type="text/css" href="../css/style/jquery.jqplot.min.css" />

		<script src="//use.edgefonts.net/fanwood-text:n4,i4:all.js"></script>
		<script src="//use.edgefonts.net/crimson-text.js"></script>
		<script src="//use.edgefonts.net/josefin-sans.js"></script>
		<script src="//use.edgefonts.net/paytone-one.js"></script>
		<script src="//use.edgefonts.net/abril-fatface.js"></script>
		<script src="//use.edgefonts.net/passion-one.js"></script>
		<script src="//use.edgefonts.net/arvo.js"></script>
		<script src="//use.edgefonts.net/bigshot-one.js"></script>
	</head>

	<body>

		<!-------------Navigation bar------------->
		<nav class="menu_bar">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">¿Quiénes somos?</a></li>
						<li><a href="#">Hub</a></li>
						<li><a href="#">Contacto</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Login</a></li>
						<li><a href="#">Registrate</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<center>
		<div class="header">

			<div id="header-login" class="header" >

				<center>
					<!---------div for display the title--------->
					<div id="Title">Hub Político</div><br />
					<!---------lines, merely disign------------->
					<hr id="first-header-line" class="header-line" />

				</center>

			</div>

		</div>
		<div class="content">

			<div class="row">

				<div class="col-md-4 inputs_box">
					<div id="errors">
						<?php

							session_start();

							if( isset( $_POST['login'] ) ){

								include( '../Controllers/LoginController.php' );

								$login = new LoginModel();

								if( $login->is_logged_in() ){

									header("Location: http://localhost/Hub_politico_test/Views/Hub.php");

								}else{

									$login->show_errors();

								}

							}else if( isset( $_POST['save'] ) ){

								include('../Controllers/RegistrationController.php');

								$register = new RegistrationModel();

								if( $register->process() ){

									print( 'Usuario registrado!!!' );
									header("Location: http://localhost/Hub_politico_test/Views/Hub.php");

								}else{

									$register->show_errors();

								}

							}
							$token = $_SESSION['token'] = md5( uniqid( mt_rand(), true ) );

						?>

					</div>
					<form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">

						<p>
							<label>Username</label>
							<input type="text" id="username" class="form-control" name="username" />
						</p>
						<p>
							<label>Password</label>
							<input type="password" id="passowrd" class="form-control" name="password" />
						</p>

						<input type="hidden" name="token" value='<?=$token;?>' />
						<input type="submit" class="btn btn log-but" name="login" value="Log In"/>


						<div id="social_login_box" class="social_box"></div>

					</form>

					<div id="options_login">

						<label>¿No te has registrado?&nbsp;</label><a href="registration.php">Registrate</a>

						<div id="social_registtration_box" class="social_box"></div>
					</div>

				</div>
				<div class="col-md-8">
					<img src="../css/images/Login.png" class="img-responsive" />
				</div>

			</div>

		</div>
		<div class="footer">
			<hr id="second-header-line" class="header-line" />
		</div>
		</center>

                <!-- Latest compiled and minified JavaScript -->
                <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
                <script src="http://getbootstrap.com/assets/js/docs.min.js"></script>
	</body>

</html>
