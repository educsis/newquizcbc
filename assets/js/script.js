jQuery(document).ready(function () {

	function inicia_conteo(){
		$('.count').countdown({
			date: +(new Date) + (1000 * 120),
	        render: function(data) {
	          $(this.el).text(this.leadingZeros(data.min, 2)+':'+this.leadingZeros(data.sec, 2));
	        },
	        onEnd: function() {
	          termina();
	        }
		});
	}

    $('.botonSel').addClass('flipInY animated');

	$( "body").delegate( ".entrarForm", "submit", function(e) {
		e.preventDefault();
		var obj = $(this);
		var datos = $(this).serialize();
		var r = new Array();
		$.ajax({
            data: datos,
            url: base+"ajax/check",
            type: "POST"
        }).done(function(d){
        	r = d.split('|');
        	if(d[0]==0){
        		$('input').val('');
        		$(obj).addClass('wobble animated');
        		setTimeout(function(){ 
			        $(obj).removeClass('wobble animated');
			    }, 700);
        	}else{
        		$(obj).addClass('flipOutX animated');
        		$('.usuarioLogin').html('<i class="fa fa-user"></i> ' + r[1]);
        	}
        });
	});

	$( "body").delegate( ".jugar", "click", function(e) {
		var usuario = $('.usuarioLogin').text();
		var preload = base + 'assets/img/preloader.gif';
		$('.contenedor').html('<div style="text-align: center; padding-top: 60px;"><img src="'+preload+'" /></div>');
		$.ajax({
            data: {user: usuario},
            url: base+"ajax/iniciarjuego",
            type: "POST"
        }).done(function(d){
        	$('.punteo').show();
			$('.tiempo').show();
        	$('.contenedor').html(d);
        	idusuario = $('.idp').val();
        	inicia_conteo();
        	//alert(idusuario);
        });
	});

	$( "body").delegate( ".rank", "click", function(e) {
		var preload = base + 'assets/img/preloader.gif';
		$('.contenedor').html('<div style="text-align: center; padding-top: 60px;"><img src="'+preload+'" /></div>');
		$('.contenedor').load(base+'ajax/rank');
		$('.contenedor').css('overflow-y', 'scroll');
	});

	$( "body").delegate( ".cerrar", "click", function(e) {
		$('.contenedor').html(objetoHome);
		$('.contenedor').css('overflow-y', 'hidden');
	});

	$( "body").delegate( ".respuestas", "click", function(e) {
		var obj = $(this).parent().parent();
		var objB = $(this);
        var stat = $(this).data('stat');
        var last = $(this).data('last');
        var color = '';
        var punteo = parseInt($('.punteoSuma').text());
        //$('.punteoSuma').html('<i class="fa fa-spinner"></i>');

        if(stat==1){
          	color = 'btn-primary';
          	punteo++;
        }else{
          	color = 'btn-danger';
        }

        $(objB).removeClass('btn-default').addClass(color);
        
        $.ajax({
            data: {idp: idusuario, punteo: punteo},
            url: base+"ajax/calificar",
            type: "POST"
        }).done(function(d){
        	$('.punteoSuma').text(punteo);
        });

		setTimeout(function(){ 
			obj.addClass('zoomOut animated');
		}, 200);

		setTimeout(function(){ 
			$(obj).remove();
			$(obj).next().addClass('fadeIn animated');
			if(last==1){
				termina();
			}
		}, 700);

	});

	function termina(){
		$('.lasPreguntas').remove();
		$('.count').remove();
		$('.tiempo').remove();
		$('.mensajeFinal').text('Gracias por participar, su tiempo se ha agotado');
		$('.mensajeFinal').addclass('tada animated');
	}
});