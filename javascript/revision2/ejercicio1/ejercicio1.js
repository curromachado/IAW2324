function calcularImc() {
var peso = parseInt(document.getElementById("peso").value);
var alturaCentimetros = parseInt(document.getElementById("altura").value);
var alturaMetros = alturaCentimetros * 0.01;
var imc = peso / (alturaMetros * alturaMetros);
var truncarImc = imc.toFixed(2);

document.getElementById("resultado").innerHTML = "Su imc es: " + truncarImc;

if (truncarImc <= 18.5) {
    document.getElementById("recomendacion").innerHTML = "Su peso es inferior a lo normal";
}
else if (truncarImc > 18.5 && truncarImc <= 24.9) {
    document.getElementById("recomendacion").innerHTML = "Su peso es normal";
}
else if (truncarImc > 25.0 && truncarImc <= 29.9) {
    document.getElementById("recomendacion").innerHTML = "Su peso es superior a lo normal";
}
else if (truncarImc >= 30.0) {
    document.getElementById("recomendacion").innerHTML = "obesidad";
}
else document.getElementById("recomendacion").innerHTML = "El numero no es correcto o no es un numero";
};
