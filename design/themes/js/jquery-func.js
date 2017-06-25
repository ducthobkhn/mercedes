jQuery(document).ready(function($) {
	/*****************************  $Animate Anchors  *****************************/
	$('a.anchor ').click(function() {
		
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

			var $target = $(this.hash);

			$target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');

			if ($target.length) {

				var targetOffset = $target.offset().top;

				$('html,body').animate({
					scrollTop : targetOffset
				}, 1000);

				return false;

			}

		}

	});
	/*********************  $Animate Itemas on Start  **********************/
	$('.animated').appear(function() {
		var elem = $(this);
		var animation = elem.data('animation');
		if ( !elem.hasClass('visible') ) {
			var animationDelay = elem.data('animation-delay');
			
			if ( animationDelay ) {
				setTimeout(function(){
					elem.addClass( animation + " visible" );
				}, animationDelay);

			} else {
				elem.addClass( animation + " visible" );

			}
		}
	});
	/*****************************  $Fix menu on Scroll  *****************************/
	
	//alert (ScrollTop);
	$(window).scroll(function() {

		var headerBottom = 0;

		var ScrollTop = $(window).scrollTop();
		
		//alert (ScrollTop);
		//console.log(ScrollTop);
		
		if (ScrollTop > headerBottom) {
			$("header").addClass("fixed");
		}
		if (ScrollTop == headerBottom) {
			$("header").removeClass("fixed");
		}
	});
	/*--------------------------------------------------------------------------- Tooltips ----------------------------*/
	$(".social a").tooltip({
            placement: "top"
        });
	/*************************  $Background Video  *************************/
	$('.bgvideo').bgYtVideo();

	/*****************************  $Form Forms  *****************************/
	$("#newsletter, #contact, #suscribe-form, .price").submit(function() {
		var elem = $(this);
		var urlTarget = $(this).attr("action");
		$.ajax({
			type : "POST",
			url : urlTarget,
			dataType : "html",
			data : $(this).serialize(),
			beforeSend : function() {
				elem.prepend("<div class='alert alert-info'>" + "<a class='close' data-dismiss='alert'>×</a>" + "Loading" + "</div>");
				//elem.find(".loading").show();
			},
			success : function(response) {
				elem.prepend(response);
				elem.find(".response").html(response);
				elem.find(".alert-info").hide();
				//elem.find(".alert-danger").hide();
				elem.find("input[type='text'],input[type='email'],textarea").val("");
			}
		});
		return false;
	});

	/*****************************  $Parallax  *****************************/
	$('.parallax').each(function(){ 
		var $obj = $(this);
		$(window).scroll(function() { 
			if($(document).width() > 500) {
				var yPos = ( $obj.offset().top - $(window).scrollTop() ) / $obj.data('speed');
				var bgpos = '50% '+ yPos + 'px';
				$obj.css('background-position', bgpos );
			} else{
				$obj.css('background-position', '50% 0px' );
			}
		});
	});
	/*****************************  $GMaps  ********************************/
	var map;
	if ($('#map').length) {
		map = new GMaps({ 
			div: '#map', 
			lat: 48.858093, 
			lng: 2.294694
		});
		map.addMarker({
			lat: 48.853333,
			lng: 2.294694,
			title: 'Paris', 
		});
		map.addMarker({
			lat: 48.859393,
			lng: 2.296694,
			title: 'Near Paris Two', 
		});
		map.addMarker({
			lat: 48.864444,
			lng: 2.299394,
			title: 'Near Paris Three', 
		});
		map.addMarker({
			lat: 48.855000,
			lng: 2.309394,
			title: 'Near Paris Four', 
		});
		map.addMarker({
			lat: 48.855000,
			lng: 2.275394,
			title: 'Near Paris Five', 
		});
		map.addMarker({
			lat: 48.8622222,
			lng: 2.280000,
			title: 'Near Paris Six', 
		});
	}


});
