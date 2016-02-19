$(document).on('ready',function(){

	formularios('#wrapper','.contenido form#form','image_id','post','json');
	ajax('#wrapper','click','.menu-left li a');
	ajax('#wrapper','click','.contenido .text a');

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

	function formularios(contenedor,disparo,imagen,metodo,tipo){
		$(contenedor).on('submit',disparo,function(event){
			event.preventDefault();
			var web=$(this).attr('action');
			var datos = new FormData();
			if(document.getElementById(imagen)!=null){
				 datos.append(imagen,document.getElementById(imagen).files[0]);}
			var formulario = $(this).serializeArray();
			for(var i=0;i<formulario.length;i++){
				 datos.append(formulario[i].name,formulario[i].value);}
			$.ajax({
				url: web,
				type: metodo,
				data: datos,
				contentType: false,
				processData: false,
				dataType: tipo,
				success: function(dato){
					if(dato.exito){
						$.post(dato.url, {alert: dato.alert,alertc:dato.alertc,stado:1},null,'html')
							.done(function(datos){
								$('.contenido').html(datos);
								formularios('#wrapper .contenido form#form','image_id','post','json');
							})
							.error(function(){
								alert('Error');
							});
					}else{
						validaciones(dato);
					}
				 },
				error:function(error){
					console.log("Error");
				}
				});
		});
	}

});