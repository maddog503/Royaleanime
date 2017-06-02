<?php
function limpia($var){
	$var = strip_tags($var);
	$malo = array("\\",";","\'","'",'"','\"');
	$i=0;$o=count($malo);
	while($i<=$o){
		$var = str_replace($malo[$i],"",$var);
		$i++;
	}
	return $var;
}
function LimpiarTodo($datos){
	if(is_array($datos)){
		$datos = array_map('limpia',$datos);
	}else{
		die("<font color=#ff0000><b>Error:</b></font> La funcion <b>LimpiarTodo</b> debe contener un arreglo.");
	}
	return $datos;	
}
### Seguridad ###
if($_POST){
	$_POST =& LimpiarTodo($_POST);
}
if($_GET){
	$_GET =& LimpiarTodo($_GET);
}
### Seguridad  ###
//
@require_once"Procesos/Configurar.php";
@require_once"Procesos/Core_Funciones.php";

$anime = anime_v($_GET['id']);
$animeX = $anime;
$animex=$anime;
foreach ($animex as $anime){}
if($anime['ANIME'] == 'no'){
redireccionar();
}
//
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$anime['nom']?> Online | Todos los capítulos de <?=$anime['nom']?> | <?=$anime['nom']?> Anime Online - <?php echo $titulo; ?></title>
<meta property="og:title" content="<?=$anime['nom']?> Online">
<meta property="og:site_name" content="<?php echo $titulo; ?>">
<meta property="og:type" content="tv_show">
<meta property="og:image" content="<?php echo $web; ?><?=$anime['img']?>">
<meta property="og:description" content="Para ver el capitulo da click en el enlace.">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="description" content="Anime <?=$anime['nom']?>: Cap&iacute;tulos de <?=$anime['nom']?> para ver online y descargar, completamente gratis.">
<meta name="keywords" content="<?=$anime['nom']?>, ver <?=$anime['nom']?>, <?=$anime['nom']?> sub esp, <?=$anime['nom']?> online, <?=$anime['nom']?> sub espa&ntilde;ol">
<link rel="image_src" href="<?=$anime['img']?>">
<link rel="shortcut icon" href="favicon.ico">
<link href="/css/main.css" rel="stylesheet" type="text/css">
<base href="<?php echo $web; ?>">
<script type="text/javascript" src="/css/prototaculous.js"></script>
<script type="text/javascript" src="/css/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/css/jquery.tipsy.js"></script>
<script type="text/javascript" src="/css/jquery.jtruncate.pack.js"></script>
<script type="text/javascript" src="/css/script.js"></script>
<script type="text/javascript"></script>
<!--[if lte IE 7]><link href="/css/noie.css" rel="stylesheet" type="text/css">
<![endif]--><!--[if IE 6]><iframe src="/noie.html" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="100%" height="100%" id="i"></iframe>
<![endif]--><!--[if IE 7]><iframe src="/noie.html" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="100%" height="700" id="i" style="height:500px"></iframe>
<![endif]--><!--[if IE ]><style type="text/css">#b{/*margin-top: -65px;*/} #q{height: 22px; margin-left: 2px; margin-top: 0px; padding-left: 6px; padding-top: 8px; text-shadow: #AEDDFF 0px 1px 0px; width: 190px;} #bb:hover{height: 31px; margin-left: 3px; margin-top: 0px; outline: none; width: 51px;}</style>
<![endif]-->
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) {return;}  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
<div id="header"><div id="cb">
<!-- arriba --><div id="hh"><div id="eih"></div><div id="h"><h1 class="title"><a href="<?=$anime['catg']?>/<?=$anime['nom']?>/<?=$anime['id']?>.html">Ver <?=$anime['nom']?></a> | <a href="<?=$anime['catg']?>/<?=$anime['nom']?>/<?=$anime['id']?>.html"><?=$anime['nom']?> Sub español</a> | <a href="<?=$anime['catg']?>/<?=$anime['nom']?>/<?=$anime['id']?>.html">Descargar <?=$anime['nom']?></a></h1></div><div id="edh"></div></div>
<!-- logo --><div id="l" class="c"><a href="<?php echo $web; ?>" title="Anime Gratis - <?php echo $sitio; ?>" style="float: left;"><img src="/logo.png" alt="Logo <?php echo $titulo; ?>" name="logo" width="240" height="100" border="0" id="logo"></a>
<!-- 728x90 --><div class="a728"><iframe allowtransparency="true" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="728" height="90" src="http://ads.smowtion.com/st?ad_size=728x90&section=1853525"></iframe></div>
</div></div>

<div id="mm"><div id="eim"></div><div id="m">
<?php include("css/menu.php"); ?>
<!-- buscador -->
<form action="buscador.php" method="get" id="b">
<iframe src="http://www.facebook.com/plugins/like.php?app_id=121492064600717&amp;href=<?php echo $face; ?>&amp;send=false&amp;layout=button_count&amp;width=200&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=21" scrolling="no" frameborder="0" class="tip" title="&iquest;Te ha gustado la web?" style="border:none; overflow:hidden; width:120px; height:21px;displa:block;float:left;margin:3px;margin-top:6px;" allowTransparency="true"></iframe>
<a href="http://twitter.com" target="_blank" style="displa:block;float:left;margin:3px;"><img src="/img/tw.png" alt="Twitter" width="24" height="24" border="0" class="tip" title="S&iacute;guenos en Twitter"></a>
<a href="<?php echo $face; ?>" target="_blank" style="displa:block;float:left;margin:3px;"><img src="/img/fb.png" alt="Facebook" width="24" height="24" border="0" class="tip" title="S&iacute;guenos en Facebook"></a>
<input type="hidden" name="site" value="<?php echo $sitio; ?>"><input type="text" id="q" name="q" value="Ingresa tu b&uacute;squeda" onblur="if(this.value==''){ var texto=this.value='Ingresa tu b&uacute;squeda'; }" onfocus="if(this.value=='Ingresa tu b&uacute;squeda') this.value='';"><input type="submit" value="Buscar" id="bb" style="text-indent:-9999px"></form>
</div><div id="edm"></div></div></div>

<div id="main">
<div id="mt"></div>
<div id="mmm">
<div class="cc fleft"><div class="ctit">Animes por orden alfab&eacute;tico:</div><div class="ccon">
<ul class="alfa" style="margin-top:6px; margin-left: 5px;"><li><a href="letra/a.html" class="let">A</a></li><li><a href="letra/b.html" class="let">B</a></li><li><a href="letra/c.html" class="let">C</a></li><li><a href="letra/d.html" class="let">D</a></li><li><a href="letra/e.html" class="let">E</a></li><li><a href="letra/f.html" class="let">F</a></li><li><a href="letra/g.html" class="let">G</a></li><li><a href="letra/h.html" class="let">H</a></li><li><a href="letra/i.html" class="let">I</a></li><li><a href="letra/j.html" class="let">J</a></li><li><a href="letra/k.html" class="let">K</a></li><li><a href="letra/l.html" class="let">L</a></li><li><a href="letra/m.html" class="let">M</a></li><li><a href="letra/n.html" class="let">N</a></li><li><a href="letra/o.html" class="let">O</a></li><li><a href="letra/p.html" class="let">P</a></li></ul>
<ul class="alfa" style="margin-left: 70px"><li><a href="letra/q.html" class="let">Q</a></li><li><a href="letra/r.html" class="let">R</a></li><li><a href="letra/s.html" class="let">S</a></li><li><a href="letra/t.html" class="let">T</a></li><li><a href="letra/u.html" class="let">U</a></li><li><a href="letra/v.html" class="let">V</a></li><li><a href="letra/w.html" class="let">W</a></li><li><a href="letra/x.html" class="let">X</a></li><li><a href="letra/y.html" class="let">Y</a></li><li><a href="letra/z.html" class="let">Z</a></li><li><a href="letra/1.html" class="let">#</a></li></ul>
</div></div>
<div class="cc fleft"><div class="ccon"><IFRAME src="http://animevision.org/animeradio.htm" marginwidth="1" marginheight="1" height="100" width="359" scrolling="no" border="0" frameborder="0" name="I1" align="middle"></IFRAME></div></div>

<table border="0" width="985" cellspacing="0" cellpadding="0"><tr>
<!-- izq -->
<td width="661" align="left" valign="top">
<div class="clt"></div>
<div class="clm"><h1><?=$anime['nom']?></h1><img src="<?=$anime['img']?>" alt="<?=$anime['nom']?>" width="166" height="250" border="0" class="ii">
<div style="float:right; width: 440px; margin-right: 7px; margin-top: 7px; display:block;">
<strong class="clms">Categoria: </strong><?=elimina_acentos($anime['categoria']);?><br>
<strong class="clms">Estado: </strong><span style="font-weight: bold"><?=elimina_acentos($anime['estado']);?></span><br>
<strong class="clms">Agregado: </strong> <?=elimina_acentos($anime['agreg']);?><br>
<strong class="clms">T&iacute;tulos Alternativos: </strong><br><ul class="lc"><li class="lc"><?=$anime['titu']?></li></ul>
<div class="sinop"><strong class="clms">Sinópsis: </strong><?=elimina_acentos(urldecode($anime['descrip']))?></div></div>
<!-- Apis --><div style="clear:both;"></div><div class="bs" style="margin-left: 4px;"><script type="text/javascript" src="https://apis.google.com/js/plusone.js">  {lang: 'es'}</script><g:plusone size="tall"></g:plusone></div>
<!-- face --><div class="bs"><iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo $web; ?><?=$anime['catg']?>/<?=$anime['nom']?>/<?=$anime['id']?>.html&amp;layout=box_count&amp;show_faces=false&amp;width=71&amp;action=like&amp;colorscheme=light&amp;height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:71px; margin-left: -2px; margin-top:1px; height:65px;" allowtransparency="true"></iframe></div><div style="clear:both;"></div>
</div><div style="clear:both;"></div></div>
<div class="clb"></div>
<!-- compartir --><div class="clt"></div><div class="clm"><table align="right" height="34" width="338"><td align="right" width="65">Compartir:</td><td><div class="addthis_toolbox addthis_default_style addthis_32x32_style"><a class="addthis_button_preferred_1"></a><a class="addthis_button_preferred_2"></a><a class="addthis_button_preferred_3"></a><a class="addthis_button_preferred_4"></a><a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a></div><script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4dbda7351deb66ec"></script></td></table><div style="clear:both;"></div></div><div class="clb"></div>
<!-- Cap -->
<div class="clt"></div>
<div class="clm"><h2>Lista de capítulos de: <i><?=$anime['nom']?></i></h2><div id="lcmain"><ul id="lcholder"><li class="lccn"><?=$anime['prox']?></li>
<?php
foreach ($animeX as $x){
echo "<li class=\"lcc\"><a href=\"/ver/".hacer_url($x['nom'])."-".hacer_url($x['nom_capitulo'])."/".$x['id_cap'].".html\" class=\"lcc\">Cap&iacute;tulo ".ucwords($x['nom_capitulo'])." de ".$x['nom']."</a></li>";
}
?></ul></div></div>
<div class="clb"></div>
<div style="clear:both;"></div><script type="text/javascript">(function($){$.fn.sweetPages=function(c){if(!c)c={};var d=c.perPage||3;var f=this;var g=f.find('li');g.each(function(){var a=$(this);a.data('height',a.outerHeight(true))});var h=Math.ceil(g.length/d);if(h<2)return this;var j=$('<div class="swControls">');for(var i=0;i<h;i++){g.slice(i*d,(i+1)*d).wrapAll('<div class="swPage"/>');j.append('<a href="javascript:void(0);" class="swShowPage" title="P&aacute;gina: '+(i+1)+'">'+(i+1)+'</a>')}f.append(j);var k=0;var l=0;var m=f.find('.swPage');m.each(function(){var a=$(this);var b=0;a.find('li').each(function(){b+=$(this).data('height')});if(b>k)k=b;l+=a.outerWidth();a.css('float','left').width(f.width())});m.wrapAll('<div class="swSlider"/>');f.height(k);var n=f.find('.swSlider');n.append('<div class="clear"/>').width(l);var o=f.find('a.swShowPage');o.click(function(e){$(this).addClass('active').siblings().removeClass('active');n.stop().animate({'margin-left':-(parseInt($(this).text())-1)*f.width()},'slow');e.preventDefault()});o.eq(0).addClass('active');j.css({'left':'50%','margin-left':-j.width()/2,'margin-top':'-18px'});return this}})(jQuery);jQuery(document).ready(function(){jQuery('#lcholder').sweetPages({perPage:25});var a=jQuery('.swControls').detach();a.appendTo('#lcmain');jQuery('.swShowPage').tipsy({gravity:'s'})});</script><p>&nbsp;</p>
</td>

<!-- der -->
<td width="324" align="left" valign="top">
<!-- 300x250 --><div class="a300x250"><iframe allowtransparency="true" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="300" height="250" src="http://ads.smowtion.com/st?ad_size=300x250&section=1853525"></iframe></div>
<fb:comments href="<?php echo $web; ?><?=$anime['catg']?>/<?=$anime['nom']?>/<?=$anime['id']?>.html" num_posts="10" width="310" style="margin-top: 5px;"></fb:comments><p>&nbsp;</p>
</td>

</tr></table></div>
<!-- footer -->
<div id="footer"><div id="f_t"></div><div id="x">Ningun video esta alojado en nuestros servidores <?php echo $sitio; ?> - Copyright ©2011</div></div>
</body></html>