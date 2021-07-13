$.fn.jsProductFeature = function (i) {
	var t = $.extend({ pauseOnHover: !0 }, i),
	e = t.points.length,
	n = !1;
	var a = this.parent();
	
	var d = a.next();
	$.each(t.points, function (i, t) {
		var e = '<a href="javascript:void(0)" class="pf-point" style="left:' + t.x + ';  top:' + t.y + '"  top: "-=11px"; >';
		(e += '</a><div class="text-point" style="left:' + (t.tx)+ ';  top:' + t.yt + '" >' + (t.tt)+ '</div>'),
		
		
		a.append(e);
		
	}),
	
	a.find(".pf-point").on("click", function (i) { 
		console.log('hover');
		});
};
