<?php
namespace Dwes\ProyectoVideoclub;

class Cliente
{
    private int $numeroSoportesAlquilados=0;
    private array $soportesAlquilados=[];

    public function __construct(
        public string $nombre,
        private int $numero,
        private float $maxAlquilerConcurrente=3
    )
    {}

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

    public function getNumeroSoportesAlquilados(): int
    {
        return $this->numeroSoportesAlquilados;
    }


    public function tieneAlquilado(Soporte $soporte): bool{
        if($soporte instanceof Soporte){
            return in_array($soporte, $this->soportesAlquilados);
        }
        return false;
    }

    public function alquilar(Soporte $soporte): Cliente {
        if ($this->numeroSoportesAlquilados == $this->maxAlquilerConcurrente) {
            echo 'No se pueden alquilar más soportes <br>';
            return $this;
        } elseif ($this->tieneAlquilado($soporte)) {
            echo 'El soporte ya está alquilado <br>';
            return $this;
        } else {
            $this->soportesAlquilados[] = $soporte;
            $this->numeroSoportesAlquilados++;
            return $this;
        }
    }


    public function devolver(int $numeroSoporte): bool{
        foreach ($this->soportesAlquilados as $index => $soporte) {
        if ($soporte instanceof Soporte) {
            if ($soporte->getNumero() == $numeroSoporte) {
                echo 'El soporte ha sido devuelto <br>';
                $this->numeroSoportesAlquilados--;
                unset($this->soportesAlquilados[$index]);
                break;
            }
        }
    }
        echo 'No hay ningun soporte con ese numero <br>';
        return false;
    }

    public function listaAlquileres(){
        foreach($this->soportesAlquilados as $soporte){
            if($soporte instanceof Soporte){
                $soporte->muestraResumen();
            }
        }
    }

    public function muestraResumen()
    {
        echo $this->nombre;
    }
}