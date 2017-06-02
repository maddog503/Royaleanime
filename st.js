function abrir_chat(){	document.getElementById("chat_foro").innerHTML = '<img src="http://videosanime.net/chath.png" alt="Cerrar Chat" title="Cerrar Chat" onclick="cerrar_chat()" style="cursor:pointer;" /><br /><iframe align="center" frameborder="0" src="http://anime-radio.net/lightIRC/" style="height: 490px; width: 568px;"></iframe>';
}
function cerrar_chat(){	document.getElementById("chat_foro").innerHTML = '<img onclick="abrir_chat()" style="cursor:pointer;" src="http://animevision.org/chat.png" />';
}
