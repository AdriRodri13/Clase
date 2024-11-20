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
        this._velocidad = this.calcularVelocidad(distanciaRecorrida,tiempoRealizacion);
        this._fecha = this.recogerFecha();
        this._nivelEntreno = this.calcularNivelEntreno(this._velocidad);
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

    calcularVelocidad(distanciaRecorrida,tiempoRealizacion) {
        return distanciaRecorrida/tiempoRealizacion;
    }

    recogerFecha(){
        this._fecha = new Date();

        const dia = this._fecha.getDate().toString().padStart(2, '0');
        const mes = (this._fecha.getMonth() + 1).toString().padStart(2, '0');
        const anio = this._fecha.getFullYear();

        const fechaFormateada = `${dia}/${mes}/${anio}`;
        return fechaFormateada;
    }

    calcularNivelEntreno(velocidad){
        if(velocidad<10){
            return "malo";
        }else if(velocidad>=10 && velocidad<20){
            return "buena";
        }else{
            return "muy bueno";
        }
    }
}


function mostrarTotalKm(){
    const entrenos = persona.entrenos;
    let totalKm = 0;
    entrenos.forEach(entreno => {
        totalKm += entreno._distanciaRecorrida;
    })
    mostrarKm(totalKm);
}

function mostrarKm(totalKm){
    const ventana = window.open("", "Total Km", "width=400,height=300");

    const contenido = `
        <html>
        <head>
            <title>Total KM</title>
        </head>
        <body>
            <h2>Total KM</h2>
            <p><strong>Total:</strong> ${totalKm}</p>
        </body>
        </html>
    `;

    ventana.document.write(contenido);
    ventana.document.close();

    setTimeout(() => {
        ventana.close();
    }, 10000);
}

// Inicio Programa -> Esperamos a que cargue todo el documento con el DOMContentLoaded //

document.addEventListener("DOMContentLoaded", function () {
    let contenedorFormulario = document.getElementById('contenedor-formulario');
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
            }
    })
    let persona = new Persona(nombre, correo, altura, peso, edad, entrenos);
})








