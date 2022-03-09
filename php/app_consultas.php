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
				  CURLOPT_URL => "https://seapi.release.sears.com.mx/products/v1/products/".$idSears['id_sears']."",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'GET',
				  CURLOPT_HTTPHEADER => array(
				    'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiIxYmMwMTkxNi02ZmQzLTRhZWQtOGM1MC03ODViYjlmOGQyNzQiLCJuYW1laWQiOiIxOTA2NiIsInVzdWFyaW8iOiJ1c3VhcmlvNi5yYWFAbWFpbGluYXRvci5jb20iLCJub21icmUiOiJVc3VhcmlvIFJBQSA2IiwiVXN1YXJpb0lkIjoiMTkwNjYiLCJjdXJwIjoiIiwicmVhbG1fYWNjZXNzIjoiQURNSU5fREVQRU5ERU5DSUEsUkFBLFJPTVIsUlVBLFNFUlZJRE9SX1BVQkxJQ08sU1lTX0FETUlOLFVTRVIiLCJyb21ySWQiOiIxOTA0NSIsInJvbXJOb21icmUiOiJBcGkgRWNvbm9taWEgUUEiLCJyb21yQ3VycCI6IiIsInJvbXJDb3JyZW8iOiJhcGljbmFydHlzcWFAbWFpbGluYXRvci5jb20iLCJyb21yRGVwZW5kZW5jaWEiOiJTZWNyZXRhcsOtYSBkZSBFY29ub23DrWEiLCJyb21yaWREZXBlbmRlbmNpYSI6IjY1IiwiaWREZXBlbmRlbmNpYSI6IjY1IiwiZGVwZW5kZW5jaWEiOiJTZWNyZXRhcsOtYSBkZSBFY29ub23DrWEiLCJpZFVuaWRhZEFkbWluaXN0cmF0aXZhIjoiMTE3NCIsInVuaWRhZEFkbWluaXN0cmF0aXZhIjoiRGlyZWNjacOzbiBHZW5lcmFsIGRlIE5vcm1hdGl2aWRhZCBNZXJjYW50aWwiLCJlbWFpbCI6InVzdWFyaW82LnJhYUBtYWlsaW5hdG9yLmNvbSIsIm5iZiI6MTY0NTU2NTc3OSwiZXhwIjoxNjQ1NTY5Mzc5LCJpc3MiOiJ3d3cuY2VuYXJ0eXMuZ29iLm14IiwiYXVkIjoid3d3LmNlbmFydHlzLmdvYi5teC9hcGkvQXV0ZW50aWNhY2lvbiJ9.sYpklmvtYvhneBT15mkUT9JTAILtUQuBlmE4u3w5JBs',
				    'Cookie: _abck=62ACF185D538E56E359A3F23A84806AF~-1~YAAQBDAyFzepdGd/AQAAQ8w9cAekdL4vkspsHq0tOBBMEeUZaPRtCXhruggpiTxYc+0ZHRwg7+o6jRRIzkrxNDi0WjAcUVWs+hMzP2AjIZbhP/UD4v9KBMT7NN94aefthVVyJKklQIV5+hJFtUKg6Sz0PcHbBLoxFjGiTkZHjyj+Iz/iPmhIFyuUkJ+iYzS+BYuGspzGGBppEkCwm0Ax4Vuek7XG0ztSzj20FFSeHMptmwFyctIZ8xfIcPV4ciDV6RD8ne356Go56O7MfDBpLoFsi90F/fea191eKf2Sqzl7sU/b65tDn3tVNyjBTbZjXnzonpTOKFwN9b2wDPnhmq3BYLMoinl1f2bRIS5f04xHD7MKcSK31yh4sZxPyfw3iLJ3dbwLJVkQ~-1~-1~-1; bm_sz=FA48730CB2FF9323D08E64C236F89A7C~YAAQBDAyFzmpdGd/AQAAQ8w9cA8Z2iPYd3U6sj7DeCVYZ5RDzDfhs3CXYFPEiISasBVJr1J/0+rQSIRJyQmju1ElPiybgv4Z6px5w5nea+00JAotkQhUh5t504NN0t1IJUEFT9Eeox4dWMQ+7lxBxF5/xbjYG8kKX+JG9hsrSP+Ynu9TcZ785JR8phfjcQAsVYIBdxHvkQBsA5pk5rFaGSGAQRnBmQUx/6u7eNTi1JfmP84JqHOVRxR//TzjR4QXcTIxeROT9TbTm4qCQPgAe6jHvXnfVkXlwSrHskv0QDw7zA/dxQ==~3158339~3355698; ak_bmsc=F35C83CAA85BF6F19BF973E121A96A30~000000000000000000000000000000~YAAQBDAyFzipdGd/AQAAQ8w9cA8Dae+IuZCxYOATul8NGJ0hgh5LdXHr4R8LB7aSnK14C19YKneVHMdVJG7WM76HFLq4nbmyax1Kv91qw09FR7vNK3FORca0PmeywF0mf+tJY8dGU0S7nsZWKlnHzemim7u3uaSRkn4lbjQzoMJGF/stuRmrGk47qbus8cBG+RiI6gm/ySKDcXwGRQlFyGd2gO6MXxgf3xq54vWo8qinvvWrE6LBUwrPnrcxJCx6170MxYrjz+LdFcHO8/4TK+HtTjSTEG5qYj7m8wrhHylzlZ+X5t5Pf0B8CI7xkMrGnPPISpaw9/uplKPSE4iYZEnzh+Sf/WvA0gOQkDDaf0VBFYYMnJZwS6c7XG93tGq3/cZjoEVXS9w=; bm_sv=0E977DF1E7D98ED081E62B3D489D399A~RUN/1OEcHXZeLGrDbj7ub1yHaWAckskNBtlFHkR5N4m7VEIE4PdpP1Sng1ZXFbBRsLMOTEwKHn9mfRWQfBnZu2B0EvLawwR98mccH8c4DVE/tNZzI1kU0BJvI2n//SIt5wtJJ1VrN4v0FOla6Q4grLlafXchai9SqKqCcIm/U5k='
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