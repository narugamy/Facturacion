<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/library/Bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
		<script src="<?=base_url()?>assets/library/Jquery/js/Jquery.min.js" type="text/javascript"></script>
		<script src="<?=base_url()?>assets/library/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?=base_url()?>assets/library/Nicescroll/js/nicescroll.min.js" type="text/javascript"></script>
		<script src="<?=base_url()?>assets/js/script.js" type="text/javascript"></script>
		<title>Bienvenidos al Sistema de venta</title>
	</head>
	<body>
		<div id="wrapper">
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container-bar">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1>
							<a class="navbar-brand title" href="#">Alchemist</a>
						</h1>
					</div>
						<form class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" class="form-control Search" placeholder="Search...">
							</div>
							<button type="submit" class="fa fa-search"></button>
						</form>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-globe"></i>
								<span class="number">5</span>
								</a>
								<ul class="dropdown-menu menu">
									<li>
										<a href="#">
											<div class="user-new">
												<p>Nuevo usuario Registrado</p>
												<span>Hace 40 segundos</span>
											</div>
											<div class="user-new-left">
												<i class="fa fa-user-plus"></i>
											</div>
											<div class="clearfix"></div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="user-new">
												<p>Someone special liked this</p>
												<span>hace 3 minutos</span>
											</div>
											<div class="user-new-left">
												<i class="fa fa-heart"></i>
											</div>
											<div class="clearfix"></div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="user-new">
												<p>John cancelled the event</p>
												<span>hace 4 horas</span>
											</div>
											<div class="user-new-left">
												<i class="fa fa-times"></i>
											</div>
											<div class="clearfix"></div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="user-new">
												<p>The server is status is stable</p>
												<span>ayer a las 08:30am</span>
											</div>
											<div class="user-new-left">
												<i class="fa fa-info"></i>
											</div>
											<div class="clearfix"></div>
										</a>
									</li>
									<li><a href="#">
										<div class="user-new">
										<p>New comments waiting approval</p>
										<span>hace 1 semana</span>
										</div>
										<div class="user-new-left">
										<i class="fa fa-rss"></i>
										</div>
										<div class="clearfix"> </div>
									</a></li>
									<li><a href="#" class="view">View all messages</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
									<span class="name-caret"><?=$this->session->userdata('Nombre')?>
										<i class='caret'></i>
									</span>
									<img src="<?=base_url()?>assets/img/wo.jpg" alt="avatar">
								</a>
								<ul class="dropdown-menu menu_1">
									<li>
										<a href="#"><i class="fa fa-user"></i>Editar Cuenta</a>
									</li>
									<li>
										<a href="#"><i class="fa fa-envelope"></i>Mensajes</a>
									</li>
									<li>
										<a href="#"><i class="fa fa-calendar"></i>Calendario</a>
									</li>
									<li>
										<a href="#"><i class="fa fa-clipboard"></i>Tickes</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="clearfix"></div>
					<div class="navbar-default sidebar">
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu-left">
								<li><a href="<?=base_url()?>paneladmin/products"><i class="fa fa-dashboard nav_icon"></i><span class="nav-label"> Productos</span></a></li>
								<li><a href="<?=base_url()?>paneladmin/facturas"><i class="fa fa-dashboard nav_icon"></i><span class="nav-label"> Facturas</span></a></li>
								<li><a href="<?=base_url()?>paneladmin/boletas"><i class="fa fa-dashboard nav_icon"></i><span class="nav-label"> Boletas</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
			<div class="contenedor_principal">
				<div class="contenido">