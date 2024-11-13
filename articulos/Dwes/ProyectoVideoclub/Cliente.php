<?php
namespace Dwes\ProyectoVideoclub;

use Dwes\ProyectoVideoclub\Util\{
    SoporteYaAlquiladoException,
    CupoSuperadoException,
    SoporteNoEncontradoException
};

class Cliente
{
    private int $numeroSoportesAlquilados = 0;
    private array $soportesAlquilados = [];

    public function __construct(
        public string $nombre,
        private int $numero,
        private float $maxAlquilerConcurrente = 3
    ) {}

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function tieneAlquilado(Soporte $soporte): bool
    {
        return in_array($soporte, $this->soportesAlquilados, true);
    }

    public function alquilar(Soporte $soporte): Cliente
    {
        if ($this->numeroSoportesAlquilados >= $this->maxAlquilerConcurrente) {
            throw new CupoSuperadoException("El cliente ha superado el cupo máximo de alquileres.");
        }

        if ($this->tieneAlquilado($soporte)) {
            throw new SoporteYaAlquiladoException("El soporte ya está alquilado por el cliente.");
        }

        $this->soportesAlquilados[] = $soporte;
        $this->numeroSoportesAlquilados++;
        return $this;
    }

    public function devolver(int $numeroSoporte): bool
    {
        foreach ($this->soportesAlquilados as $index => $soporte) {
            if ($soporte->getNumero() == $numeroSoporte) {
                unset($this->soportesAlquilados[$index]);
                $this->numeroSoportesAlquilados--;
                return true;
            }
        }

        throw new SoporteNoEncontradoException("No se encontró el soporte con el número especificado.");
    }

    public function listaAlquileres()
    {
        foreach ($this->soportesAlquilados as $soporte) {
            $soporte->muestraResumen();
        }
    }

    public function muestraResumen()
    {
        echo $this->nombre;
    }
}
