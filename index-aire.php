<!DOCTYPE html>
<html dir="ltr" lang="en-US">
	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
		<link rel="stylesheet" href="style.css" type="text/css" />
		<link rel="stylesheet" href="css/swiper.css" type="text/css" />
		<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
		<link rel="stylesheet" href="css/fonts/style.css" type="text/css" />
		<link rel="stylesheet" href="css/animate.css" type="text/css" />
		<link rel="icon" type="image/png" href="img/favicon.png" >

		<title>Aire Acondicionado: Encuentra tu equipo ideal | LG México </title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />

	</head>

	<body class="stretched">
		

		<div id="wrapper" class="clearfix">
			<header id="header" class="header-size-sm " data-sticky-shrink="false" data-mobile-sticky="true">
				<div id="header-wrap">
					<div class="container">
						<div class="header-row">

							<div id="logo" >
								<a href="inicio" class="standard-logo" data-dark-logo="img/lg-logo.svg"><img src="img/lg-logo.svg" alt="LG México" title="1"></a>
								<a href="inicio" class="retina-logo" data-dark-logo="img/lg-logo-mobile.svg"><img src="img/lg-logo-mobile.svg" alt="LG México" title="2"></a>
							</div>

							<div id="primary-menu-trigger">
								<svg class="svg-trigger" viewBox="0 0 100 100">
									<path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
									<path d="m 30,50 h 40"></path>
									<path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
							</div>

							<nav class="primary-menu">
								<ul class="menu-container " >
									<li class="menu-item">
										<a class="menu-link" href="elige-zona"><div>Elige tu zona</div></a>
									</li>
									<li class="menu-item current">
										<a class="menu-link" href="elige-aire"><div>Tipo de aire</div></a>
									</li>
									<li class="menu-item">
										<a class="menu-link" href="javascript:void(0)"><div>Tamaño de habitación</div></a>
									</li>
									<li class="menu-item ">
										<a class="menu-link" href="javascript:void(0)"><div>Aire acondicionado LG ideal</div></a>
									</li>
								</ul>

							</nav>


						</div>

					</div>

				</div>
				<div class="header-wrap-clone"></div>

			</header>

			<section id="content" >
				<div class="">

					<div class="container clearfix eligeaire">
						<div class="row justify-content-center mx-lg-5 ">
							<div class="col-md-6 px-5 " >
								<div class="titulo" id="titulo">Estás en <span id="zs"></span></div>
							</div>
						</div>
						<div class="row justify-content-center p-5">
							<div class="col-md-12">
								<div class="center">
									<h2>Elige el tipo de aire acondicionado</h2>
								</div>
							</div>
							
							<div class="col-md-4 py-4 px-lg-5 ">
								<div class="card aires" id="a1">
									<div class="card-body">
										<div class="card-img p-4 hovereffect">
											<img id="aire11" data-aire="1" data-href="elige-habitacion" src="img/aire-1.png" alt="Aire Frio" class="img-fluid" id="im1">
										</div>
									</div>
								</div>
								<div class="div-boton"><button id="aire1" data-aire="1" data-href="elige-habitacion" class="boton btn-block">AIRE FRÍO</button></div>
							</div>
							<div class="col-md-1">&nbsp;</div>
							<div class="col-md-4 py-4 px-lg-5 " >
								<div class="card aires" id="a2">
									<div class="card-body">
										<div class="card-img p-4 hovereffect">
											<img id="aire22" data-aire="2" data-href="elige-habitacion" src="img/aire-2.png"  alt="Aire Frio / Caliente" class="img-fluid" id="im2">
										</div>
									</div>
								</div>
								<div class="div-boton"><button id="aire2" data-aire="2" data-href="elige-habitacion" class="boton btn-block">AIRE FRÍO / CALIENTE</button></div>
							</div>
						</div>
					</div>
					

				</div>
			</section>


			<footer id="footer" >
				<div id="copyrights">
					<div class="container">
						<div class="row col-mb-30">
							<div class="col-md-4 text-center text-md-left my-auto order-2 order-lg-1">
								Conoce todos nuestros productos en:<br>
								<div class="copyright-links">
									<a href="https://www.lg.com/mx" target="_blank">https://www.lg.com/mx</a></div>
							</div>
							<div class="col-md-4 text-center my-auto order-1 order-lg-2">
								<img src="img/logo-lg-blanco.svg" class="img-fluid" align="LG México">
							</div>
							<div class="col-md-4 text-center text-md-right my-auto order-3">
								<div class="copyright-links"><a href="#" class="openBtnEs ">Aviso de privacidad</a></div>
							</div>
						</div>
					</div>
				</div>
			</footer>

		</div>
		<div id="loadmodal"></div>
		
	    <div id="gotoTop" class="icon-angle-up"></div>
		
		<script src="js/jquery.js"> </script>
		<script src="js/plugins.min.js"> </script>
		<script src="js/functions.js"> </script>
		
	    <script>

			$( document ).ready(function() {
				
				consultar_aire();
				
			});

		</script>

	</body>

</html>