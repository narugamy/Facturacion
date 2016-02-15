$(document).on('ready',function(){

	$("html").niceScroll({styler:"fb",cursorcolor:"#1ABC9C",cursorwidth: '10',cursorborderradius: '10px',background: '#f3f3f4',spacebarenabled:false,cursorborder: '0',zindex: '10000'});
	$("html").niceScroll({styler:"fb",cursorcolor:"rgba(97, 100, 193, 0.78)",cursorwidth: '10',cursorborderradius: '0',autohidemode: 'false',background: '#F1F1F1',spacebarenabled:false,cursorborder: '0'});
	$("html").getNiceScroll();
	if ($("html").hasClass('scrollbar1-collapsed')){
		$("html").getNiceScroll().hide();
	}

	function classes(){
		if($( window ).width() < 769){
			$("nav.navbar").removeClass('navbar-fixed-top');
			$(".contenedor_principal").css('margin-top','-1.2em');
		}else{
			$("nav.navbar").addClass('navbar-fixed-top');
			$(".contenedor_principal").css('margin-top','3.7em');
		}
	}

	setInterval(classes,1000);
});