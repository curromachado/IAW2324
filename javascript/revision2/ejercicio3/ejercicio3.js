function validateDNI(dni) {
    var numero, let, letra;
    var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;
    var dni = dni.toUpperCase();
  
    if(expresion_regular_dni.test(dni) === true){
        numero = dni.substr(0,dni.length-1);
        numero = numero.replace('X', 0);
        numero = numero.replace('Y', 1);
        numero = numero.replace('Z', 2);
        let = dni.substr(dni.length-1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero+1);
        if (letra != let) {
            return false;
        }else{
            return true;
        }
    }else{
        return false;
    }
  }

  // Validar PIN
  function validarPin(){
    var pin = document.getElementById('pin').value;
    var pinRepetido = document.getElementById('pinRepetido').value;
    if (pin !== pinRepetido) {
      document.getElementById('pinError').innerHTML = 'Los PIN no coinciden.';
      return false;
    } else {
      document.getElementById('pinError').innerHTML = '';
    }

    return true;
  }

  function validarFormulario() {
    var dni = document.getElementById('dni').value;
    var pinValido = validarPin();
    var dniValido = validateDNI(dni);

    if (!dniValido) {
      document.getElementById('dniError').innerHTML = 'El DNI no es válido.';
    } else {
      document.getElementById('dniError').innerHTML = '';
    }

    if (dniValido && pinValido) {
      // Obtener datos para el mensaje de éxito
      var nombre = document.getElementById('nombre').value;
      var apellido = document.getElementById('apellido').value;
      var telefono = document.getElementById('telefono').value;

      // Construir el nombre de usuario
      var nombreUsuario = nombre.substr(0, 2) + apellido.substr(0, 2) + telefono.substr(-3);

      // Mostrar mensaje de éxito
      document.getElementById('mensajeExito').innerHTML = 'Usuario creado: ' + nombreUsuario;
    } else {
      // Limpiar mensaje de éxito si no es válido
      document.getElementById('mensajeExito').innerHTML = '';
    }

    return dniValido && pinValido;
  }