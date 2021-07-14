<?php
if (!isset($_SESSION)) {
	session_start();
}

include("php/app_consultas.php");
?>
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

	<body class="stretched" style="background-color: #f4f5f5">
		

		<div id="wrapper" class="clearfix" style="background-color: #f4f5f5; ">
			<header id="header" class="header-size-sm " data-sticky-shrink="false" data-mobile-sticky="true">
				<div id="header-wrap">
					<div class="container">
						<div class="header-row">

							<div id="logo" >
								<a href="inicio" class="standard-logo" data-dark-logo="img/lg-logo.svg"><img src="img/lg-logo.svg" alt="LG México" title="1"></a>
								<a href="inicio" class="retina-logo" data-dark-logo="img/lg-logo-mobile.svg"><img src="img/lg-logo-mobile.svg" alt="LG México" title="2"></a>
							</div>

							
						</div>

					</div>

				</div>
				<div class="header-wrap-clone"></div>

			</header>
			
			

			<section id="slider" class="slider-element swiper_wrapper h-auto" data-grab="false" data-loop="false" >
				<div class="slider-inner  ">

					<div class="swiper-container swiper-parent ">
						<div class="swiper-wrapper border-danger my-5 my-md-5">
							<?php echo ($_SESSION['seleccion']); ?>
							
							<?php echo muestra_producto($_SESSION['seleccion']); ?>
							
							
							<div class="swiper-slide my-auto ">
								<div class="container ">
									<div class="slider-caption slider-caption-center " >
										<img src="img/logo-lg.svg" height="80" class="my-4">
										<h3 class="py-4">Conoce más en:</h3>
										<div><img src="img/website.svg" ></div>
										<div class="botonad pb-3 py-4"><button class="boton px-5 adquierelo" data-adq="https://www.lg.com/mx/aire-acondicionado">DA CLICK AQUÍ</button></div>
										<h5 class="pt-3">LG México en:</h5>
										<div>
											<a href="https://www.facebook.com/lgelectronicsmexico" target="_blank"><img src="img/facebook.svg" class="mx-3"></a>
											<a href="https://www.instagram.com/lgmexico" target="_blank"><img src="img/instagram.svg" class="mx-3"></a>
											<a href="https://www.youtube.com/user/LGEMexico" target="_blank"><img src="img/youtube.svg" class="mx-3"></a>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="slider-arrow-left"><i class="icon-angle-left textos"></i> <span class="textos">Regresar</span></div>
						<div class="slider-arrow-right"><span class="textos">Ver más</span> <i class="icon-angle-right"></i></div>
					</div>

				</div>
			</section>

			<div class="modal fade " id="ventana" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog  modal-xl ">
					<div class="modal-body">
						<div class="modal-content">
							<div class="modal-header text-center">
								<span data-dismiss="modal" aria-hidden="true"><i class="icon-times-circle1"></i> CERRAR</span>
							</div>
							<div class="modal-body modal-cuerpo" id="ventana-contenido">
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<footer id="footer" >
				<div id="copyrights">
					<div class="container">
						<div class="row col-mb-30">
							<div class="col-md-4 text-center text-md-left my-auto order-2 order-lg-1">
								Conoce todos nuestros productos en:<br>
								<div class="copyright-links">
									<a href="https://www.lg.com/mx" target="_blank">https://www.lg.com/mx</a>
								</div>
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
		
		
		<div id="gotoTop" class="icon-angle-up"></div>
		<div id="loadmodal"></div>
		
		<script src="js/jquery.js"> </script>
		<script src="js/plugins.min.js"> </script>
		<script src="js/functions.js"> </script>
		<script src="js/js-product-feature.js"> </script>
		
		<script>
			
			
			
			$(function () {

		    	<?php echo mapea_producto_pc($_SESSION['seleccion']); ?>
		    	<?php echo mapea_producto_mobile($_SESSION['seleccion']); ?>

			});
			
			$('#ventana').on('hidden.bs.modal', function () {
			    $("#ventana iframe").attr("src", $("#ventana iframe").attr("src"));
			});
			
			
			
			
		</script>
	</body>

</html>