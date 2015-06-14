<?php


?>
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
		<link rel="stylesheet" type="text/css" href="../css/style/common.css" />
                <link rel="stylesheet" type="text/css" href="../css/style/hub.css" />

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
		<script src="//use.edgefonts.net/bentham.js"></script>

		<!----------header de primera plana---------->
		<script src="/Hub_politico_test/js/controllers/search_module.js"></script>
		<script src="/Hub_politico_test/js/controllers/Hub.js"></script>

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

			<div id="header-hub" class="header" >

				<center>
					<!---------div for display the title--------->
					<div id="Title">Hub Político</div><br />
					<!---------lines, merely disign------------->
					<hr id="first-header-line" class="header-line" />

				</center>

			</div>

		</div>
		</center>

		<center>
		<div class="hub-app">

			<div id="menu">

				<button type="button" id="btn_noticias" class="btn menu-button">Noticias</button>
				<button type="button" id="btn_estadisticas" class="btn menu-button">Estadísticas</button>
				<button type="button" id="btn_popularidad" class="btn menu-button">Popularidad</button>
				<button type="button" id="btn_tecnologia" class="btn menu-button">Tecnología</button>

				<button type="button" id="btn_arte_cultura" class="btn menu-button">Arte & Cultura</button>
				<button type="button" id="btn_ciencia" class="btn menu-button">Ciencia</button>
				<button type="button" id="btn_columnistas" class="btn menu-button">Columnistas</button>
				<button type="button" id="btn_cartoons" class="btn menu-button">Cartoons</button>

				<div id="search-box">

					<button type="button" id="search-button">
	  					<span class="glyphicon glyphicon-search" id="search-icon" aria-hidden="true"></span>
					</button>

				</div>

				<input type="text" id="search-field" class="form-control" placeholder="Búsqueda"/>

				<hr id="menu-line" />

			</div>

			<div class="row" id="content_app_hub">

				<div class="col-xs-6 col-lg-3">
					<div id="user_info">
						<div class="row">

							<div class="col-md-3"></div>

							<div class="col-md-6">

								<img src="http://i.imgur.com/N3vPoUb.png" class="img-responsive img-circle" alt="" height="100" >

							</div>

							<div class="col-md-3"></div>

						</div>
						<div class="real_name_label">

							<?php
								if(  isset($_SESSION['real_name']) ){
									print( $_SESSION['real_name'] );
								} else {
									print( '<a href="http://localhost/Hub_politico_test/username">Ramiro Gtz A</a>' );
								}
							?>

						</div>
						<div class="username_label">

							<?php
								if(  isset($_SESSION['username']) ){
									print( $_SESSION['username'] );
								} else {
									print( '<a href="http://localhost/Hub_politico_test/username">gunt.raro</a>' );
								}
							?>

						</div>
					</div>

					<button id="write_post_button" type="button" class="btn" href="http://localhost/Hub_politico_test/Views/writer.php"><i class="fa fa-file-o"></i> Nuevo</button>

					<div class="dropdown" id="select-category">

						<button class="btn btn-default dropdown-toggle" type="button" id="cb_category" data-toggle="dropdown" aria-expanded="true">
							Ordenar
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu" aria-labelledby="cb_category_menu">
							<li role="presentation"><a role="menuitem" id="b_get_popularity" tabindex="-1" >Popular</a></li>
							<li role="presentation"><a role="menuitem" id="b_get_share" tabindex="-1" >Compartido</a></li>
							<li role="presentation"><a role="menuitem" id="b_get_date" tabindex="-1" >Fecha</a></li>
						</ul>

					</div>

					<!----<div class="fa-ul" id="settings_box" >--->

					<div class="list-group">
						<a class="list-group-item" id="b_front_page" href="#"><i class="fa fa-home fa-fw"></i>&nbsp; Primera Plana</a>
						<a class="list-group-item" id="b_columns" href="#"><i class="fa fa-book fa-fw"></i>&nbsp; Columnas</a>
						<a class="list-group-item" id="b_account" href="#"><i class="fa fa-pencil fa-fw"></i>&nbsp; Cuenta</a>
						<a class="list-group-item" id="b_configuration" href="#"><i class="fa fa-cog fa-spin"></i>&nbsp; Configuración</a>
					</div>


					<div class="row" id="ad_box">

						<img src="http://www.acbl.org/images/marketing/ACBL-Square%20Example%20Ad-1.jpg" class="img-responsive" alt=""  >

					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-lg-9">

					<div id="happening">

					</div>
					<hr id="line-middle" class="hub-line" />
					<div id="application_container" class="post-container row">

						<?php

							print( "<div class='col-md-4'>" );
							for( $i = 0; $i < 2; $i++ ){

								print("<div class='post_front_page'>

									<div class='title'>Economía, avanzando?</div>
									<div class='author'>By Ramiro Gutiérrez Alaniz</div>
									<div class='post_content'>

										<p>El Departamento de Comercio de Estados Unidos reportó que el crecimiento que se registró en el por...</p>
									</div>

									<div class='date'>3 de enero 2015::5:15AM</div>

									<div class='post_popularity'>
										<span class='neg_number'>
											-3
										</span>
										<span class='glyphicon glyphicon-chevron-down neg_button' aria-hidden='true'></span>
										<span class='pos_number'>
											+88,999
										</span>
										<span class='glyphicon glyphicon-chevron-up pos_button' aria-hidden='true'></span>
									</div>
									<div class='post_social'>

										<a href='#' ><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span></a>
										<a href='#' ><i class='fa fa-facebook fa-1g'></i></a>
										<a href='#' ><i class='fa fa-twitter fa-1g'></i></a>
										<a href='#' ><i class='fa fa-google-plus fa-1g'></i></a>

									</div>


								</div>");

							}

							print( '</div>' );
						?>
						<?php

							print( "<div class='col-md-4'>" );
							for( $i = 0; $i < 1; $i++ ){

								print("<div class='post_front_page'>

									<div class='title'>Economía, avanzando?</div>
									<div class='author'>By Ramiro Gutiérrez Alaniz</div>
									<div class='post_content'>

										<p>El Departamento de Comercio de Estados Unidos reportó que el crecimiento que se registró en el por...</p>
									</div>

									<div class='date'>3 de enero 2015::5:15AM</div>

									<div class='post_popularity'>
										<span class='neg_number'>
											-3
										</span>
										<span class='glyphicon glyphicon-chevron-down neg_button' aria-hidden='true'></span>
										<span class='pos_number'>
											+88,999
										</span>
										<span class='glyphicon glyphicon-chevron-up pos_button' aria-hidden='true'></span>
									</div>
									<div class='post_social'>

										<a href='#' ><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span></a>
										<a href='#' ><i class='fa fa-facebook fa-1g'></i></a>
										<a href='#' ><i class='fa fa-twitter fa-1g'></i></a>
										<a href='#' ><i class='fa fa-google-plus fa-1g'></i></a>

									</div>


								</div>");

							}
							for( $j = 0; $j <3; $j++ ){

								print( '<div class="post_front_page column_post">

									<div class="column_name">El rincón de la salud</div>
									<div class="title">Porqué la maruchan mata?</div>
									<div class="post_content">

										<p>El Departamento de Comercio de Estados Unidos reportó 2.6 por cien...</p>
									</div>

									<div class="date">3 de enero 2015::5:15AM</div>

									<div class="post_popularity">
										<span class="neg_number">
											-12
										</span>
										<span class="glyphicon glyphicon-chevron-down neg_button" aria-hidden="true"></span>
										<span class="pos_number">
											+1,702
										</span>
										<span class="glyphicon glyphicon-chevron-up pos_button" aria-hidden="true"></span>
									</div>
									<div class="post_social">

										<a href="#" ><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a>
										<a href="#" ><i class="fa fa-facebook fa-1g"></i></a>
										<a href="#" ><i class="fa fa-twitter fa-1g"></i></a>
										<a href="#" ><i class="fa fa-google-plus fa-1g"></i></a>

									</div>


								</div>' );

							}

							print( '</div>' );
						?>
						<?php

							print( "<div class='col-md-4'>" );
							for( $i = 0; $i < 5; $i++ ){

								print("<div class='post_front_page'>

									<div class='title'>Economía, avanzando?</div>
									<div class='author'>By Ramiro Gutiérrez Alaniz</div>
									<div class='post_content'>

										<p>El Departamento de Comercio de Estados Unidos reportó que el crecimiento que se registró en el por...</p>
									</div>

									<div class='date'>3 de enero 2015::5:15AM</div>

									<div class='post_popularity'>
										<span class='neg_number'>
											-3
										</span>
										<span class='glyphicon glyphicon-chevron-down neg_button' aria-hidden='true'></span>
										<span class='pos_number'>
											+88,999
										</span>
										<span class='glyphicon glyphicon-chevron-up pos_button' aria-hidden='true'></span>
									</div>
									<div class='post_social'>

										<a href='#' ><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span></a>
										<a href='#' ><i class='fa fa-facebook fa-1g'></i></a>
										<a href='#' ><i class='fa fa-twitter fa-1g'></i></a>
										<a href='#' ><i class='fa fa-google-plus fa-1g'></i></a>

									</div>


								</div>");

							}

							print( '</div>' );
						?>

					</div>

				</div>

			</div>

		</div>
		</center>

		<div class="hub-footer"></div>

                <!-- Latest compiled and minified JavaScript -->
                <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
                <script src="http://getbootstrap.com/assets/js/docs.min.js"></script>
	</body>

</html>
