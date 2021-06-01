 <header class="main-header">
 	<!-- logotipo -->
 	<a href="inicio" class="logo">
 		<!-- logo mini -->
 		<span class="logo-mini">
 			<img src="vistas/img/plantilla/icono-blanco.png" class="img-responsive" style="padding:10px" alt="">
 		</span>
 		<!-- logo normal -->
 		<span class="logo-lg">
 			<img src="vistas/img/plantilla/logo-blanco-lineal.png" class="img-responsive" style="padding:10px 0px" alt="">
 		</span>
 	</a>
 	<!-- barra de navegacion -->
 	<nav class="navbar navbar-static-top" role="navigation">
 		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
 			<span class="sr-only">toggle navigation</span>
 		</a>

 		<!-- perfil de usuario  -->
 		<div class="navbar-custom-menu">
 			<ul class="nav navbar-nav">
 				<li class="dropdown user user-menu">
 					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
 						<?php if ($_SESSION["foto"] != "") {
								echo '<img src="perez/' . $_SESSION["foto"] . '" class="user-image" alt="perdida">';
							} else {

								echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image" alt="">';
							}

							?>
 						<span class="hidden-xs"><?php echo $_SESSION["nombre"] ?></span>
 					</a>
 					<!-- perfiles de usuario  -->
 					<ul class="dropdown-menu">
 						<li class="user-body">
 							<div class="pull-right">
 								<a href="salir" class="btn btn-default btn-flat">salir</a>
 							</div>
 						</li>
 					</ul>
 				</li>
 			</ul>
 		</div>
 	</nav>


 </header>