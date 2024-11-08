<?php
namespace Dwes\ProyectoVideoclub;
class VideoClub
{
    public function __construct(
        private string $nombre,
        private array $socios = [],
        private array $productos = []
    )
    {}

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function incluirSoporte(Soporte $producto){
        $this->productos[] = $producto;
    }

    public function incluirCliente(Cliente $cliente){
        $this->socios[] = $cliente;
    }

    public function listarProductos(){
        foreach ($this->productos as $producto){
            echo $producto->muestraResumen();
        }
    }

    public function listarClientes(){
        foreach ($this->socios as $socio){
            echo $socio->muestraResumen();
        }
    }

    public function alquilar(string $numeroCliente, string $numeroProducto): Videoclub {
        foreach ($this->socios as $socio) {
            if ($numeroCliente == $socio->getNumero()) {
                if ($socio instanceof Cliente) {
                    foreach ($this->productos as $producto) {
                        if ($numeroProducto == $producto->getNumero()) {
                            if ($producto instanceof Soporte) {
                                $socio->alquilar($producto);
                            }
                        }
                    }
                }
            }
        }
        return $this;
    }

    public function devolver(string $numeroCliente, string $numeroProdcuto){
        foreach ($this->socios as $socio){
            if ($numeroCliente == $socio->getNumero()){
                if($socio instanceof Cliente){
                    $socio->devolver($numeroProdcuto);
                }
            }
        }
    }




}

