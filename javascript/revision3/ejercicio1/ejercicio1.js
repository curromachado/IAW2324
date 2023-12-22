
function generarNumero(){
    var min = 0;
    var max = 5;
    var numeroAleatorio = Math.floor(Math.random()*(max-min+1)+min);
    var numeroIntroducido = parseInt(document.getElementById("numeroIntroducido").value);
    document.getElementById("numeroGenerado").innerHTML = "El numero aleatorio es: " + numeroAleatorio;
    if (numeroAleatorio == numeroIntroducido) {
    document.getElementById("resultado").innerHTML = "Has acertado ya que el numero aleatorio era : " + numeroAleatorio + " y tu numero era: " + numeroIntroducido;}
    else {document.getElementById("resultado").innerHTML = "NO has acertado ya que el numero aleatorio era : " + numeroAleatorio + " y tu numero era: " + numeroIntroducido;}
}
