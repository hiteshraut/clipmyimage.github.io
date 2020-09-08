$(function(){
	
	var $gallery = $('.mainwrap .container ul li a').simpleLightbox();
		
		$gallery.on('show.simplelightbox', function(){
			$('.mainwrap .container ul li').removeClass('active');
			$(this).parent().addClass('active');
			console.log('Requested for showing');
		})
		.on('shown.simplelightbox', function(){
			$('.img-control').show();
			var image = $(this).attr('rel');
			$('.sl-wrapper .sl-image').append("<img src="+image+" class='before'/>");
			console.log('Shown');
		})
		.on('close.simplelightbox', function(){
			
			$gallery.removeClass('active');
			console.log('Requested for closing');
		})
		.on('closed.simplelightbox', function(){
			$('.img-control').hide();
			console.log('Closed');
		})
		.on('change.simplelightbox', function(){
			console.log('Requested for change');
		})
		.on('next.simplelightbox', function(){		
			
			console.log('Requested for next');
		})
		.on('prev.simplelightbox', function(){
			console.log('Requested for prev');
		})
		.on('nextImageLoaded.simplelightbox', function(){
			console.log('Next image loaded');
		})
		.on('prevImageLoaded.simplelightbox', function(){
			console.log('Prev image loaded');
		})
		.on('changed.simplelightbox', function(){
			console.log('Image changed');
		})
		.on('nextDone.simplelightbox', function(){
			/*$('.mainwrap .container ul li.active').removeClass('active').next().addClass('active');
			var total = $('.mainwrap .container ul li').size();
			var current = $('.mainwrap .container ul li.active').index()+1;
			var src = $('.mainwrap .container ul li.active a').attr('rel');		
			$('.sl-wrapper .sl-image img.before').attr('src',src);
			if(total == current){				
				$('.mainwrap .container ul li:first-child').addClass('active');	     			
				var src = $('.mainwrap .container ul li.active a').attr('rel');		
			    $('.sl-wrapper .sl-image img.before').attr('src',src);
			}*/
			
			var imgpath = $('.sl-wrapper .sl-image img').eq(0).attr('src').replace(/\.jpg/, '');			
		    $('.sl-wrapper .sl-image img.before').attr('src',imgpath+'b.jpg');
			
			console.log('Image changed to next');
		})
		.on('prevDone.simplelightbox', function(){
			var imgpath = $('.sl-wrapper .sl-image img').eq(0).attr('src').replace(/\.jpg/, '');			
		    $('.sl-wrapper .sl-image img.before').attr('src',imgpath+'b.jpg');
			console.log('Image changed to prev');
		})
		.on('error.simplelightbox', function(e){
			console.log('No image found, go to the next/prev');
			console.log(e);
		});
	
	$('.img-control a').on('click',function(e){		
		e.preventDefault();
		if($(this).is('.before')){			
			$('.sl-wrapper .sl-image img.before').css('opacity',1);
			$('.sl-wrapper .sl-image img:first').css('opacity',0);	
		}else{
			$('.sl-wrapper .sl-image img:first').css('opacity',1);
			$('.sl-wrapper .sl-image img.before').css('opacity',0);	
		}	
	});
	
	
	
	
	/*$('.mainwrap .container ul li').on('click',function(){
		$("html, body").animate({ scrollTop: 0 }, "slow");
		$(this).addClass('current');
		var afterimg = $(this).attr('data-img');	
		var beforeimg = $(this).attr('data-bg');
		var head = $(this).attr('data-head');	
		var cat = $(this).attr('data-cat');	
		$('.sliderwrap .imgwrap').find('h3').text(head);
		$('.sliderwrap .imgwrap').find('h4').text(cat);
		$('.sliderwrap .imgwrap').find('img').attr('src',afterimg);
		$('.sliderwrap, .overlay').show(); 
		
		if($(window).width() < 767 ){
			$('.sliderwrap .imgwrap').css('height','auto').css('max-width', $(window).width()/2 );
		}else
		{
			$('.sliderwrap .imgwrap').css('height','auto').css('width',$('.sliderwrap .imgwrap img').width());
		}
		$('.sliderwrap .imgwrap').css("background-image","url('"+beforeimg+"')");
		
	});
	$('.sliderwrap .imgwrap .compare a').on('click',function(){
		$('.sliderwrap .imgwrap .compare a').removeClass('active');
	    $(this).addClass('active');	
		if($(this).is('.before')){
			TweenMax.to($(this).parents('.imgwrap').find('img'),0.5,{alpha:0, ease: SlowMo.easeIn,yoyo:true});
		}
		if($(this).is('.after')){
			TweenMax.to($(this).parents('.imgwrap').find('img'),0.5,{alpha:1, ease: SlowMo.easeIn,yoyo:true});
		}
	});
	$('.sliderwrap .close').on('click',function(){
		hidePopup();
		resetCompare();
	});
	
	
	
	$('.sliderwrap .controls a.next').on('click',function(){
		var totalsize = $('.mainwrap .container ul li').size();
		var curIndex = $('.mainwrap .container ul li.current').index()+1;
		$('.mainwrap .container ul li.current').removeClass('current').next().addClass('current');
		 bindPopup();
		 resetCompare();
		 if(curIndex == totalsize){
			 $('.mainwrap .container ul li:first').addClass('current');
			 bindPopup();
		 	resetCompare();
		 }
		
	});
	
	$('.sliderwrap .controls a.prev').on('click',function(){
		var totalsize = $('.mainwrap .container ul li').size();
		var curIndex = $('.mainwrap .container ul li.current').index()+1;
		$('.mainwrap .container ul li.current').removeClass('current').prev().addClass('current');
		 bindPopup();
		 resetCompare();
		 if(curIndex == 1){
			 $('.mainwrap .container ul li:last').addClass('current');
			 bindPopup();
		 	resetCompare();
		 }
		
	});
	
	
	function resetCompare(){
			$('.sliderwrap .imgwrap .compare a').removeClass('active');
			$('.sliderwrap .imgwrap .compare a.after').addClass('active');
			$('.sliderwrap .imgwrap').find('img').css('opacity','1');
	}
	function hidePopup(){
		$('.mainwrap .container ul li').removeClass('current');
		$('.sliderwrap, .overlay').hide(); 
	}
	function bindPopup(){
		var afterimg = $('.mainwrap .container ul li.current').attr('data-img')
		var beforeimg = $('.mainwrap .container ul li.current').attr('data-bg');
		var head = $('.mainwrap .container ul li.current').attr('data-head');	
		var cat = $('.mainwrap .container ul li.current').attr('data-cat');	
		$('.sliderwrap .imgwrap').find('h3').text(head);
		$('.sliderwrap .imgwrap').find('h4').text(cat);
		$('.sliderwrap .imgwrap').find('img').attr('src',afterimg);
		$('.sliderwrap, .overlay').show(); 
		$('.sliderwrap .imgwrap').css('height','auto').css('max-width',$('.sliderwrap .imgwrap img').width());
		$('.sliderwrap .imgwrap').css("background-image","url('"+beforeimg+"')");
	}
	
	$(window).resize(function(){
		var w = $(window).width()- $('.sliderwrap .imgwrap img').width();
		
		if($(window).width() < 767 ){
				$('.sliderwrap .imgwrap').css('height','auto').css('max-width', $(window).width()/2);
		}else
		{
			$('.sliderwrap .imgwrap').css('height',$('.sliderwrap .imgwrap img').height()).css('max-width', w );
		}
	});
	*/
	
});