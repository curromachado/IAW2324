function ocultarCirculo(circuloId) {
    var circulo = document.getElementById(circuloId);
    if (circulo.style.display !== 'none') {
        circulo.style.display = 'none';
    } else {
        circulo.style.display = 'block';
    }
}