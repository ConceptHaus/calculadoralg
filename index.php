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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-69014947-31"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-69014947-31');
		</script>
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
	<div id="loadsafari"></div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.min.js"></script>
	<script src="js/functions.js"></script>
	
	<script>
	var isIE = false;
var ua = window.navigator.userAgent; 
var old_ie = ua.indexOf('MSIE ');
var new_ie = ua.indexOf('Trident/');
var new_ed = ua.indexOf('Edg/');

if ((old_ie > -1) || (new_ie > -1) || (new_ed > -1)) {
    isIE = true;
}
	
	if ( isIE ) {
		$("#loadsafari").append('<div class="modal  fade" id="safari" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-xl "><div class="modal-body"><div class="modal-content"><div class="modal-header text-center"></div><div class="modal-body modal-cuerpo" id="ventana-contenido"></div></div></div></div></div>');
				$('.modal-cuerpo').load('aviso.html',function(){
					

				
				  $('#safari').removeClass("fade");
				
				
				$('#safari').modal({show:true});
				
				
				
				 
			});
		}		
		$("#empezar").click(function() {
			
			$.post("php/app_sesiones.php",{name:'lg', valor: '1', iniciar:'1'},function(data) {
				console.log($("#empezar").data('href'));
				window.location.href = $("#empezar").data('href');
			});
		});

	</script>
	
	

</body>

</html>