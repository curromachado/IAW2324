/* Sustituye convenientemente los ************ por lo que corresponda */
var puntos = 0;
function aparecerpatito()
{
    var top = Math.random()*400;
    var left = Math.random()*300;
    var width = (Math.random()*100)+100;
    
    document.getElementById("patito").style.width = width + "px";
    document.getElementById("patito").style.height = width + "px";


    document.getElementById("patito").style.top = top + "px";
    document.getElementById("patito").style.left = left + "px";

    document.getElementById("patito").style.display = "block";
}
function desapareceMensaje(){
    document.getElementById("mensaje").innerHTML = ""; /* Hacemos que no ponga nada en el mensaje */
}
function aparecerpatitoDespuesRetraso()
{
    setTimeout(aparecerpatito, Math.random()*2000);

}
function desapareceMensajeDespuesRetraso()
{
    setTimeout(desapareceMensaje, 2000);

}
aparecerpatitoDespuesRetraso();

document.getElementById("campoJuego").onclick = function (e)
{
    if (e.target != document.getElementById("patito"))
    {
        puntos = puntos - 1;
        document.getElementById("mensaje").innerHTML = "¡Fallaste!";
        
    }
    else{
        puntos = puntos + 1;
        document.getElementById("mensaje").innerHTML = "¡Acierto!";
    }
    document.getElementById("patito").style.display = "none";
    document.getElementById("puntos").innerHTML = puntos; /* Establecemos los puntos */
    aparecerpatitoDespuesRetraso();
    desapareceMensajeDespuesRetraso();
}