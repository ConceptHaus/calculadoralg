<?php
	if (!isset($_SESSION)) {
		session_start();
	}

	include_once("app_conexion.php");
	
	
	function consulta_zonas($id_zona,$valor)
	{
		$conexion = conectarse();
		$historia='';
		
		$sqlX="SELECT ".$valor." as valor FROM cat_zonas c where baja='0' and id_zona='".$id_zona."';";
		$resultX = mysqli_query($conexion,$sqlX);
		while ($rowX = mysqli_fetch_assoc($resultX)) {
			return $rowX['valor'];
		}
		mysqli_close($conexion);
	}
	
	function consulta_aire($id_aire)
	{
		$conexion = conectarse();
		$historia='';

		$sqlX="SELECT aire as valor FROM cat_aires c where baja='0' and id_aire='".$id_aire."';";
		$resultX = mysqli_query($conexion,$sqlX);
		while ($rowX = mysqli_fetch_assoc($resultX)) {
			return $rowX['valor'];
		}
		mysqli_close($conexion);
	}
	
	function consulta_habitaciones($id_zona, $id_aire)
	{
		$conexion = conectarse();
		$habitaciones='';

		$sqlX="SELECT p.id_hab, h.habitacion FROM productos_tipo_aire p, cat_habitaciones h where id_aire='".$id_aire."' and id_zona='".$id_zona."' and p.id_hab=h.id_hab group by p.id_hab;";
		$resultX = mysqli_query($conexion,$sqlX);
		while ($rowX = mysqli_fetch_assoc($resultX)) {
			$habitaciones.='<div class="col-md-3 col-5 ">
								<div class="div-boton">
									<button id="h-'.$rowX['id_hab'].'" data-habitacion="'.$rowX['habitacion'].'" data-idh="'.$rowX['id_hab'].'" data-href="elige-opciones" class="boton btn-block">'.$rowX['habitacion'].' m<sup>2</sup></button>
								</div>
							</div>';
		}
		return $habitaciones;
		mysqli_close($conexion);
	}
	
	function consulta_opciones($id_zona, $id_aire, $id_hab)
	{
		$conexion = conectarse();
		$opciones='';
		$sqlX="SELECT p.id_prod, modelo, voltaje, imagen_desc, titulo,imagen,thinq, dualinverter, tuv, plasmaster, g10, g5 
		FROM productos p, productos_tipo_aire pt
		WHERE pt.id_prod=p.id_prod and id_zona='".$id_zona."' and id_aire='".$id_aire."' and id_hab='".$id_hab."' 
		order by RAND();";
		$resultX = mysqli_query($conexion,$sqlX);
		while ($rowX = mysqli_fetch_assoc($resultX)) {
			$sql = "SELECT id_prod,id_sears FROM productos_sears WHERE id_prod='".$rowX['id_prod']."';";
			$result = mysqli_query($conexion,$sql);
			$idSears = $result->fetch_assoc();	
			if (isset($idSears['id_sears'])) { 
				/*$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "https://seapi.sears.com.mx/app/v1/product/".$idSears['id_sears'].""); 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
				curl_setopt($ch, CURLOPT_HEADER, 0); 
				$data = curl_exec($ch); 
				if (curl_errno($ch)) {
			        echo 'Error:' . curl_error($ch);
			    }*/


			    $curl = curl_init();

				curl_setopt_array($curl, [
				  CURLOPT_URL => "https://seapi.sears.com.mx/app/v1/product/".$idSears['id_sears']."",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_POSTFIELDS => "",
				  CURLOPT_COOKIE => "_abck=E110844D3DB4ECB2452D2E7770A27BF3~-1~YAAQtAB8aJTCVrh%2BAQAAP75z6wclpHK2H3bhGIfzfQ%2FhtFwohOqUNU5YRxqTXF6GOXoJ6EE9PR3y1Djktsyne9udHZAXVm2%2Frh9Pqb5zNgUqUK9u%2B5s51fedN%2FZrAxBpEGAS5xBBht4cG8b3vEaRPGf746Iv3cJIzSsa3EReFTmoTiejVIDOBYhTOuWECCNLrHvJ8LtPv9CoVcxFEvzu2ysjKg8RcyL4CKfHU%2Burp%2FW4XK9aDSlfMTkYMJF%2BHISFaZoe3EkNsxN9MtdLJTo%2BDdpe5eUIXx2z0hambT%2FyaI47DzIjfMtrS9DsRDlo9TF7HMnYzdfktI5q8ND4o55XRo5A7NddAtNKLIotmL1U9bbbY5DJsvuk9SbJEg%3D%3D~-1~-1~-1; ak_bmsc=AE8C2AAC3E5E9D0A97872B53000944B1~000000000000000000000000000000~YAAQtAB8aJXCVrh%2BAQAAP75z6w7acfgQ0%2BaTCHWYvbFhRZnSVfJOe7Dx9LGw9megp9ediTo%2FASTEaCEwqseCBXlWHJ4ifniD6MmUWKX6qu3ZUxCiWIrrYJ3ZO41KyJS2Ug%2FlAghQ5oOsWyVbubDdg%2FvqWqiAK3cubUXxTZn1%2FbBp5A%2Fa85CEpqw7OkqlVUiS0tinTiQbh9k9st7dVb%2Fk4KtgHdKVBoAfplFyE80%2FzdOoyY9r%2FtEW8iRQ6Wb3sweDx3vy7PMsF%2FyQjmQ%2F43gpbazyx5LYpvXpinQw947DR94A%2B83o8JaPvyPniscRdtKkwwWcGW66qUFMC1kp1M08%2F1hmCZWmMfajJMTK6FW1wgiv2tfdI4XDw8ELU6K0pRh18%2FWQuKuVqpgBIpVI9A%3D%3D; bm_sz=6CD1284FCDE784C6E2C19D1227F7F7C5~YAAQtAB8aJbCVrh%2BAQAAP75z6w4E2ueFZSuKfbABWta8nkKE7kxMGaS4pFFZqfsIa51ctLzJa8kEsJusufUt9DwYhFlOI3m4gh8gdp79ALPP1RbhnO0UxKwinnfbx5mN2uFNbI1lzS9bmoEnOn7eg0iNh2hkfinQTOoRFwG7IDQxUcpKDvGZIkcr%2BmiT1KLBTuytpommR77Px1lzzq4Unu8ESKMkUEns1jSBDYXN9VGbaWLJq5ahhPIroHqbpfRPtH4Adl05xQJJrBmtHLrua3l6sZd1pPJA90svnVxSfeUxTJi5jA%3D%3D~3354676~3228226",
				]);

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  echo $response;
				}



				$respuesta =json_decode($data);
				
				if ($idSears['id_sears'] != 0) {
					
					if($respuesta->data->stock>0){	
						$opciones.='<div class="col-md-6 center opciones pb-5 px-lg-6 ">';
							if ($rowX['imagen_desc']!='')
								$opciones.='<div><img src="img/'.$rowX['imagen_desc'].'" class="img-fluid px-lg-6 px-4" alt="'.$rowX['titulo'].'"></div>';
							$opciones.='<div><img src="img/aire/'.$rowX['imagen'].'.png" alt="'.$rowX['modelo'].'" class="img-fluid px-lg-5 px-4"></div>
							<div>';
							
							if ($rowX['thinq']=='Si')
								$opciones.='<img src="img/LG ThinQ.svg" alt="LG ThinQ" height="25" class="px-2">';
							if ($rowX['dualinverter']=='Si')
								$opciones.='<img src="img/dualinv.svg" alt="Dual Inverter" height="25" class="px-2">';
							if ($rowX['tuv']=='Si')
								$opciones.='<img src="img/tuv.svg" alt="TUV Rheinland" height="25" class="px-2">';
							if ($rowX['g10']=='Si')
								$opciones.='<img src="img/10year.svg" alt="10 años de garantía" height="25" class="px-2">';
							if ($rowX['g5']=='Si')
								$opciones.='<img src="img/5years.svg" alt="5 años de garantía" height="25" class="px-2">';
							
							$opciones.='</div><div class="texto-rojo mt-3 mb-0 p-0 ">'.$rowX['modelo'].'</div>
										<div class=" pt-0 mt-0">Con un voltaje '.$rowX['voltaje'].'</div>
										<div><button id="p-'.(int)$rowX['id_prod'].'" data-id="'.(int)$rowX['id_prod'].'" data-href="aire-acondicionado" data-model="'.$rowX['modelo'].'" class="boton px-lg-5 px-3" >MÁS INFORMACIÓN</button></div>
								</div>';
					}
				}
				curl_close($ch);
			}
		}
		return $opciones;
		mysqli_close($conexion);
	}
	
	
	function consulta_producto($id_prod,$valor)	
	{
		$conexion = conectarse();
		$historia='';
		$sqlX="SELECT ".$valor." as valor FROM productos c where baja='0' and id_prod='".$id_prod."';";
		$resultX = mysqli_query($conexion,$sqlX);
		while ($rowX = mysqli_fetch_assoc($resultX)) {
			return $rowX['valor'];
		}
		mysqli_close($conexion);
	}
	
	
	function muestra_producto($id_prod)
	{

		$conexion = conectarse();
		$opciones='';

		$sqlX="SELECT p.id_prod, p.id_tipo, modelo, imagen, ANY_VALUE(c.id_rad), ANY_VALUE(video), ANY_VALUE(x), ANY_VALUE(y), ANY_VALUE(tx), ANY_VALUE(ty), ANY_VALUE(xm), ANY_VALUE(ym), ANY_VALUE(txm), ANY_VALUE(tym), ANY_VALUE(caracteristica), ANY_VALUE(texto), ANY_VALUE(link), ventana, url, descr FROM productos p, cat_tipos_radiografia c, cat_radiografia r, cat_tipos t where p.id_tipo=c.id_tipo and p.id_prod='".$id_prod."' and c.id_rad=r.id_rad  and p.id_tipo=t.id_tipo group by ventana;";
		$resultX = mysqli_query($conexion,$sqlX);
		while ($rowX = mysqli_fetch_assoc($resultX)) {
			if($rowX['ventana']==1) $vidcar='el video'; else $vidcar='la característica';
			$opciones.='<div class="swiper-slide ">
								<div class="container ">
									<div class="slider-caption slider-caption-center " >
										
										<h2>'.$rowX['modelo'].'</h2>
										<div class="py-3 texto ">'.$rowX['descr'].'</div>
										<div class="small texto "><span>*</span>Da click en cada punto para ver '.$vidcar.' correspondiente</div>
										<p class="align-content-center  m-0" >
											<div class="pf-container ">
												<div class="pf-card ">
													<div class="pf-card-inner portrait ">
														<img src="img/aire/'.$rowX['modelo'].'-'.$rowX['ventana'].'.png" class="pf-product-image  w-100 h-auto '.$rowX['modelo'].'-'.$rowX['ventana'].' "/>
													</div>
													<div class="pf-card-inner landscape ">
														<img src="img/aire/'.$rowX['modelo'].'-'.$rowX['ventana'].'m.png" class="pf-product-image  w-100 h-auto  '.$rowX['modelo'].'-'.$rowX['ventana'].'m"/>
													</div>
												</div>
											</div>
										</p>
										<div class="botonad pb-3"><button id="ad-'.$rowX['ventana'].'" class="boton btn-block adquierelo" data-adq="'.$rowX['url'].'">¡ADQUIÉRELO AQUÍ!</button></div>
									</div>
								</div>
							</div>';
		}
		#echo mysqli_errno($conexion) . ": " . mysqli_error($conexion) . "\n";
		return $opciones;
		mysqli_close($conexion);
	}
	
	function mapea_producto_pc($id_prod)
	{
		$conexion = conectarse();
		$opciones='';

		$sqlX="SELECT ventana, modelo, p.id_prod
FROM productos p, cat_tipos_radiografia c, cat_radiografia r
where p.id_tipo=c.id_tipo and p.id_prod='".$id_prod."' and c.id_rad=r.id_rad group by ventana;";
		$resultX = mysqli_query($conexion,$sqlX);
		while ($rowX = mysqli_fetch_assoc($resultX)) {
			
			$opciones.='$(".pf-product-image.'.$rowX['modelo'].'-'.$rowX['ventana'].'").jsProductFeature({
		        pauseOnHover:true,
		        points: [';
		    
		    $sqlY="SELECT p.id_prod, p.id_tipo, modelo, imagen, c.id_rad, video, x, y, tx, ty, xm, ym, txm, tym, caracteristica, texto, link, ventana, url
FROM productos p, cat_tipos_radiografia c, cat_radiografia r
where p.id_tipo=c.id_tipo and  ventana='".$rowX['ventana']."' and p.id_prod='".$rowX['id_prod']."' and c.id_rad=r.id_rad;";
			$resultY = mysqli_query($conexion,$sqlY);
		    while ($rowY = mysqli_fetch_assoc($resultY)) {
				$opciones.='{titulo:"'.$rowY['caracteristica'].'",  x: "'.$rowY['x'].'%", y: "'.$rowY['y'].'%",	tx:"'.$rowY['tx'].'%",	yt:"'.$rowY['ty'].'%",	tt:"'.$rowY['texto'].'",  ref:"'.$rowY['link'].'", video:"'.$rowY['video'].'"},';
			}
		    $opciones.=']
		    });';
		}
		return $opciones;
		mysqli_close($conexion);
	}
	
	function mapea_producto_mobile($id_prod)
	{
		$conexion = conectarse();
		$opciones='';

		$sqlX="SELECT ventana, modelo, p.id_prod
FROM productos p, cat_tipos_radiografia c, cat_radiografia r
where p.id_tipo=c.id_tipo and p.id_prod='".$id_prod."' and c.id_rad=r.id_rad group by ventana;";
		$resultX = mysqli_query($conexion,$sqlX);
		while ($rowX = mysqli_fetch_assoc($resultX)) {
			
			$opciones.='$(".pf-product-image.'.$rowX['modelo'].'-'.$rowX['ventana'].'m").jsProductFeature({
		        pauseOnHover:true,
		        points: [';
		    
		    $sqlY="SELECT p.id_prod, p.id_tipo, modelo, imagen, c.id_rad, video, x, y, tx, ty, xm, ym, txm, tym, caracteristica, texto_m, link, ventana, url
FROM productos p, cat_tipos_radiografia c, cat_radiografia r
where p.id_tipo=c.id_tipo and  ventana='".$rowX['ventana']."' and p.id_prod='".$rowX['id_prod']."' and c.id_rad=r.id_rad;";
			$resultY = mysqli_query($conexion,$sqlY);
		    while ($rowY = mysqli_fetch_assoc($resultY)) {
				$opciones.='{titulo:"'.$rowY['caracteristica'].'",  x: "'.$rowY['xm'].'%", y: "'.$rowY['ym'].'%",	tx:"'.$rowY['txm'].'%",	yt:"'.$rowY['tym'].'%",	tt:"'.$rowY['texto_m'].'",  ref:"'.$rowY['link'].'", video:"'.$rowY['video'].'"},';
			}
		    $opciones.=']
		    });';
		}
		return $opciones;
		mysqli_close($conexion);
	}

?>