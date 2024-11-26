// Niveles en este caso en un radio-button, de esta forma cogemos el que está marcado y lo gestionamos
function cogerRadioButton(){
    let nivel = document.querySelector('input[name="nivel"]:checked');
    if(nivel){
        //Cogemos el valor del input
        let valorNivel = nivel.value;
    }else{
        alert("Debes introducir un nivel")
    }
}

// Coger check-box
function cogerCheckBox(){
    // Esto sirve para coger todos los checkboxes seleccionados
    let checkboxes = document.querySelectorAll('input[name="opcion"]:checked');
    // Al ser un array, tenemos que usar un map para recorrerlo, de forma que en seleccionados guardaremos el
    // valor de cada checkbox seleccionado
    let seleccionados = Array.from(checkboxes).map(checkbox => checkbox.value);
    for (let i=0; i<seleccionados.length; i++) {
        alert(seleccionados[i]);
    }
}

function cogerSelect() {
    // Selecciona el elemento <select> (puedes usar un id o una clase)
    let select = document.querySelector('select[name="opciones"]');

    // Recoge las opciones seleccionadas
    let seleccionados = Array.from(select.selectedOptions).map(option => option.value);

    // Itera sobre las opciones seleccionadas y realiza acciones (por ejemplo, mostrarlas en alertas)
    for (let i = 0; i < seleccionados.length; i++) {
        alert(seleccionados[i]);
    }
}

//Clase Random
class random{
   random(min, max){
      return Math.floor(Math.random() * (max - min)) + min;
   }
}

// Sustituir letra de una cadena
function sustituirLetra(cadena, posicion, caracterNuevo) {
    if (posicion < 0 || posicion >= cadena.length) {
        alert("Indice no valido");
        return null;
    }
    return cadena.substring(0, posicion) + caracterNuevo + cadena.substring(posicion + 1);
}

//Expresiones regulares
function comprobarCorreo(correo){
    // ^ - Ancla el inicio de la cadena, asegurando que el patrón empieza desde el principio.
    // [a-zA-Z0-9._%+-]+ - Busca uno o más caracteres que pueden ser letras (mayúsculas o minúsculas),
    //                     dígitos, puntos, guiones bajos, porcentajes, signos más o guiones.
    // @ - Obliga a que haya un símbolo arroba (@) en la dirección de correo.
    // [a-zA-Z0-9.-]+ - Después del arroba, permite letras, dígitos, puntos o guiones, uno o más.
    // \. - Obliga a que haya un punto literal, separando el dominio del TLD (como ".com").
    // [a-zA-Z]{2,} - Permite letras (mayúsculas o minúsculas) de 2 o más caracteres para el TLD.
    // $ - Ancla el final de la cadena, asegurando que el patrón termina aquí.
    let comprobacionCorreo = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;


    return comprobacionCorreo.test(correo);
}

function comprobarFecha(fecha){
    // ^ - Ancla el inicio de la cadena, asegurando que el patrón empieza desde el principio.
    // \d{2} - Valida exactamente dos dígitos para el día (dd), donde \d representa un dígito (0-9) y {2} indica exactamente dos dígitos.
    // \/ - Escapa el carácter '/' porque tiene un significado especial en las expresiones regulares.
    // \d{2} - Valida exactamente dos dígitos para el mes (mm).
    // \/ - Otro '/' escapado para separar el mes del año.
    // \d{4} - Valida exactamente cuatro dígitos para el año (yyyy).
    // $ - Ancla el final de la cadena, asegurando que el patrón termine aquí.
    let comprobacionFecha = /^\d{2}\/\d{2}\/\d{4}$/;

    return comprobacionFecha.test(fecha);

}

