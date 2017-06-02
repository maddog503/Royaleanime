
(function($){
	$.fn.Zoomer=function(b){
		var c=$.extend({speedView:200,speedRemove:400,altAnim:false,speedTitle:400,debug:false},b);
		var d=$.extend(c,b);
		
		function e(s){
			if(typeof console!="undefined"&&typeof console.debug!="undefined"){
				console.log(s)
			}else{
				alert(s)
			}
		}
		
		if(d.speedView==undefined||d.speedRemove==undefined||d.altAnim==undefined||d.speedTitle==undefined){
			e('speedView: '+d.speedView);
			e('speedRemove: '+d.speedRemove);
			e('altAnim: '+d.altAnim);
			e('speedTitle: '+d.speedTitle);
			return false
		}
		
		if(d.debug==undefined){
			e('speedView: '+d.speedView);
			e('speedRemove: '+d.speedRemove);
			e('altAnim: '+d.altAnim);
			e('speedTitle: '+d.speedTitle);
			return false
		}
		
		if(typeof d.speedView!="undefined"||typeof d.speedRemove!="undefined"||typeof d.altAnim!="undefined"||typeof d.speedTitle!="undefined"){
			if(d.debug==true){
				e('speedView: '+d.speedView);
				e('speedRemove: '+d.speedRemove);
				e('altAnim: '+d.altAnim);
				e('speedTitle: '+d.speedTitle)
			}
			
			$(this).hover(function(){
					$(this).find('img').stop().animate({marginTop:'-120px',marginLeft:'-90px',top:'50%',left:'50%',width:'141px',height:'210px',padding:'0px'},d.speedView).addClass("hoverZ");
					if(d.altAnim==true){
						var a=$(this).find("img").attr("alt");
						if(a.length!=0){
							$(this).prepend('<span class="titleZ">'+a+'</span>');
							$('.titleZ').animate({marginLeft:'-42px',marginTop:'90px'},d.speedTitle).css({'z-index':'500','position':'absolute','float':'left'})
						}
					}
				},
			
				function(){
					$(this).find('img').stop().animate({marginTop:'0',marginLeft:'0',top:'0',left:'0',width:'69px',height:'100px',padding:'0px'},d.speedRemove).removeClass("hoverZ");
					$(this).find('.titleZ').remove()
				}
			)
		}
	}
})
(jQuery);