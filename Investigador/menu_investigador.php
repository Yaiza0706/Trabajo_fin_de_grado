<?php session_start();?>

<html>
	<head>
		<title>Página principal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

	</head>
	<body class="is-preload">
	<!-- Wrapper -->
		<div id="wrapper">
			<!-- Main -->
				<div id="main">
					<div class="inner">
					<?php if ($_SESSION['valido']) { ?>
					<section class="main-page">
						<!-- Header -->
						<header id="header">
									<h2>Bienvenido <?php echo $_SESSION["nombre"]; ?>. Sesión iniciada correctamente.</h2>
						</header>
						<div id="ventana_principal"></div>
					</div>
				</div>
				
				<?php if ($_SESSION['id_tipo_usuario'] == 1) { ?>
				<!-- Sidebar -->
				<div id="sidebar">
					<div class="inner">

						<!-- Menu -->
							<nav id="menu">
								<header class="major">
									<h2>Menu</h2>
								</header>
								<ul>
									<li>
										<span class="opener">Nuevo</span>
										<ul>
											<li><a onclick = "VerProyecto()">Proyecto</a></li>	
											<li><a onclick = "VerGrupo()">Grupo</a></li>
											<li><a onclick = "VerResultado()">Resultado</a></li>
										</ul>
									</li>
									<li>
										<span class="opener">Modificar</span>
										<ul>
											<li><a onclick = "ModificarProyecto()">Proyecto</a></li>	
											<li><a onclick = "ModificarGrupo()">Grupo</a></li>
											<li><a onclick = "ModificarResultado()">Resultado</a></li>
										</ul>
									</li>
									<li><a onclick="ModificarEquipo()"> Modificar datos personales</a></li>
									<li><a onclick="ModificarEstadoUsuario()"> Modificar estado usuario</a></li>
								</ul>
							</nav>
					</div>
				</div>
				<?php }?> 


				<?php if ($_SESSION['id_tipo_usuario'] == 2) { ?>
				<!-- Sidebar -->
				<div id="sidebar">
					<div class="inner">

						<!-- Menu -->
							<nav id="menu">
								<header class="major">
									<h2>Menu</h2>
								</header>
								<ul>
									<li><a href="">CREAR WEB</a>
									<li>
										<span class="opener">Nuevo</span>
										<ul>
											<li><a onclick = "VerProyecto()">Proyecto</a></li>	
											<li><a onclick = "VerGrupo()">Grupo</a></li>
											<li><a onclick = "VerResultado()">Resultado</a></li>
										</ul>
									</li>
									<li>
										<span class="opener">Modificar</span>
										<ul>
											<li><a onclick = "ModificarProyecto()">Proyecto</a></li>	
											<li><a onclick = "ModificarGrupo()">Grupo</a></li>
											<li><a onclick = "ModificarResultado()">Resultado</a></li>
										</ul>
									</li>
									<li><a onclick="ModificarEquipo()"> Modificar datos personales</a></li>
								</ul>
							</nav>
					</div>
				</div>
				<?php }?> 

				<?php if ($_SESSION['id_tipo_usuario'] == 3) { ?>
				<!-- Sidebar -->
				<div id="sidebar">
					<div class="inner">

						<!-- Menu -->
							<nav id="menu">
								<header class="major">
									<h2>Menu</h2>
								</header>
								<ul>
									<li><a href="">CREAR WEB</a>
									<li>
										<span class="opener">Nuevo</span>
										<ul>
											<li><a onclick = "VerProyecto()">Proyecto</a></li>	
											<li><a onclick = "VerGrupo()">Grupo</a></li>
											<li><a onclick = "VerResultado()">Resultado</a></li>
										</ul>
									</li>
									<li>
										<span class="opener">Modificar</span>
										<ul>
											<li><a onclick = "ModificarProyecto()">Proyecto</a></li>	
											<li><a onclick = "ModificarGrupo()">Grupo</a></li>
											<li><a onclick = "ModificarResultado()">Resultado</a></li>
										</ul>
									</li>
									<li><a onclick="ModificarEquipo()"> Modificar datos personales</a></li>
									</ul>
							</nav>
					</div>
				</div>
				<?php }?> 

		</div>
		<?php }?> 

	<!-- Scripts -->
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/browser.min.js"></script>
		<script src="../assets/js/breakpoints.min.js"></script>
		<script src="../assets/js/util.js"></script>
		<script src="../assets/js/main.js"></script>
		<script src="../VerMenus.js"></script>
		<script src="../ComprobarDatos.js"></script>
		<script src="../EditarDatos.js"></script>
		<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

	</body>
</html>