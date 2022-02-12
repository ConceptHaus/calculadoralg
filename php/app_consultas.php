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

				curl_setopt_array($curl, array(
				  CURLOPT_URL => 'https://seapi.sears.com.mx/app/v1/product/202434',
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'GET',
				  CURLOPT_HTTPHEADER => array(
				    'Cookie: _abck=62ACF185D538E56E359A3F23A84806AF~-1~YAAQHazBF49Ngdh+AQAAqMmG6wc8PCbU8rVw8qc5S7ewUnXk7HM+UV5PuELiQ9lb9TYfzb8icHo55mv2ZhW9ivD0Zyn7We1J3MQQwFloeMtZTXRNW6UO3WTD3schGxRosJZsujusEQgiB8KbwSFtFpPIaBBXRMHYs+TYL02K7BMv8Ao2na4ofkbcGKs1tvVHqCLen0TdaUKOQikGmIDjzQKdKqO/IBIYSrojMC8nRW4zOJw4NKPLn6LrnW9wlws8MaOizu+1xhMSBoG/C5UeAsezutg7CYfHV3MXOvjfORkHf7G+34lgBqqx/Q+Z5OBzXOD0adG+ds2k8zyJmPabUFmuXOTW0BrsWBGtdkAQJA==~-1~-1~-1; ak_bmsc=97276883453A583F01430A78AA35E753~000000000000000000000000000000~YAAQHazBFzgjgdh+AQAA1JRz6w6D7UZn61JXnN+mZDctZo6we847KoEu2LcdTHHylKTOBF5sCtdEDfawd5q7asivTAWuxHQSXwaOt9Jg8RpvQI56XQDCm1YzWSwTu5Dsw/sVVPMPFjjcTvjoWY7/f4N86xW1sD/HqXYKT+PCYIk+5FtMZWeGcKR53PcLC5c0YcdvKIgISLLW9UoSYUzz9mLNTp4bRKvUBk8YrJ6wgv+4iWN+Iof6ArL1UPIU7BTCvpjDUikoteH3VwpEGHUdU4IsB7wisJAXjWDV0UTwDalVbbh5yu+hbmlZEj9AGAZSgNBfqVdbQc0rFEHwGpwCEG95pXUnB3uMLr2Y0fy4cqmV6W9LPI7wOt4jc0eb1gKm; bm_sv=AC811F284D151958F075633F2D0A7D2C~k42Rm6KERoMWXo816pYaqLP+tUU8jgTNqTptYlRwP93zJIUVbLscty0OHyKIwrDxcv4ilt8EOkTAWTo80Rel+gSvoecvOVBtGskbGK/0Zqwxnuu1tvusHrNliXtPZ0eq0l2XekWM29pt9+gW1XiZZo0TWi01hF5HBpR24gSd3dE=; bm_sz=F2CD55BA87E023366414B82FB6D6C3A6~YAAQHazBF6kAgNh+AQAAzcr86g7n+KHDaalN+Umf7NMOg4iWO8FeNNrEMvDGgyf1oL8jnM0auToVPtqazfcm54HmOtfStzVIfR1+fof2up3wWPCmICak5elQdefks06wq/bMWPTgLWwFlW6+/cYJ2E5MakjBIpxeiV3AuvUn1vUdrxj9diZrssJPKBPPK3H2/NR4gOP56iEgU6aCfFJzBS/IJD4sXtqwafycePzS50fTdpxiEoRbZRUsTk/Z1GCz7CXUHW7AiwUF3lumyfd3+SfviQ0AMYPXY3fNDub5lOYO3DvxIA==~3622196~3291202'
				  ),
				));
				$response = curl_exec($curl);
				curl_close($curl);



				$respuesta =json_decode($response);
				
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