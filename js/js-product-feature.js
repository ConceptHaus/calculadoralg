$.fn.jsProductFeature = function (i) {
	var t = $.extend({ pauseOnHover: !0 }, i),
	e = t.points.length,
	n = !1;
	var a = this.parent();
	
	var d = a.next();
	$.each(t.points, function (i, t) {
		var e = '<a  class="pf-point" style="left:' + t.x + ';  top:' + t.y + '" data-ventana="'+t.ref+'" data-titulo="'+t.titulo+'"  data-video="'+t.video+'">';
		(e += '</a><div class="text-point" data-ventana="'+t.ref+'" data-titulo="'+t.titulo+'"  data-video="'+t.video+'" style="left:' + (t.tx)+ ';  top:' + t.yt + '" >' + (t.tt)+ '</div>'),
		
		
		a.append(e);
		
	}),
	
	a.find(".pf-point").on("click", function (i) { 
		
		var ventana=$(this).data('ventana');
		var titulo=$(this).data('titulo');
		var video=$(this).data('video');
		console.log(titulo);
		$('#ventana-contenido').empty();
		if(ventana!='')
		{	
			
			$('#ventana-contenido').load(ventana,function(){
				$("#titulov").append(titulo);
				$('#videolg').attr('src',video);
				$('#videolgmd').attr('src',video);
				$('#ventana').modal({show:true});
			});
		}
		
	});
	
	$(".text-point").on("click", function (i) { 
		
		var ventana=$(this).data('ventana');
		var titulo=$(this).data('titulo');
		var video=$(this).data('video');
		console.log(titulo);
		$('#ventana-contenido').empty();
		if(ventana!='')
		{	
			
			$('#ventana-contenido').load(ventana,function(){
				$("#titulov").append(titulo);
				$('#videolg').attr('src',video);
				$('#videolgmd').attr('src',video);
				$('#ventana').modal({show:true});
			});
		}
		
	});
};
