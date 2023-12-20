function calcularLetraDNI() {
    var dniInput = document.getElementById('NumeroDni');
    var resultadoMensaje = document.getElementById('resultado');

    // Obtener el número del DNI
    var numeroDNI = dniInput.value;

    // Validar que el número del DNI tenga 8 dígitos
    if (numeroDNI.toString().length !== 8) {
      resultadoMensaje.textContent = 'El número del DNI debe tener 8 dígitos.';
      return;
    }

    // Calcular la letra del DNI
    var letrasDNI = 'TRWAGMYFPDXBNJZSQVHLCKE';
    var letraCalculada = letrasDNI.charAt(numeroDNI % 23);

    resultadoMensaje.textContent = 'La letra del DNI es: ' + letraCalculada;
  }