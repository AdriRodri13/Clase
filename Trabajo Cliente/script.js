class Persona{

    constructor(nombre,correo,altura,peso,edad,entrenos) {
        this._nombre = nombre;
        this._correo = correo;
        this._altura = altura;
        this._peso = peso;
        this._edad = edad;
        this._entrenos = entrenos;
    }

    get nombre() {
        return this._nombre;
    }

    set nombre(value) {
        this._nombre = value;
    }

    get correo() {
        return this._correo;
    }

    set correo(value) {
        this._correo = value;
    }

    get altura() {
        return this._altura;
    }

    set altura(value) {
        this._altura = value;
    }

    get peso() {
        return this._peso;
    }

    set peso(value) {
        this._peso = value;
    }

    get edad() {
        return this._edad;
    }

    set edad(value) {
        this._edad = value;
    }


    get entrenos() {
        return this._entrenos;
    }

    set entrenos(value) {
        this._entrenos = value;
    }

    addEntreno(entreno){
        this._entrenos.push(entreno);
    }
}

class Entreno{

    constructor(distanciaRecorrida,tiempoRealizacion) {
        this._distanciaRecorrida = distanciaRecorrida;
        this._tiempoRealizacion = tiempoRealizacion;
        this._velocidad = Entreno.calcularVelocidad(distanciaRecorrida,tiempoRealizacion);
        this._fecha = this.recogerFecha();
        this._nivelEntreno = Entreno.calcularNivelEntreno(distanciaRecorrida,tiempoRealizacion);
    }

    get distanciaRecorrida() {
        return this._distanciaRecorrida;
    }

    set distanciaRecorrida(value) {
        this._distanciaRecorrida = value;
    }

    get tiempoRealizacion() {
        return this._tiempoRealizacion;
    }

    set tiempoRealizacion(value) {
        this._tiempoRealizacion = value;
    }

    static calcularVelocidad(distanciaRecorrida,tiempoRealizacion) {
        return tiempoRealizacion/distanciaRecorrida;
    }

    recogerFecha(){
        this._fecha = new Date();

        const dia = this._fecha.getDate().toString().padStart(2, '0');
        const mes = (this._fecha.getMonth() + 1).toString().padStart(2, '0');
        const anio = this._fecha.getFullYear();

        return `${dia}/${mes}/${anio}`;
    }

    static calcularNivelEntreno(velocidad){
        if(velocidad<10){
            return "malo";
        }else if(velocidad>=10 && velocidad<20){
            return "bueno";
        }else{
            return "muy bueno";
        }
    }
}

// Inicio Programa -> Esperamos a que cargue todo el documento con el DOMContentLoaded //

document.addEventListener("DOMContentLoaded", function () {
    let persona;
    let botones = document.getElementById("botones");
    botones.style.display = "none";
    let contenedorPrograma = document.getElementById("contendor-programa");
    contenedorPrograma.style.display = "none";
    let contenedorEntreno = document.getElementById("contenedor-entreno");
    contenedorEntreno.style.display = "none";
    let contenedorMejorEntreno = document.getElementById("contenedor-mejor-entreno");
    contenedorMejorEntreno.style.display = "none";
    let contenedorFormulario = document.getElementById('contenedor-formulario');
    contenedorFormulario.style.display = "none";
    let botonInicio = document.getElementById("botonInicio");
    botonInicio.addEventListener("click", function () {
        contenedorFormulario.style.display = "block";
        botonInicio.style.display = "none";
    })
    let boton = document.getElementById('boton-registro');
    let comprobacionCorreo = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    let comprobante = false;
    let nombre, correo, altura, peso, edad,entrenos=[];
    boton.addEventListener('click', function () {
        event.preventDefault();
        nombre = document.getElementById('nombre').value;
        correo = document.getElementById('correo').value;
        altura = document.getElementById('altura').value;
        peso = document.getElementById('peso').value;
        edad = document.getElementById('edad').value;

            if (nombre === "") {
                alert("Debes introducir un nombre correcto")
                comprobante = true;
                document.getElementById("nombre").value = "";
            }

            if (!comprobacionCorreo.test(correo)) {
                alert("Debes introducir un correo con un formato correcto")
                comprobante = true;
                document.getElementById("correo").value = "";
            }

            if (altura === "") {
                alert("Debes introducir un altura correcta")
                comprobante = true;
                document.getElementById("altura").value = "";
            }

            if (peso === "") {
                alert("Debes introducir un peso correcto")
                comprobante = true;
                document.getElementById("peso").value = "";
            }

            if (edad === "") {
                alert("Debes introducir una edad correcta")
                comprobante = true;
                document.getElementById("edad").value = "";
            }

            if(comprobante === false){
                contenedorFormulario.style.display = "none";
                contenedorPrograma.style.display = "block";
                botones.style.display = "block";
                persona = new Persona(nombre, correo, altura, peso, edad, entrenos);
                gestionPrograma(persona);
            }
    })



    function gestionPrograma(Persona){
        inicializarNuevoEntreno();
        inicializarMejorEntreno();
        manejarFormularioEntreno(Persona)

    }

    function inicializarNuevoEntreno() {

        let nuevoEntreno = document.getElementById("nuevo-entreno");
        nuevoEntreno.addEventListener("click", function () {
            ocultarHijos();
            let contenedorEntreno = document.getElementById("contenedor-entreno");
            contenedorEntreno.style.display = "block";
        });
    }

    function inicializarMejorEntreno() {

        let mejorEntreno = document.getElementById("mejor-entreno");
        mejorEntreno.addEventListener("click", function () {
            ocultarHijos()
            let mejorEntreno = document.getElementById("contenedor-mejor-entreno");
            mejorEntreno.style.display = "block";
        })
    }

    function manejarFormularioEntreno(persona) {
        let formularioEntreno = document.getElementById("formulario-entreno");
        formularioEntreno.addEventListener("submit", function(event) {
            event.preventDefault(); // Para evitar que recargue la página
            let distancia = document.getElementById("distancia").value;
            let tiempoRealizacion = document.getElementById("velocidad").value;
            let nivel = document.querySelector('input[name="nivel"]:checked');
            if(nivel){
                let valorNivel = nivel.value;
                let velocidad = Entreno.calcularVelocidad(distancia, tiempoRealizacion);
                if(Entreno.calcularNivelEntreno(velocidad) !== valorNivel){
                    alert("Debes introducir un entreno de nivel "+valorNivel);
                }else{
                    let entreno = new Entreno(distancia, velocidad);
                    persona.addEntreno(entreno);
                    contenedorEntreno.style.display = "none";
                }
            }else{
                alert("Debes introducir un nivel")
            }


        });
    }

    function ocultarHijos(){
        Array.from(contenedorPrograma.children).forEach(child => {
            child.style.display = "none";
        });
    }


})








