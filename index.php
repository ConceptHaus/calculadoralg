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

		
		<section id="slider" class=" slider-element slider-parallax m-0 p-0 min-vh-100 swiper_wrapper" data-autoplay='3000' data-speed='800' >
			<div class="row m-0 p-0"  >
				<div class="col-lg-4 m-auto center order-2 order-lg-1 home min-vh-45" >
					<div>
						<div class="home-logo">
							<img src="img/logo-lg.svg" class="img-fluid">
						</div>
						<div>
							<h2 class="home-titulo">Aire Acondicionado</h2>
							<div class="home-texto my-4">Encuentra tu <br>equipo ideal</div>
							<div class="home-boton"><button id="empezar" data-href="elige-zona" class="boton btn-block">EMPEZAR</button></div>
						</div>
					</div>
					
				</div>
				<div class="col-lg-8  p-0 m-0 min-vh-55 min-vh-lg-100 order-1 order-lg-2 " >
					<div >

						<div class="swiper-container swiper-parent">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="swiper-slide-bg" style="background-image: url('img/slider-1.jpg');"></div>
								</div>
								<div class="swiper-slide">
									<div class="swiper-slide-bg" style="background-image: url('img/slider-2.jpg');"></div>
								</div>
								<div class="swiper-slide">
									<div class="swiper-slide-bg" style="background-image: url('img/slider-3.jpg');"></div>
								</div>
								
							</div>
							<div class="swiper-pagination"></div>
						</div>

					</div>
				</div>
			</div>
		</section>


		

	</div>
	
	<div id="gotoTop" class="icon-angle-up"></div>
	
	<script src="js/jquery.js"></script>
	<script src="js/plugins.min.js"></script>
	<script src="js/functions.js"></script>
	
	<script>
		
		$("#empezar").click(function() {
			
			$.post("php/app_sesiones.php",{name:'lg', valor: '1', iniciar:'1'},function(data) {
				console.log($("#empezar").data('href'));
				window.location.href = $("#empezar").data('href');
			});
		});

	</script>

</body>

</html>