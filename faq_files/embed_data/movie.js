var seconds = 45;
var action = "play";
var megaLink;
		
$(document).ready(function(){
	var principio = '<applet code="myPackage.Main.class" archive="/movies/Main.jar?v=047" name="Pelispedia" height="0" width="0" align="center" MAYSCRIPT>';
	var fin = '</applet>';
	var aux;
	
	$('.actionRadio[value="play"]').attr('checked', true);
	$('.actionRadio[value="download"]').attr('checked', false);

	$(".tooglePlot").click(function(){
		$(".plot").toggle();	
	});
	
	$("#inst").colorbox({innerWidth: 600, innerHeight: 550});
	
	$("#fileServer .server").click(function(){
		site = $(this).attr("alt");
		$("#paramSite").attr("value", site);
		
		switch(site) {
		case "megaupload":
  			$("#paramId").attr("value", mega1);
  			break;
		case "bitshare":
  			$("#paramId").attr("value", mega2);
  			break;
  		case "filefactory":
  			$("#paramId").attr("value", mega3);
  			break;
  		case "hotfile":
  			$("#paramId").attr("value", mega4);
  			break;
  		case "wupload":
  			$("#paramId").attr("value", mega5);
  			break;
		default:
  			break;
		}
		
		aux = $("#applet").html();
		$("#applet").html(principio + aux + fin);
		$("#fileServer").hide();
		$("#radios").hide();
		$("#wait").show();
	});
	
	$(".actionRadio").click(function(){
		action = $(this).val();
	});
	
	$("#submitCaptcha").click(function(){
			document.applets.Pelispedia.sendCaptcha($('#captchaResponse').val());
	});
	
	$("#captchaResponse").keypress(function(e) {
  	if(e.keyCode == 13) {
    	document.applets.Pelispedia.sendCaptcha($('#captchaResponse').val());
  	}
	});
	
	if ($(".rating").length > 0) {
	    var title = $(".wide").html();
		title = title.substring(24);
		$.get('/movies/imdb?q=' + title, function(data) {
            $('.rating').html(data);
        });
	}
	
});

function showImg(imgSrc) {
	$("#captchaImg").attr("src", "http://www.pelispedia.com/recaptcha/ble?i=http://www.google.com/recaptcha/api/" + imgSrc);
	$('#wait').hide();
	$("#videoBanner").hide();
	$('#cuenta').hide();
	$('#captchaForm').show();
}

function setCounter(num) {
	if (num > 5) {
		seconds = parseInt(num) + 5
	} else {
		seconds = num;
	}
	$('#wait').hide();
	$("#videoBanner").hide();
	$('#captchaForm').hide();
	$('#cuenta').show();
	interval = setInterval("countDown()", 1200);	
}

function countDown() {
	if (seconds == 0) {
		clearInterval(interval);
		$('#cuenta').hide();
		$('#wait').hide();
		document.applets.Pelispedia.almostThere();
	} else {
		seconds = seconds - 1;
		$('#cuenta').html('<span>Please wait...</span><br />' + seconds);
	}
}

function showLink(link) {
	megaLink = link;
	if (megaLink.length == 0) {
		showError();
	} else {
		writePlayer();
	}
}

function errorBorrado() {
	$(".status").hide();
	$("#videoBanner").hide();
	$('#cuenta').html('<span class="fileError">El archivo no esta accesible, tal vez fue borrado o ya estas bajando otro archivo desde el mismo servidor<br /><br />Puedes probar con otro de los servidores disponibles</span>');
	$('#cuenta').show();
}

function showError() {
	$(".status").hide();
	$("#videoBanner").hide();
	$('#cuenta').html('<span class="fileError">La pelicula esta temporalmente inactiva, espera unos minutos y vuelve a intentarlo<br /><br />Tambien puedes probar con otro de los servidores disponibles</span>');
	$('#cuenta').show();	
}

function writePlayer() {
	if (action == "play") {
        if (type == "movies" || type == "series") {
            type = 'http://www.pelispedia.com/' + type + '/';
        }
    
		var so = new SWFObject('/mediaplayer/videoPlayer.swf', 'playerSWF', '640', '360', '9');
		so.addParam('allowscriptaccess','always');
		so.addParam('allowfullscreen','true');
  	    so.addParam('bgcolor', '#000000');
		so.addParam('wmode', 'opaque');
		so.addVariable('megaurl', megaLink);
		so.addVariable('autostart', 'true');
        if (mId != "") so.addVariable('id', mId); //nombre del sub
  	    so.addVariable('sub_pre', 'ES');
  	    so.addVariable('subs', ',ES');
  	    if (type != "") so.addVariable('videourl', type); //url donde esta contenido el sub
		so.write('mediaspace');
		
		//window.onbeforeunload = function(){};
        $(window).bind('beforeunload', function(){ 
            return "";
        });
	}
	
	if (action == "download") {
		content = '<div class="mediaDownload">';
		content += '<div><a href="' + megaLink + '">Descargar video</a></div>';
		content += '<div><a href="http://www.pelispedia.com/' + type + '/subs?s=' + mId + '">No olvides descargar los subtitulos</a></div>';
		content += '</div>';
		$("#mediaspace").html(content);
	}
}