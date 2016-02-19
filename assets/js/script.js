$(document).on('ready',function(){

    $('html').niceScroll({styler:"fb",cursorcolor:"#1ABC9C",cursorwidth: '8',cursorborderradius: '10px',background: '#f3f3f4',spacebarenabled:false,cursorborder: '0',zindex: '10000'});
    $('html').getNiceScroll();
	if ($("html").hasClass('scrollbar1-collapsed')){
		$("html").getNiceScroll().hide();
	}

	function classes(){
		if($( window ).width() < 769){
			$("nav.navbar").removeClass('navbar-fixed-top');
			$(".contenedor_principal").css('margin-top','-1.3em');
		}else{
			$("nav.navbar").addClass('navbar-fixed-top');
			$(".contenedor_principal").css('margin-top','3.7em');
		}
	}

	setInterval(classes,500);

    function ajax(contenedor,evento,disparo){
        $(contenedor).on(evento,disparo,function(event){
            event.preventDefault();
            var web=$(this).attr('href');
            var datos={stado: 1};
            $.post(web, datos,null,'html')
                .done(function(dato){
                    $('.contenido').html(dato);
                })
                .error(function(){
                    alert('Error');
                });
        });
    }

    ajax('#wrapper','click','.menu-left li a');
});