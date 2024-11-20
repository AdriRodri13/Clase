// Crea los objetos de imagen y asigna el `src` correcto a cada uno
var imagen1 = new Image();
imagen1.src = "imagen CRUD.png";

var imagen2 = new Image();
imagen2.src = "imagen CRUD 2.png";

var imagen3 = new Image();
imagen3.src = "imagen CRUD 3.png";

var imagen4 = new Image();
imagen4.src = "imagen CRUD 4.png";

// Agrupa las imágenes en un array
var imagenes = [imagen1, imagen2, imagen3, imagen4];

// Accede al elemento <img> en el HTML que actuará como contenedor de las imágenes
var imagenElement = document.images["imagen"];  // Asegúrate de que `name="imagen"` está en el HTML

// Asigna una de las imágenes del array `imagenes` al elemento HTML
// Por ejemplo, aquí asignamos la primera imagen como inicial
imagenElement.src = imagenes[0].src;

