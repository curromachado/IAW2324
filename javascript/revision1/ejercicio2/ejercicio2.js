function convertirMoneda() {
    // Obtener el valor ingresado
    var valorNumerico = parseFloat(document.getElementById("Valor").value);

    // Verificar si el valor es un número válido y positivo
    if (!isNaN(valorNumerico) && valorNumerico >= 0) {
        // Convertir a euros y dólares (tasas de conversión fijas)
        var euros = valorNumerico * 0.85; // Tasa de conversión a euros
        var dolares = valorNumerico * 1.18; // Tasa de conversión a dólares

        // Mostrar el resultado
        document.getElementById("resultado").innerHTML = "Valor en euros: " + euros.toFixed(2) + " &euro;<br>Valor en dólares: $" + dolares.toFixed(2);
    } else {
        // Mostrar un mensaje de error si el valor no es un número válido y positivo
        document.getElementById("resultado").innerHTML = "Por favor, ingresa un número positivo válido.";
    }
}