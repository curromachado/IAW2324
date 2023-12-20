//Creamos una constante para almacenar los mensajes
// Recuperar mensajes almacenados en localStorage
const mensajes = JSON.parse(localStorage.getItem('mensajes')) || [];

//creamos la funcion que se desarrolla cuando pulsamos el boton en el html
function publicar() {
    //con la constante mensaje entrada obtenemos el texto del input del html
    const mensajeEntrada = document.getElementById("mensajeEntrada");
    //decimos que el mensaje es un valor 
    const mensaje = mensajeEntrada.value;
    //le pasamos un trim al mensaje para eliminar los espacios en blanco
    //con la exclamacion lo que hacemos es indicar que el mensaje 
    //no puede estar en blanco para que se ejecute el if
    if (mensaje.trim() !== "") {
    //El método push() añade uno o más elementos al final de un array
    //y devuelve la nueva longitud del array.
    mensajes.push(mensaje);
    //ahora llamamos a la funcion de actualizar los mensajes si todo es correcto
    actualizarMensajes();
    //le decimos que borre para poder meter un mensaje nuevo
    mensajeEntrada.value = "";  
    // Almacenar mensajes en localStorage
    localStorage.setItem('mensajes', JSON.stringify(mensajes)); 
    }
}
//creamos la funcion para borrar cada uno de los mensajes
function borrarMensaje(indice) {
    //El método splice() cambia el contenido de un array
    //eliminando elementos existentes y/o agregando nuevos elementos.
    mensajes.splice(indice, 1);
    //llamamos a la funcion que va a actualizar para que el mensaje
    //aparezca borrado
    actualizarMensajes();
    // Actualizar mensajes en localStorage después de borrar
    localStorage.setItem('mensajes', JSON.stringify(mensajes));
}
//creamos la funcion para actualizar los mensajes en pantalla
function actualizarMensajes() {
    //cogemos la lista creada en el html
    const mensajesContenedor = document.getElementById("mensajes");
    //le decimos que añada el mensaje al html
    mensajesContenedor.innerHTML = "";
    //le decimos con sort que ordene los mensajes cada vez que publiquen uno
    mensajes.sort();
    //El método forEach() ejecuta la función indicada una vez por cada elemento del array.
    mensajes.forEach((mensaje, index) => {
        //le decimos que cree una lista con los items
        const listaItems = document.createElement("li");
        //le decimos que la lista contiene un texto que es mensaje
        listaItems.textContent = mensaje;
        //creamos la constante para el icono y borrar mensajes
        // span Es un contenedor en línea. Sirve para aplicar estilo al texto o agrupar elementos en línea.
        const borrarIcono = document.createElement("span");
        //creamos una clase con el nombre icono borrado
        borrarIcono.className = "icono-borrado";
        //Añadimos que el contenido del texto del icono de borrado sea el icono
        borrarIcono.textContent = "🗑️";
        //le decimos que al hacer click en el icono borre el mensaje del index
        borrarIcono.onclick = () => borrarMensaje(index);
        //El appendChild()método de la Nodeinterfaz agrega un nodo al final de
        //la lista de hijos de un nodo padre específico.
        //le decimos que añada a la lista de items es decir a cada mensaje
        //el icono de borrado
        listaItems.appendChild(borrarIcono);
        //le decimos que añada los items de la lista al contenendor  de mensajes
        mensajesContenedor.appendChild(listaItems);
    });
}
// Mostrar mensajes al cargar la página
actualizarMensajes();

