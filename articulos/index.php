<?php
include_once "Soporte.php";
include_once "CintaVideo.php";
include_once "Dvd.php";
include_once "Juego.php";
include_once "Cliente.php";
include_once "Videoclub.php";

// Creamos el videoclub
$videoclub = new Videoclub("Macia Abela");
// Incluimos algunos productos
$videoclub->incluirSoporte(new CintaVideo("Los cazafantasmas", 23, 3.5, 107));
$videoclub->incluirSoporte(new Dvd("Origen", 24, 15, "es,en,fr", "16:9"));
$videoclub->incluirSoporte(new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1));
// Incluimos algunos clientes
$videoclub->incluirCliente(new Cliente("Bruce Wayne", 1));
$videoclub->incluirCliente(new Cliente("Clark Kent", 2));
// Listamos los productos y clientes
$videoclub->listarProductos();
$videoclub->listarClientes();
// Alquilamos algunos soportes a clientes
$videoclub->alquilar(1, 0); // Bruce Wayne alquila Los cazafantasmas
$videoclub->alquilar(1, 2); // Bruce Wayne alquila The Last of Us Part II
$videoclub->alquilar(2, 1); // Clark Kent alquila Origen
// Intentamos alquilar más de lo permitido
$videoclub->alquilar(1, 1); // Bruce Wayne intenta alquilar Origen, pero ya tiene el máximo
// Devolvemos un soporte
$videoclub->devolver(1, 0); // Bruce Wayne devuelve Los cazafantasmas
// Volvemos a alquilar después de devolver
$videoclub->alquilar(1, 1); // Bruce Wayne alquila Origen
// Listamos de nuevo los alquileres del cliente
$videoclub->listarClientes();
