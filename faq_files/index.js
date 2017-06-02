var duration = 6500;
var interval;
var index;
var max;
var prev = 1;

$(document).ready(function() {
	
	var stories = $(".topPanel");
	max = stories.length;
	index = 1;
	
	rotate();
	
	$(".topPanel").mouseover(function(){
		clearInterval(interval);
	}).mouseleave(function(){
		interval = setInterval("executeRotation()", duration);	
	});
	
	$(".movieIndex .index").click(function(){
		index = $(this).attr("value");
		executeRotation();
	});

   $('#mediaUrl.jsb').focus(function() {
      if ($(this).val() == "Direccion del video, por ejemplo: http://www.youtube.com/watch?v=7BOhDaJH0m4") {
         $(this).val("");
         $(this).css('color', '#000000')
      }
   });
   
   $('#mediaUrl.jsb').blur(function() {
      var val = $(this).val();
      val = val.replace(/^\s*|\s*$/g,"");
      if (val == "") {
         $(this).css('color', '#999');
         $(this).val("Direccion del video, por ejemplo: http://www.youtube.com/watch?v=7BOhDaJH0m4");
      }
   });
   
   $('.inst').colorbox({innerWidth: 750, innerHeight: 400, html: $('div#instructions').html()});

	 if ($('#mp3').length > 0) {
	   $.get('/loadGo.php', function(data) {
	  	$('#mp3').html(data);
	   });	 
	 }
	 
   $('.alert').click(function() {
  		alert('Haz click con el boton derecho y pon "Guardar destino/enlace como..."');
  		return false;
   });
   
   if ($(".zoom").length > 0) {	
   		$(".zoom .img").Zoomer({speedView:200,speedRemove:200,altAnim:false,speedTitle:400,debug:false});
   		pic = new Image(370, 194); 
		pic.src = "/images/tipbk.png"; 
   }
   
   $(".tool").tooltip({ effect: 'toggle', offset: [10, 0], delay: 0});
});

function rotate() {
	interval = setInterval("executeRotation()", duration);
}

function executeRotation() {
	if (index == max) index = 0;
    $(".or" + prev).fadeOut(400);
	$(".movieIndex .index").removeClass("active");
	$(".or" + index).fadeIn(400);
	$(".movieIndex .index.in" + index).addClass("active");
	
    prev = index;
	index++;
}
